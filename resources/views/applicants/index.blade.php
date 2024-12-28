@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pelamar</h1>
    <a href="{{ route('applicants.create') }}" class="btn btn-primary mb-3">Tambah Pelamar</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Hp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applicants as $applicant)
            <tr>
                <td>{{ $applicant->name }}</td>
                <td>{{ $applicant->email }}</td>
                <td>{{ $applicant->phone }}</td>
                <td>
                    <a href="{{ route('applicants.edit', $applicant->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('applicants.destroy', $applicant->id) }}" method="POST" style="display:inline;">
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
