<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $clients = Client::with('projects')->active()->paginate(20);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClientRequest  $clientRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientRequest $clientRequest): \Illuminate\Http\RedirectResponse
    {
        $clientCreateData = $clientRequest->validated();
        $client = Client::create($clientCreateData);
        session()->flash('success', 'client with name '.$client->company_name.' created successfully!');

        return Response::redirectToRoute('clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return Response::view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Client $client, ClientRequest $clientRequest)
    {
        $clientData = $clientRequest->validated();

        $client->update($clientData);
        session()->flash('success', 'client with name '.$client->company_name.' updated successfully!');

        return Response::redirectToRoute('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return Response::redirectToRoute('clients.index');
    }
}
