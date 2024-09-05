<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SubAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subAdmin = User::create([
            'name' => 'Sub Admin',
            'email' => 'subadmin@example.com',
            'password' => Hash::make('12345678'),
        ]);
        $subAdminRole = Role::create(['name' => 'sub-admin']);
        $subAdmin->assignRole($subAdminRole);
    }
}
