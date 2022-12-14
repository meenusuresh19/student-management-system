<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;


class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'name' => 'Anu',
            'subject' => 'Maths',
        ]);
        Teacher::create([
            'name' => 'Anila',
            'subject' => 'Science',
        ]);
        Teacher::create([
            'name' => 'Hasna',
            'subject' => 'History',
        ]);
    }
}
