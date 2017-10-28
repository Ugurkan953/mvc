<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\User;
use \Auth;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index() 
    {
	    $tasks = Task::latest()->get();

   		return view('tasks.index', compact('tasks'));
    }


    public function show(Task $task, User $user)
    {
		return view('tasks.show', compact('task', 'user'));
    }

    public function filter($task){

        
        $data['task'] = $task;
        
        $fTasks = Task::where('genre' ,'=', $data )->get();      
        $tasks = Task::latest()->get();  
        
        return view('tasks.filter', compact('fTasks', 'tasks'));

    }

    public function create()
    {
    	return view('tasks.create');
    }


    public function store()
    {
    	$this->validate(request(), [
    		'title' => 'required',
            'genre' => 'required',
    		'body' => 'required'
    	]);

    	Task::create([
			'title' => request('title'), 
            'genre' => request('genre'), 
			'body' => request('body'),
            'user_id' => auth()->id()
    	]);

    	return redirect('/tasks');
    }

    public function delete(Request $request, $id)
    {
        if(Task::find($id)){
            $user = Auth::user()->id;
            
            $oUser = User::find($user)->role;

            try{
                if($oUser == 1){
                    $task = Task::findOrFail($id);
                }else{
                    $task = Task::whereIdAndUser_id($id, $user)->firstOrFail();
                }
                $task->comments()->delete();
                $task->delete();                    

                flash('Task has been deleted')->success();
                return redirect('/tasks')->with('status', 'Deleted successfully');
            }catch(\Exception $e){
                
                return redirect('/tasks')->withErrors(['You are not the owner of this message']);
            }
        }
    }
}
