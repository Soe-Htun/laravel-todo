@extends('layouts.app')

@section('title','Tasks')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Tasks</h1>
  <a href="{{ route('tasks.create') }}" class="btn btn-primary">New Task</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Done</th>
      <th>Title</th>
      <th>Description</th>
      <th>Created</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($tasks as $task)
      <tr>
        <td>
          <form action="{{ route('tasks.toggle', $task) }}" method="POST" style="display:inline">
            @csrf
            <button class="btn btn-sm {{ $task->is_done ? 'btn-success' : 'btn-outline-secondary' }}">
              {{ $task->is_done ? 'Yes' : 'No' }}
            </button>
          </form>
        </td>
        <td>{{ $task->title }}</td>
        <td>{{ Str::limit($task->description, 80) }}</td>
        <td>{{ $task->created_at->diffForHumans() }}</td>
        <td>
          <div class="d-flex align-items-center gap-2">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this task?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          </div>
        </td>
      </tr>
    @empty
      <tr><td colspan="5">No tasks yet. <a href="{{ route('tasks.create') }}">Create one</a>.</td></tr>
    @endforelse
  </tbody>
</table>
@endsection
