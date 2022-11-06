<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetToken extends Command
{

    protected $signature = 'get:token {user} {password}';
    protected $description = 'Command description';



    public function handle()
    {
        $http = new \GuzzleHttp\Client;

        $user = $this->argument('user');
        $password =  $this->argument('password');

        $response = $http->post(config('services.passport.login_endpoint'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => config('services.passport.client_id'),
                'client_secret' => config('services.passport.client_secret'),
                'username' => $user,
                'password' => $password,
            ]
        ]);

        $final = $response->getBody();

        return $final;

//        return Command::SUCCESS;
    }
}
