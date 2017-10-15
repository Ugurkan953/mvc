<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Comment;
use \Hash;
use \Auth;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index']]);
	}

	public function index()
	{
		return redirect('/');
	}

	public function show(User $user)
	{
		if(Auth::user()->role == '1'){

			$user = User::where('email', '!=', Auth::user()->email)->get();

			return view('user.users', compact('user'));

		}else{
			return redirect('/');
		}
	}

	public function showEdit(User $user)
	{

		return view ('user.edit');

	}

    public function update(User $user, Request $request)
    {

		$this->validate(request(),[
			'name' 		=> 'required',
			'password'	=> 'required',
			'email'		=> 'unique:users,email,'.$user->id
		]);    	

		$password = $request->password;

		if(Hash::needsRehash($password)){
			$hashed = Hash::make($password);
			$user->update([
				'name' => $request->name,
				'password' => $hashed,
				'email' => $request->email
			]);
		}else{
			$user->update(request([
				'name',
				'password',
				'email'
			]));
		}

        flash('The user has been updated')->success();
        return redirect('/profile');
    }

    public function delete(Request $request, $id)
    {
    	
    	if(User::find($id)){
    		$user = User::find($id);
    		$user->posts()->delete();
    		$user->delete();

    		return redirect('/users');
    	}
 		   	
    }
}
