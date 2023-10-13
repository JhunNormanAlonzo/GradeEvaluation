<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Ito admin
         $admin = User::create([
            'name' => 'Admin',
            'email' => "admin@gmail.com",
            'password' => bcrypt('admin123')
        ]);
        $role = Role::where('name', 'Admin')->first();
        $admin->assignRole($role);
       //

       // Ito Teacher
        $teacher = User::create([
            'name' => 'Jeffrey Ubarco',
            'email' => "jeffrey@gmail.com",
            'password' => bcrypt('jeff123')
        ]);
        $role = Role::where('name', 'Teacher')->first();
        $teacher->assignRole($role);
       //

       //Ito student
        $student = User::create([
            'name' => 'Arnel Lacida',
            'email' => "lacidaarnel@gmail.com",
            'password' => bcrypt('lacida123')
        ]);
        $role = Role::where('name', 'Student')->first();
        $student->assignRole($role);
       //
    }
}
