<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Teacher;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = Teacher::all(); // Fetch all teachers
        return view('courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable|exists:teachers,id', // Validate teacher_id if provided
        ]);
    
        Course::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'teacher_id' => $request->input('teacher_id'), // Save teacher_id if provided
        ]);
    
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }
    

    public function edit(Course $course)
    {
        $teachers = Teacher::all(); // Fetch all teachers for the dropdown
        return view('courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);

        $course->update($request->only(['title', 'description', 'teacher_id']));

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
    
}
