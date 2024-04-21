<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::where('role', 'teacher')->get();
        $departments = Department::all();
        return view('teachers.create', compact('teachers' , 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        $validated = $request->validated();
        Teacher::create($validated);
        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $Teacher)
    {
        return view('teachers.show', compact('Teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $Teacher)
    {
        $teachers = User::where('role', 'Teacher')->get();
        $departments = Department::all();
        return view('teachers.edit', compact('Teacher', 'teachers', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, Teacher $Teacher)
    {
        $validated = $request->validated();
        $Teacher->update($validated);
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $Teacher)
    {
        $Teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
