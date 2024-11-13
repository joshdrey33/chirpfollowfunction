<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('students.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'birth_date' => 'required|date', // Validate birth_date as a required date field
        ]);

        Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birth_date' => $request->input('birth_date'), // Save birth_date to the database
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }


    // Show the form for editing the specified resource
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Student $student)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        // Update the student record
        $student->update($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
