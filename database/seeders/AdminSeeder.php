<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Crea (o actualiza) el usuario administrador del panel /dashboard.
     *
     * IMPORTANTE: cambia esta contraseña desde el propio panel apenas
     * puedas — quedó fija aquí solo para el primer acceso.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['username' => 'admin123'],
            [
                'name' => 'Administrador',
                'password' => 'Racer2001',
            ]
        );
    }
}
