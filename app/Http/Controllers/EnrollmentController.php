<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::all();
        return view ('enrollments.index')->with('enrollments', $enrollments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batches = Batch::pluck('name','id');
        $students= Student::pluck('name','id');
        return view('enrollments.create',compact('batches','students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Enrollment::create($input);
        return redirect('enrollments')->with('flash_message', 'enrollment Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollment = Enrollment::find($id);
        return view('enrollments.show')->with('enrollments', $enrollment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrollment = Enrollment::find($id);
        return view('enrollments.edit')->with('enrollments', $enrollment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $enrollment = Enrollment::find($id);
        $input = $request->all();
        $enrollment->update($input);
        return redirect('enrollments')->with('flash_message', 'enrollment Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'enrollment deleted!');
    }
}
