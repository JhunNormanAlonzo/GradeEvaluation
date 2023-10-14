<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'name' => 'SECTION-A'
        ]);

        Section::create([
            'name' => 'SECTION-B'
        ]);

        Section::create([
            'name' => 'SECTION-C'
        ]);

        Section::create([
            'name' => 'SECTION-D'
        ]);
    }
}
