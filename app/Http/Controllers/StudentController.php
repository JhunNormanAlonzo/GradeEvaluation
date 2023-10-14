<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $year_levels = YearLevel::all();
        $sections = Section::all();
        return view('admin.student.create', compact('year_levels', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'id_number' => 'required|unique:students,id_number',
            'address' => 'required',
            'year_level_id' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('student123'),
        ]);

        $role = Role::where('name', 'Student')->first();
        $user->assignRole($role);

        Student::create([
            'user_id' => $user->id,
            'year_level_id' => $request->year_level_id,
            'section_id' => $request->section_id,
            'id_number' => $request->id_number,
            'address' => $request->address,
        ]);

        Alert::success('Success', 'Created Successfull.');
        return redirect()->route('admin.user.index');
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
        $student = Student::find($id);
        $year_levels = YearLevel::all();
        $sections = Section::all();
        return view('admin.student.edit', compact('year_levels', 'sections', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $student = Student::find($id);


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $student->user_id,
            'id_number' => 'required|unique:students,id_number,' . $id,
            'address' => 'required',
            'year_level_id' => 'required',
        ]);

        // Find the user by ID
        $user = User::find($student->user_id);
        if ($user) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $student->update([
                'year_level_id' => $request->year_level_id,
                'section_id' => $request->section_id,
                'id_number' => $request->id_number,
                'address' => $request->address
            ]);

            Alert::success('Success', 'Updated Successfully.');
        } else {
            Alert::error('Error', 'User not found.');
        }

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $user = User::find($student->user_id);
        $user->delete();
        Alert::success('Success', 'Deleted Successfully.');
        return redirect()->route('admin.user.index');
    }
}
