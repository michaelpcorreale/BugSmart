<?php namespace App\Http\Controllers;

use App\Bug;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BugsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

            $bugs = Bug::all();
            $users = User::all();
            return view('bugs')
                ->with('bugs',$bugs)
                ->with('users',$users);
    }

    public function store()
    {

        $title = Input::get('title');
        $description = Input::get('description');
        $status = Input::get('status');
        $priority = Input::get('priority');
        $user = Input::get('user_id');

        $bug = new Bug();
        $bug->title = $title;
        $bug->description = $description;
        $bug->status = $status;
        $bug->priority = $priority;
        $bug->user_id = $user;

        $bug->save();

        return redirect('bugs');
    }

}
