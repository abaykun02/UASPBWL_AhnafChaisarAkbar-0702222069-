@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pelamar</h1>
    <form action="{{ route('applicants.store') }}" method="POST">
    @csrf <!-- Token CSRF diperlukan untuk validasi keamanan -->
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Nomor Hp</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection
