@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pekerjaan</h1>
    <a href="{{ route('jobs.create') }}" class="btn btn-primary">Tambah Pekerjaan</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pekerjaan</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr>
                <td>{{ $job->title }}</td>
                <td>{{ $job->description }}</td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->salary }}</td>
                <td>
                    <a href="{{ route('jobs.edit', $job) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
