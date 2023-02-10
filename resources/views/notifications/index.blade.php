@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Unread notifications</div>

        <div class="card-body">
            <div style="margin-bottom: 10px;" class="row">
                @if ($notifications->count())
                    <div class="col-lg-12">
                        <form action="{{ route('notifications.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-success" value="Mark all as read">
                        </form>
                    </div>
                @endif
            </div>
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>user</th>
                        <th>Sent at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($notifications->count())
                        @foreach($notifications as $notification)
                            @if(!$notification->read())
                                <tr>
                                    <td>{{ ucfirst(str_replace('_', ' ', $notification->data['project'])) }}</td>
                                    <td>{{ $notification->data['user'] }}</td>
                                    <td>{{ $notification->created_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ route('notifications.update', $notification) }}" method="POST"
                                              style="display: inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <input type="submit" class="btn btn-sm btn-info" value="Mark as read">
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-info" role="alert">
                                    You have no notifications.
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
