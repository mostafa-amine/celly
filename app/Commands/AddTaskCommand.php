<?php

namespace App\Commands;

use App\Task;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use function Termwind\{render};


class AddTaskCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'task:create';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'store task in the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $task = $this->ask('Task? ');

        try {
            Task::create([
                'task' => $task,
                'status' => 'in_progress'
            ]);

            $this->info("Task Created Succefully");
        } catch (Exception $e) {
            $this->error("You have an error");
        }
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
