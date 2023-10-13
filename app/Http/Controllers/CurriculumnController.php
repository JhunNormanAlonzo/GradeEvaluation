<?php

namespace App\Http\Controllers;

use App\Models\Curriculumn;
use App\Models\CurriculumnSubject;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class CurriculumnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curriculumns = Curriculumn::all();
        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.curriculumn.index', compact('curriculumns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $year_levels = YearLevel::all();
        $semesters = Semester::all();
        // $existingSubjectIds = CurriculumnSubject::pluck('subject_id')->toArray();
        // $subjects = Subject::whereNotIn('id', $existingSubjectIds)->get();
        $subjects = Subject::all();

        return view('admin.curriculumn.create', compact('year_levels', 'semesters', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {

    //     $this->validate($request, [
    //         'semester_id' => 'required',
    //         'year_level_id' => 'required',
    //         'subject_id' => 'required|array',
    //         'subject_id.*' => 'required',
    //     ]);


    //     $curriculumn = Curriculumn::create([
    //         'semester_id' => $request->semester_id,
    //         'year_level_id' => $request->year_level_id,
    //     ]);
    //     foreach ($request->subject_id as $subject_id) {
    //         CurriculumnSubject::create([
    //             'curriculumn_id' => $curriculumn->id,
    //             'subject_id' => $subject_id,
    //         ]);
    //     }




    //     Alert::success('Success', 'Created Successfull.');
    //     return redirect()->route('admin.curriculumn.index');
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'semester_id' => 'required',
            'year_level_id' => 'required',
            'subject_id' => 'required|array',
            'subject_id.*' => 'required',
        ]);

        $curriculumn = Curriculumn::updateOrCreate(
            ['semester_id' => $request->semester_id, 'year_level_id' => $request->year_level_id],
            ['semester_id' => $request->semester_id, 'year_level_id' => $request->year_level_id]
        );

        $curriculumn->subjects()->sync($request->subject_id);

        Alert::success('Success', 'Created Successfully.');
        return redirect()->route('admin.curriculumn.index');
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
        $curricullumn = Curriculumn::find($id);
        return view('admin.curriculumn.edit', compact('curricullumn'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $this->validate($request, [
            'semester_id' => 'required',
            'year_level_id' => 'required',
            'subject_id.*' => 'required',
            'semester_id' => Rule::unique('curriculumns')
                ->where('year_level_id', $request->year_level_id)
                ->ignore($id), // Ignore the current record with ID $id
        ]);

        // Find the Curriculumn record to update
        $curriculumn = Curriculumn::findOrFail($id);

        $curriculumn->semester_id = $request->semester_id;
        $curriculumn->year_level_id = $request->year_level_id;
        $curriculumn->save();

        $curriculumn->subjects()->sync($request->subject_id);

        Alert::success('Success', 'Update Successfull.');
        return redirect()->route('admin.curriculumn.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curriculumn = Curriculumn::findOrFail($id);
        $curriculumn_subjects = CurriculumnSubject::where('curriculumn_id', $curriculumn->id);
        $curriculumn_subjects->delete();

        $curriculumn->delete();
        Alert::success('Success', 'Deleted Successfully.');
        return redirect()->route('admin.curriculumn.index');
    }
}
