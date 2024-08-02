<?php

use App\Http\Middleware\IsUser;
use App\Http\Middleware\CekRole;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsSiswa;
use Illuminate\Foundation\Application;
use App\Http\Middleware\CheckAdminOrUser;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->web(append: [CekRole::class]);
        $middleware->alias([
            'admin' => IsAdmin::class,
            'siswa' => IsSiswa::class,
            'role' => CekRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
