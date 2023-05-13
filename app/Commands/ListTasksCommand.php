<?php

namespace App\Commands;

use App\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

use function Termwind\render;

class ListTasksCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'task:list {--status=}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'list all tasks';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('status') === 'done') {
            $tasks = Task::all(['id', 'task', 'status'])->where('status', 'done')->toArray();

            $this->table(
                ['id', 'Task', 'Status'],
                $tasks
            );
        } else if ($this->option('status') === 'in_progress') {
            $tasks = Task::all(['id', 'task', 'status'])->where('status', 'in_progress')->toArray();

            $this->table(
                ['id', 'Task', 'Status'],
                $tasks
            );
        } else {
            $tasks = Task::all(['id', 'task', 'status'])->toArray();

            $this->table(
                ['id', 'Task', 'Status'],
                $tasks
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
