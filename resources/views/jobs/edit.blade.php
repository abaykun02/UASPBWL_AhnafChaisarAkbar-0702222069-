@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Job</h1>
    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Untuk metode HTTP PUT -->
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $job->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $job->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $job->location }}" required>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Lokasi</label>
            <input type="text" name="salary" id="salary" class="form-control" value="{{ $job->salary }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
