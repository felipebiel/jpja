<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);


        $gate->define('Administrador', function(User $user){
            return $user->Entidade->tipo == 'Administrador'; /* as regras sempre espera retorno boleano*/
        });

        
    }
}
