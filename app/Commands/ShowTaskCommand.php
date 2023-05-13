<?php

namespace App\Commands;

use App\Task;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class ShowTaskCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'task:show {
        id : The Task Id
    }';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Show A Task';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $task = Task::where('id', $this->argument('id'))->get(['task', 'status'])->toArray();
        if (empty($task)) {
            $this->error("Task Not Found 🥲");
        } else {
            $this->table(
                ['task', 'status'],
                $task
            );
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
