@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header">Edit project</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label class="required" for="title">Title</label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                                   name="title" id="title" value="{{ old('title', $task->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block"> </span>
                        </div>

                        <div class="form-group">
                            <label class="required" for="description">Description</label>
                            <textarea class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}"
                                      rows="10" name="description"
                                      id="description">{{ old('description', $task->description) }}</textarea>
                            @if($errors->has('contact_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact_email') }}
                                </div>
                            @endif
                            <span class="help-block"> </span>
                        </div>

                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input class="form-control {{ $errors->has('deadline') ? 'is-invalid' : '' }}" type="date"
                                   name="deadline" id="deadline" value="{{ old('deadline', $task->deadline) }}">
                            @if($errors->has('deadline'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('deadline') }}
                                </div>
                            @endif
                            <span class="help-block"> </span>
                        </div>

                        <div class="form-group">
                            <label for="user_id">Assigned user</label>
                            <select class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}"
                                    name="user_id" id="user_id" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->first_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('user_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block"> </span>
                        </div>

                        <div class="form-group">
                            <label for="client_id">Assigned client</label>
                            <select class="form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }}"
                                    name="client_id" id="client_id" required>
                                @foreach($clients as $client)
                                    <option
                                        value="{{ $client?->id }}">{{ $client?->contact_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('client_id') }}
                                </div>
                            @endif
                            <span class="help-block"> </span>
                        </div>

                        <div class="form-group">
                            <label for="project_id">Assigned project</label>
                            <select class="form-control {{ $errors->has('project_id') ? 'is-invalid' : '' }}"
                                    name="project_id" id="project_id" required>
                                @foreach($projects as $project)
                                    <option
                                        value="{{ $project?->id }}">{{ $project?->title }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('project_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('project_id') }}
                                </div>
                            @endif
                            <span class="help-block"> </span>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                                    id="status" required>
                                @foreach(App\Models\Task::STATUS as $status)
                                    <option
                                        value="{{ $status }}" {{ (old('status') ? old('status') : $task->status ?? '') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block"> </span>
                        </div>

                        <button class="btn btn-primary" type="submit">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
