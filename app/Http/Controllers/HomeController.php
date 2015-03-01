<?php namespace App\Http\Controllers;

use App\Bug;
use App\User;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $bugs = Bug::all()->where('user_id', \Auth::user()->id);
        return view('home')->with('bugs', $bugs);
	}

    public function team()
    {
        \Cache::flush();
        $users = User::all();
        $bugs = Bug::all();
        return view('team')
            ->with('users', $users)
            ->with('bugs', $bugs);

    }

    public function delete($id)
    {
        $bug = Bug::find($id);
        if (!$bug == null) {

            $bug->delete($id);
        }
        return redirect('home');
    }

    public function view_edit($id)
    {
        $bug = Bug::find($id);
        if (!$bug == null) {

            $users = User::all();
            return view('bugs.edit')
                ->with('bug', $bug)
                ->with('users',$users);
        }

        else {
            return redirect('home');
        }
    }

    public function edit()
    {

        $id = Input::get('id');
        $title = Input::get('title');
        $description = Input::get('description');
        $status = Input::get('status');

        $bug = Bug::find($id);

        $bug->title = $title;
        $bug->description = $description;
        $bug->status = $status;

        $bug->save();

        return redirect('home');
    }

}
