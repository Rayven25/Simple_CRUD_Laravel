<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'age' => 'required|integer|min:1|max:150',
            'address' => 'required|string|max:255',
        ]);

        Students::create($request->all());
        session()->flash('swal', [
            'title' => 'Student Added!',
            'message' => 'New student has been added successfully',
            'icon' => 'success',
        ]);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Students::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $id,
            'age' => 'required|integer|min:1|max:150',
            'address' => 'required|string|max:255',
        ]);

        $student = Students::findOrFail($id);
        $student->update($request->all());
        session()->flash('swal', [
            'title' => 'Student Updated!',
            'message' => 'Student information has been updated successfully',
            'icon' => 'success',
        ]);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $student = Students::findOrFail($id);
            $studentName = $student->name; // Store the name before deletion
            $student->delete();
            
            session()->flash('swal', [
                'title' => 'Deleted!',
                'message' => "Student has been deleted successfully.",
                'icon' => 'success',
            ]);
            
            return redirect()->route('students.index');
            
        } catch (\Exception $e) {
            session()->flash('swal', [
                'title' => 'Error!',
                'message' => 'Failed to delete the student. Please try again.',
                'icon' => 'error',
            ]);
            
            return redirect()->route('students.index');
        }
    }
}
