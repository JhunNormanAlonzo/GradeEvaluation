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
        $admin = User::create([
            'name' => 'Jhun Norman Alonzo',
            'email' => "alonzojhunnorman@gmail.com",
            'password' => bcrypt('admin123')
        ]);
        $role = Role::where('name', 'Admin')->first();

        $admin->assignRole($role);

        $teacher = User::create([
            'name' => 'Jessa Mae Matutino',
            'email' => "jessamaematutino@gmail.com",
            'password' => bcrypt('admin123')
        ]);
        $role = Role::where('name', 'Teacher')->first();

        $teacher->assignRole($role);

        $student = User::create([
            'name' => 'Jastine Dale Alonzo',
            'email' => "jastine@gmail.com",
            'password' => bcrypt('admin123')
        ]);
        $role = Role::where('name', 'Student')->first();

        $student->assignRole($role);
    }
}
