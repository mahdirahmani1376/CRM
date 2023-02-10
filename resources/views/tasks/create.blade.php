@extends('layouts.app')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-header">Create tasks</div>

            <div class="card-body">

                <div class="form-group">
                    <label for="user_id">Assigned user</label>
                    <select class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->first_name }}</option>
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
                    <label for="project_id">Assigned project</label>
                    <select class="form-control {{ $errors->has('project_id') ? 'is-invalid' : '' }}" name="project_id" id="project_id" required>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->title }}</option>
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
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                        @foreach(App\Models\Task::STATUS as $status)
                            <option
                                value="{{ $status }}">{{ ucfirst($status) }}</option>
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

@endsection
