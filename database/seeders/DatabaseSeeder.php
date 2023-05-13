<?php

namespace Database\Seeders;

use App\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $number = 1;
        for ($i = 0; $i < 8; $i++) {
            Task::create([
                'task' => "Task " . $number,
                'status' => 'in_progress'
            ]);
            $number++;
        }
    }
}
