<?php

namespace App\Http\Controllers;

use Illuminate\Htpp\Request;

use App\Task;

class TasksController extends Controller
{
    public function __construct(){

        $this->middleware('auth')->except(['index', 'show']);

    }


    public function index() 
    {
	    $tasks = Task::latest()->get();

   		return view('tasks.index', compact('tasks'));
    }


    public function show(Task $task)
    {

		return view('tasks.show', compact('task'));

    }


    public function create()
    {
    	return view('tasks.create');
    }


    public function store()
    {
    
    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required'
    	]);

    	Task::create([
			'title' => request('title'), 
			'body' => request('body'),
            'user_id' => auth()->id()
    	]);

    	return redirect('/tasks');
    }
}
