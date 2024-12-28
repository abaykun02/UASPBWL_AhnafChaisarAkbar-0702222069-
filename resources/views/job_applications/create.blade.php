@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data</h1>
    <form action="{{ route('job_applications.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="applicant_id" class="form-label">Nama Pelamar</label>
            <select name="applicant_id" id="applicant_id" class="form-control">
                @foreach($applicants as $applicant)
                <option value="{{ $applicant->id }}">{{ $applicant->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="job_id" class="form-label">Pekerjaan Yang Diambil</label>
            <select name="job_id" id="job_id" class="form-control">
                @foreach($jobs as $job)
                <option value="{{ $job->id }}">{{ $job->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="applied_at" class="form-label">Waktu Pengambilan</label>
            <input type="date" name="applied_at" id="applied_at" class="form-control">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="pending">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
