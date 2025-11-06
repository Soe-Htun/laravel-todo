@extends('layouts.app')

@section('title','Create Task')

@section('content')
<h2>Create Task</h2>

<form method="POST" action="{{ route('tasks.store') }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input name="title" class="form-control" value="{{ old('title') }}" required>
    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    @error('description') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <button class="btn btn-primary">Save</button>
  <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
