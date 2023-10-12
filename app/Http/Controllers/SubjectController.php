<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject_code' => 'required|max:255',
            'description' => 'nullable|max:255',
            'unit' => 'required', // Assuming unit is a numeric field
        ]);

        Subject::create([
            'subject_code' => $request->subject_code,
            'description' => $request->description,
            'unit' => $request->unit,
        ]);

        Alert::success('Success', 'Created Successfull.');
        return view('admin.subject.create');
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
    public function edit(string $id)
    {
        $subject = Subject::find($id);
        return view('admin.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'subject_code' => 'required|max:255',
            'description' => 'nullable|max:255',
            'unit' => 'required', // Assuming unit is a numeric field
        ]);

        // Find the existing Subject by its ID
        $subject = Subject::find($id);

        // Update the fields based on the validated data
        $subject->update([
            'subject_code' => $request->subject_code,
            'description' => $request->description,
            'unit' => $request->unit,
        ]);

        Alert::success('Success', 'Updated Successfully.');
        return redirect()->route('admin.subject.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        Alert::success('Success', 'Deleted Successfully.');
        return redirect()->route('admin.subject.index');
    }
}
