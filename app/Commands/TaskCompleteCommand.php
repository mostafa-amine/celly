<?php

namespace App\Commands;

use App\Task;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class TaskCompleteCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'task:complete';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tasks = Task::all(['id', 'task', 'status'])->toArray();

        $this->table(
            ['id', 'Task', 'Status'],
            $tasks
        );

        $taskId = $this->ask('id? ');

        try {
            Task::findOrFail($taskId)->update([
                'status' => 'done'
            ]);

            $this->info("Task Updated");
        } catch (Exception $e) {
            $this->error("Task Not Found!");
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
