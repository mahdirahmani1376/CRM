<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Jobs\TaskAssignedJob;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class TaskController extends ParentController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with(['project', 'user'])->paginate(20);

        return Response::view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $clients = Client::all();
        $projects = Project::all();

        return Response::view('tasks.create', compact('users', 'clients', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $taskRequest)
    {
        $data = $taskRequest->validated();
        $task = Task::create($data);
        TaskAssignedJob::dispatch($this->admins, $task);

        return Response::redirectToRoute('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return Response::view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = User::all();
        $clients = Client::all();
        $projects = Project::all();

        return Response::view('tasks.edit', compact('task', 'users', 'clients', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $taskRequest, Task $task)
    {
        $data = $taskRequest->validated();
        $task->update($data);

        return Response::redirectToRoute('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return Response::redirectToRoute('tasks.index');
    }
}
