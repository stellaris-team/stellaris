<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ListUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists all registered users';

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
        $headers = ['ID', 'Username', 'Name', 'Email address', 'Created at'];
        $users = \App\User::all(['id', 'username', 'name', 'email', 'created_at'])->toArray();
        $this->table($headers, $users);
    }
}
