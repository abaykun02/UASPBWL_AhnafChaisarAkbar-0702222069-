<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::with('applicant', 'job')->get();
        return view('job_applications.index', compact('applications'));
    }

    public function create()
    {
        $applicants = Applicant::all();
        $jobs = Job::all();
        return view('job_applications.create', compact('applicants', 'jobs'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'job_id' => 'required|exists:jobs,id',
                'applicant_id' => 'required|exists:applicants,id',
            ]);
    
            JobApplication::create([
                'job_id' => $validated['job_id'],
                'applicant_id' => $validated['applicant_id'],
                'applied_at' => now(),
            ]);
    
            return redirect()->route('job_applications.index')->with('success', 'Job application added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $application = JobApplication::findOrFail($id);
        $applicants = Applicant::all();
        $jobs = Job::all();
        return view('job_applications.edit', compact('application', 'applicants', 'jobs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'job_id' => 'required|exists:jobs,id',
            'applied_at' => 'required|date',
            'status' => 'required|string',
        ]);

        $application = JobApplication::findOrFail($id);
        $application->update($request->all());

        return redirect()->route('job_applications.index')->with('success', 'Job application updated successfully.');
    }

    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);
        $application->delete();
        return redirect()->route('job_applications.index')->with('success', 'Job application deleted successfully.');
    }
}
