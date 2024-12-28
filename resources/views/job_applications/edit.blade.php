@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Job Application</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('job_applications.update', $application->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="applicant_id" class="form-label">Nama Pelamar</label>
            <select name="applicant_id" id="applicant_id" class="form-select">
                @foreach ($applicants as $applicant)
                    <option value="{{ $applicant->id }}" {{ $application->applicant_id == $applicant->id ? 'selected' : '' }}>
                        {{ $applicant->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="job_id" class="form-label">Nama Pekerjaan</label>
            <select name="job_id" id="job_id" class="form-select">
                @foreach ($jobs as $job)
                    <option value="{{ $job->id }}" {{ $application->job_id == $job->id ? 'selected' : '' }}>
                        {{ $job->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="applied_at" class="form-label">Applied At</label>
            <input type="date" name="applied_at" id="applied_at" class="form-control" value="{{ $application->applied_at }}">
        </div>
        <div class="mb-3">
            <label for="applied_at" class="form-label">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ $application->status }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('job_applications.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
