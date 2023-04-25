<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create();
        $user = User::all()->first();
        $adminRole = Role::create(['name' => 'Admin']);
        $user->assignRole($adminRole);
        DB::table('user_preferences')->insert([
            'user_id' => $user->id,
            'theme' => 'light'
        ]);

        $permissions = [
            'Employee Management',
            'Leave Request Management',
            'Team Management',
            'Settings Management',
            'User Management',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
