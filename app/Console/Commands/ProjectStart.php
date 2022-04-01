<?php

namespace App\Console\Commands;

use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ProjectStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'to register User';

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
        try{

            $name = $this->ask('Enter Your Name');
            $email = $this->ask('Enter Your Email');
            $password = $this->secret('Enter Your Pasword');
            User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),

            ]);
            $this->info('Your Account is Created');
            return Command::SUCCESS;

        }catch(Exception $e) {
            return Command::FAILURE;

        }
    }
}
