<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
    protected $description = 'Create an user and put into database';

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
     * @return int
     */
    public function handle()
    {
        $username = $this->ask('Speak the name');
        $password = $this->secret('Declare the password');
        $retypePassword = $this->secret("Recheck again sir");

        if ($password === $retypePassword) {
            $user = new User;
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->save();
        }

        else {
            echo("Something's wrong my dear\n");
        }
    }
}
