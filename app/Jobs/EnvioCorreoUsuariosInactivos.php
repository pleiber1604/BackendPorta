<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Jobs\prueba;
use Illuminate\Support\Facades\Log;

class EnvioCorreoUsuariosInactivos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      
        $dateWarning = now()->subDays(30);
        // Obtener usuarios que no han iniciado sesión desde hace 30 días
        $inactiveUsers = User::where('last_login', '<', $dateWarning)->get();
        foreach ($inactiveUsers as $usuario) {
            Mail::to($usuario->email)->send(new \App\Mail\UserInactiveMailable($usuario));
            Log::info('Correo enviado a ' . $usuario->email);
        }
        
    }
}
