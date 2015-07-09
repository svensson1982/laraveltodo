<?php 
namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Input;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TasksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Project $project, Task $task)
	{
                return view('tasks.show', compact('project','task'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Project $project)
	{
		return view('tasks.create', compact('project'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Project $project)
	{
                $input = Input::all();
                $input['project_id'] = $project->id;
                Task::create($input);
                return Redirect::route('projects.tasks.show', $project->slug)
                        ->with('message','Project created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Project $project, Task $task)
	{
		return view('tasks.show', compact('project','task'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Project $project, Task $task)
	{
		return view('tasks.edit', compact('project','task'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Project $project, Task $task)
	{
		$input = array_except(Input::all(), '_method');
                $task->update($input);
                return Redirect::route('projects.tasks.show', [$project->slug, $task->slug])
                        ->with('message', 'Task Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Project $project, Task $task)
	{
		$task->delete();
                return Redirect::route('projects.show', $project->slug)
                        ->with('message', 'Task deleted');
	}

}
