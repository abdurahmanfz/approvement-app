<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userIds = DB::table('users')->pluck('id');

        DB::table('tasks')->insert(
            [
                'id' => Uuid::uuid4()->toString(),
                'tasks_name' => 'First Task',
                'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.',
                'file' => '/public/files/dummy.pdf',
                'user_id' => $userIds[0]
            ]
        );
    }
}
