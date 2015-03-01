<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        \Cache::flush();
        $user = Auth::User();
        $filename = 'uploads/'. $user->id .'.jpg';
        if (file_exists($filename)) {
            $img = 'uploads/'. $user->id .'.jpg';
            return view('profile')
                ->with('img', $img)
                ->with('user', $user);
        }
        else {
            $default = 'uploads/default.jpg';
            return view('profile')
                ->with('img', $default)
                ->with('user', $user);
        }

    }

    public function edit()
    {
         if (Input::hasFile('avatar'))
        {
            $id = Auth::User()->id;
            Image::make(Input::file('avatar'))
                ->encode('jpg')
                ->resize(100, 100)
                ->save('uploads/' . $id . '.jpg');
            Image::make(Input::file('avatar'))
                ->encode('jpg')
                ->resize(50, 50)
                ->save('uploads/' . $id . '-mini.jpg');
        }

        $id = Auth::User()->id;
        $name = Input::get('name');
        $email = Input::get('email');

        $user = User::find($id);

        $user->name = $name;
        $user->email = $email;

        $user->save();
        return redirect('profile');
    }

}
