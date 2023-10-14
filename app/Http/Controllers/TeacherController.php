<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        return view('admin.teacher.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'id_number' => 'required|unique:teachers,id_number',
            'address' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('teacher123'),
        ]);

        $role = Role::where('name', 'Teacher')->first();
        $user->assignRole($role);

        Teacher::create([
            'user_id' => $user->id,
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
        $teacher = Teacher::find($id);
        $sections = Section::all();
        return view('admin.teacher.edit', compact('sections', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $teacher = Teacher::find($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $teacher->user_id,
            'id_number' => 'required|unique:teachers,id_number,' . $id,
            'address' => 'required',
        ]);

        // Find the user by ID
        $user = User::find($teacher->user_id);
        if ($user) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $teacher->update([
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
        $teacher = Teacher::find($id);
        $user = User::find($teacher->user_id);
        $user->delete();
        Alert::success('Success', 'Deleted Successfully.');
        return redirect()->route('admin.user.index');
    }
}
