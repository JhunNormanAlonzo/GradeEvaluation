<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $subjects = [
            ['subject_code' => 'GenEd1', 'description' => 'Understanding the Self', 'unit' => 3],
            ['subject_code' => 'GenEd2', 'description' => 'Purposive Communication', 'unit' => 3],
            ['subject_code' => 'GenEd3', 'description' => 'Mathematics in the Modern World', 'unit' => 3],
            ['subject_code' => 'VED', 'description' => 'Good Manners and Right Conduct', 'unit' => 3],
            ['subject_code' => 'PF-1', 'description' => 'Movement Competency Training', 'unit' => 3],
            ['subject_code' => 'NSTP1', 'description' => 'CWTS/ROTC/LTS', 'unit' => 3],
            ['subject_code' => 'IT101', 'description' => 'Introduction to Computing', 'unit' => 3],
            ['subject_code' => 'IT102', 'description' => 'IT Fundamentals', 'unit' => 3],
            ['subject_code' => 'IT103', 'description' => 'Programming 1', 'unit' => 3],
            ['subject_code' => 'GenEd4', 'description' => 'Readings in Philippines History with IP Educ', 'unit' => 3],
            ['subject_code' => 'GenEd5', 'description' => 'The Contemporary World', 'unit' => 3],
            ['subject_code' => 'GenEdEl1', 'description' => 'Gender and Society with Peace Educ', 'unit' => 3],
            ['subject_code' => 'PE-2', 'description' => 'Fitness Training', 'unit' => 3],
            ['subject_code' => 'NSTP2', 'description' => 'CWTS/ROTC/LTS', 'unit' => 3],
            ['subject_code' => 'IT104', 'description' => 'Programming 2', 'unit' => 3],
            ['subject_code' => 'IT105', 'description' => 'Integrated Application Software', 'unit' => 3],
            ['subject_code' => 'IT106', 'description' => 'Discrete Mathematics', 'unit' => 3],
            ['subject_code' => 'GenEd6', 'description' => 'Art Appreciation', 'unit' => 3],
            ['subject_code' => 'GenEd7', 'description' => 'Science Technology and Society', 'unit' => 3],
            ['subject_code' => 'GenEd EI 2', 'description' => 'Entrepreneurial Mind', 'unit' => 3],
            ['subject_code' => 'RIZAL', 'description' => 'Life, Works and Writings of Dr. Jose Rizal', 'unit' => 3],
            ['subject_code' => 'PF-3', 'description' => 'Dance Sports/Individual/Group/Outdoor', 'unit' => 2],
            ['subject_code' => 'IT201', 'description' => 'Accounting for IT', 'unit' => 3],
            ['subject_code' => 'IT202', 'description' => 'Networking 1', 'unit' => 3],
            ['subject_code' => 'IT203', 'description' => 'Data Structures and Algorithms', 'unit' => 3],
            ['subject_code' => 'IT204', 'description' => 'Object-Oriented Programming', 'unit' => 3],
            ['subject_code' => 'GenEd EI3', 'description' => 'Living the IT Era', 'unit' => 3],
            ['subject_code' => 'GenEd 8', 'description' => 'Ethics', 'unit' => 3],
            ['subject_code' => 'LIT', 'description' => 'Survey of the Philippine Literature in English', 'unit' => 3],
            ['subject_code' => 'PF-4', 'description' => 'Team Sport', 'unit' => 3],
            ['subject_code' => 'IT205', 'description' => 'Networking2', 'unit' => 3],
            ['subject_code' => 'IT206', 'description' => 'Human Computer Interaction 1', 'unit' => 3],
            ['subject_code' => 'IT207', 'description' => 'Information Management', 'unit' => 3],
            ['subject_code' => 'IT208', 'description' => 'Event-Driven Programming', 'unit' => 3],
            ['subject_code' => 'IT301', 'description' => 'Methods of Research', 'unit' => 3],
            ['subject_code' => 'IT302', 'description' => 'Platform Technologies 1 (Tangible Technologies)', 'unit' => 3],
            ['subject_code' => 'IT303', 'description' => 'Human Computer Interaction 2', 'unit' => 3],
            ['subject_code' => 'IT304', 'description' => 'Information Assurance and Security 1', 'unit' => 3],
            ['subject_code' => 'IT305', 'description' => 'System Integration and Architecture 1', 'unit' => 3],
            ['subject_code' => 'IT306', 'description' => 'Web Systems and Technologies', 'unit' => 3],
            ['subject_code' => 'IT307', 'description' => 'Application Development and Emerging Technologies', 'unit' => 3],
            ['subject_code' => 'IT308', 'description' => 'Fundamentals of Database Systems', 'unit' => 3],
            ['subject_code' => 'IT309', 'description' => 'Information Assurance and Security 2', 'unit' => 3],
            ['subject_code' => 'IT310', 'description' => 'System Integration and Architecture 2', 'unit' => 3],
            ['subject_code' => 'IT311', 'description' => 'Integrative Programming', 'unit' => 3],
            ['subject_code' => 'IT312', 'description' => 'Platform Technologies 2 (Intangible Technologies)', 'unit' => 3],
            ['subject_code' => 'IT313', 'description' => 'IT Elective 1: Advance Database System', 'unit' => 3],
            ['subject_code' => 'IT314', 'description' => 'IT Elective 2: Mobile Application Development', 'unit' => 3],
            ['subject_code' => 'IT315', 'description' => 'IT Elective 3: Information System', 'unit' => 3],
            ['subject_code' => 'IT316', 'description' => 'Capstone Project and Research 1', 'unit' => 3],
            ['subject_code' => 'IT317', 'description' => 'IT Elective 4: Management Information System', 'unit' => 3],
            ['subject_code' => 'IT318', 'description' => 'Social and Professional Issues', 'unit' => 3],
            ['subject_code' => 'IT401', 'description' => 'Capstone Project and Research 2', 'unit' => 3],
            ['subject_code' => 'IT402', 'description' => 'System Administration and Maintenance', 'unit' => 3],
            ['subject_code' => 'IT403', 'description' => 'IT Elective 5: Cloud Computing', 'unit' => 3],
            ['subject_code' => 'IT404', 'description' => 'IT Elective 6: Internet of Things', 'unit' => 3],
            ['subject_code' => 'IT405', 'description' => 'On-The-Job Training (486 hours)', 'unit' => 9],
        ];
        foreach ($subjects as $subjectData) {
            Subject::create([
                'subject_code' => $subjectData['subject_code'],
                'description' => $subjectData['description'],
                'unit' => $subjectData['unit'],
            ]);
        }

    }
}
