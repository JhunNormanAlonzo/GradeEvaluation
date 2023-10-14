<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();

        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sections,name'
        ]);

        Section::create([
            'name' => $request->name
        ]);

        Alert::success('Success', 'Created Successfull.');
        return redirect()->route('admin.section.index');
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
        $section = Section::find($id);

        return view('admin.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $section = Section::find($id);
        $this->validate($request, [
            'name' => 'required|unique:sections,name,' . $id,
        ]);


        $section->update([
            'name' => $request->name
        ]);
        Alert::success('Success', 'Updated Successfull.');
        return redirect()->route('admin.section.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Section::find($id)->delete();
        Alert::success('Success', 'Deleted Successfull.');
        return redirect()->route('admin.section.index');
    }
}
