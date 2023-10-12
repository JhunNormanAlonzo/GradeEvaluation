<?php

namespace App\Http\Controllers;

use App\Models\SubjectPrerequisite;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectPrerequisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subject_id = $request->subject_id;
        $prerequisites = $request->prereq;
        SubjectPrerequisite::where('subject_id', $request->subject_id)->delete();

        foreach($prerequisites as $prereq){
            SubjectPrerequisite::create([
                'subject_id' => $subject_id,
                'prerequisite_id' => $prereq,
            ]);
        }

        Alert::info('Pre-requisite', 'Assigned Successfully.');
        return redirect()->route('admin.subject.index');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
