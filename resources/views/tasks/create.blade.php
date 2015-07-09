@extends('app')

@section('content')
<h2>Create Task for Project "{{ $project->name }}"</h2>

    {!! Form::model(new App\task, ['route' => ['projects.tasks.store', $projects->slug], 'class' => '']) !!}
        @include('tasks/partials/_form', ['submit_text' => 'Create Task'])
    {!! Form::close() !!}

@endsection