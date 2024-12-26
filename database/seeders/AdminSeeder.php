<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Supprimons d'abord tous les utilisateurs existants
        User::truncate();

        // Récupérons le rôle admin
        $adminRole = Role::where('slug', 'admin')->first();
        
        if (!$adminRole) {
            throw new \Exception('Le rôle admin n\'existe pas !');
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
            'is_active' => true
        ]);
             

    
    }
}
