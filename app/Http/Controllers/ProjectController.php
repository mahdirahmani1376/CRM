<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('client', 'task')->paginate(20);

        return Response::view('projects.index', compact('projects'));
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

        return Response::view('projects.create', compact('users', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectRequest  $projectRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectRequest $projectRequest)
    {
        $data = $projectRequest->validated();
        $project = Project::create($data);

        return Response::redirectToRoute('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return Response::view('projects.show', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $users = User::all();
        $clients = Client::all();

        return Response::view('projects.edit', compact('project', 'users', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectRequest  $projectRequest
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProjectRequest $projectRequest, Project $project)
    {
        $project->update($projectRequest->validated());

        return Response::redirectToRoute('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return Response::redirectToRoute('projects.index');
    }
}
