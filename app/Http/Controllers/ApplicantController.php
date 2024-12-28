<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::all();
        return view('applicants.index', compact('applicants'));
    }

    public function create()
    {
        return view('applicants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants',
            'phone' => 'required|string|max:15',
        ]);
    
        Applicant::create($request->only('name', 'email', 'phone'));
    
        return redirect()->route('applicants.index')->with('success', 'Applicant added successfully.');
    }

    public function edit($id)
    {
        $applicant = Applicant::findOrFail($id);
        return view('applicants.edit', compact('applicant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,email,' . $id,
            'phone' => 'required|string|max:15',
        ]);

        $applicant = Applicant::findOrFail($id);
        $applicant->update($request->all());

        return redirect()->route('applicants.index')->with('success', 'Applicant updated successfully.');
    }

    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return redirect()->route('applicants.index')->with('success', 'Applicant deleted successfully.');
    }
}
