<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:remove {userid : The ID of the user (run user:list to retrieve IDs)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes a user account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userid = $this->argument('userid');
        if ($user = \App\User::find($userid))
        {
            if ($this->confirm("Are you sure you want to remove {$user->username}?"))
            {
                $user->delete();
                $this->info('User removed.');
            }
        }
        else { $this->error('Unable to find user with that ID. To get a list of users, please run `php artisan user:list`.'); }
    }
}
