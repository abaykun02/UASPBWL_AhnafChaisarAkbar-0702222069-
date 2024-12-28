@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pekerjaan Yang Diambil Pelamar</h1>
    <a href="{{ route('job_applications.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelamar</th>
                <th>Pekerjaan Yang Diambil</th>
                <th>Waktu Pengambilan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->applicant->name }}</td>
                <td>{{ $application->job->title }}</td>
                <td>{{ $application->applied_at }}</td>
                <td>{{ $application->status }}</td>
                <td>
                    <a href="{{ route('job_applications.edit', $application->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('job_applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
