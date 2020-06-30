<?php

namespace App\Console\Commands;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateDefaultUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:super:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create super user';

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
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        $empresa = Empresa::create([
            'nome' => 'RMS Sistemas',
        ]);

        User::create([
            'email' => $email,
            'password' => Hash::make($password),
            'name' => $name,
            'super_user'    => true,
            'empresa_id'    => $empresa->id
        ]);
    }
}
