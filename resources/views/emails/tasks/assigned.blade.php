@component('mail::message')
# Task Assignment

Task _{{ $task->project->title }}_ have been assigned to {{ $task->user->first_name }}.

@component('mail::button', ['url' => route('tasks.show',$task) ])
View task
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
