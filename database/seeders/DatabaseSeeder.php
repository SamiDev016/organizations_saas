<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::insert([
            ['name' => 'super_admin'],
            ['name' => 'national_admin'],
            ['name' => 'wilaya_admin'],
            ['name' => 'baladia_admin'],
            ['name' => 'neighborhood_admin'],
            ['name' => 'user'],
        ]);

        User::factory()->create([
            'name' => 'Halfware',
            'email' => 'admin@half-ware.com',
            'password' => '12345678',
            'role_id' => Role::where('name', 'super_admin')->first()->id,
        ]);
        
        
    }
}
