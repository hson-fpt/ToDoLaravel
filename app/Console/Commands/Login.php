<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\AuthController;

class Login extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $auth = new AuthController();
        $auth->login($username, $password);
    }
}
