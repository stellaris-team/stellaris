<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user account';

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
        $user_username = $this->ask("Username");
        $user_name = $this->ask("Full name");
        $user_email = $this->ask("Email address");
        $user_password = $this->secret("Password");
        $user_password_confirm = $this->secret("Confirm password");

        // if ($user_password != $user_password_confirm)
        // {
        //     $this->error("Passwords do not match! Cancelling user creation.");
        //     return;
        // }

        $data = [
            'username' => $user_username,
            'name' => $user_name,
            'email' => $user_email,
            'password' => $user_password,
            'password_confirmation' => $user_password_confirm
        ];

        $hashData = [
            'username' => $user_username,
            'name' => $user_name,
            'email' => $user_email,
            'password' => Hash::make($user_password)
        ];

        // Validate input
        $validator = Validator::make($data,
            [
                'username' => ['required', 'alpha_num', 'max:255', 'unique:users'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );

        if ($validator->fails())
        {
            $this->error($validator->errors()->first());
            return;
        }

        if ($user = User::create($hashData))
        {
            $this->info("New user successfully created!");
        }
    }
}
