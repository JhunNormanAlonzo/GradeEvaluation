<?php

namespace App\Http\Controllers;

use App\Models\YearLevel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class YearLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $year_levels = YearLevel::all();

        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.year-level.index', compact('year_levels'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.year-level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:year_levels,name'
        ]);

        YearLevel::create([
            'name' => $request->name
        ]);

        Alert::success('Success', 'Created Successfull.');
        return redirect()->route('admin.year-level.index');
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
        $year_level = YearLevel::find($id);

        return view('admin.year-level.edit', compact('year_level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $year_level = YearLevel::find($id);
        $this->validate($request, [
            'name' => 'required|unique:year_levels,name,'.$id,
        ]);


        $year_level->update([
            'name' => $request->name
        ]);
        Alert::success('Success', 'Updated Successfull.');
        return redirect()->route('admin.year-level.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        YearLevel::find($id)->delete();
        Alert::success('Success', 'Deleted Successfull.');
        return redirect()->route('admin.year-level.index');
    }
}
