<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
                
        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'marinero']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');

        $role2 = Role::create(['name' => 'vigia']);
        $role2->givePermissionTo('edit articles');
        $role2->givePermissionTo('delete articles');

        $role3 = Role::create(['name' => 'almirante']);
        $role3->givePermissionTo('publish articles');
        $role3->givePermissionTo('unpublish articles');

        $role4 = Role::create(['name' => 'capitan']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'nombres' => 'User Marinero',
            'email' => 'marinero@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'nombres' => 'User Vigia',
            'email' => 'vigia@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'nombres' => 'User Almirante',
            'email' => 'almirante@example.com',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'nombres' => 'User Capitan',
            'email' => 'capitan@example.com',
        ]);
        $user->assignRole($role4);
    }
}
