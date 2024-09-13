<?php

namespace App\Console\Commands;

use App\Jobs\EnvioCorreoUsuariosInactivos;
use App\Models\User;
use Illuminate\Console\Command;

class EnviarCorreos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:enviar-correos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar correos a usuarios que no han iniciado sesión hace 30 días';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        EnvioCorreoUsuariosInactivos::dispatch();
        

        $this->info('Cola de correos gerenada!');
    }
}
