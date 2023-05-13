<?php

namespace App\Commands;

use App\Task;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class DeleteTaskCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'task:delete';

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

        $id = $this->ask('id?');

        try {
            Task::findOrFail($id)->delete();
            $this->info("Task deleted succefully!");
        } catch (Exception $e) {
            $this->error("Delete canceled");
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
