<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesters = Semester::all();

        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.semester.index', compact('semesters'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.semester.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:semesters,name'
        ]);

        Semester::create([
            'name' => $request->name
        ]);

        Alert::success('Success', 'Created Successfull.');
        return redirect()->route('admin.semester.index');
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
        $semester = Semester::find($id);

        return view('admin.semester.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $semester = Semester::find($id);
        $this->validate($request, [
            'name' => 'required|unique:semesters,name,'.$id,
        ]);


        $semester->update([
            'name' => $request->name
        ]);
        Alert::success('Success', 'Updated Successfull.');
        return redirect()->route('admin.semester.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Semester::find($id)->delete();
        Alert::success('Success', 'Deleted Successfull.');
        return redirect()->route('admin.semester.index');
    }
}
