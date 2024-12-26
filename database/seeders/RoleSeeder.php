<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Vérifie si les rôles existent déjà avant de les créer
        if (Role::count() === 0) {
            Role::create([
                'name' => 'Administrateur',
                'slug' => 'admin'
            ]);
    
            Role::create([
                'name' => 'Manager',
                'slug' => 'manager'
            ]);
    
            Role::create([
                'name' => 'Staff',
                'slug' => 'staff'
            ]);
    
            Role::create([
                'name' => 'Client',
                'slug' => 'client'
            ]);
        }
    }
}
