@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pelamar</h1>
    <form action="{{ route('applicants.update', $applicant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $applicant->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $applicant->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Nomor Hp</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $applicant->phone }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
