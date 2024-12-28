<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'salary'=>'required|string',
        ]);

        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,

        ]);

        return redirect()->route('jobs.index')->with('success', 'Job berhasil ditambahkan!');
    }

    public function edit($id)
{
    $job = Job::findOrFail($id); // Cari job berdasarkan ID
    return view('jobs.edit', compact('job')); // Kirim data ke view
}


public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string',
    ]);

    $job = Job::findOrFail($id); // Cari job berdasarkan ID
    $job->update([
        'title' => $request->title,
        'description' => $request->description,
        'location' => $request->location,
        'salary' => $request->salary,
    ]);

    return redirect()->route('jobs.index')->with('success', 'Job berhasil diperbarui!');
}

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
