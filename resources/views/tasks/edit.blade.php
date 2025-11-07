@extends('layouts.app')

@section('title','Edit Task')

@section('content')
<h2>Edit Task</h2>

<form method="POST" action="{{ route('tasks.update', $task) }}">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
    @error('description') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <button class="btn btn-primary">Update</button>
  <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
