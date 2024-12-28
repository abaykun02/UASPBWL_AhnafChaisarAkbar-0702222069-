@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Tambah Pekerjaan</h1>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="salary">Gaji</label>
            <input type="number" name="salary" id="salary" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
