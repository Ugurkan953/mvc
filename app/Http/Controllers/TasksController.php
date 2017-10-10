<?php

namespace App\Http\Controllers;

use Illuminate\Htpp\Request;

use App\Task;

class TasksController extends Controller
{
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

    	Task::create(
    		request([
    			'title', 
    			'body'
    		])
    	);

    	return redirect('/tasks');
    }
}
