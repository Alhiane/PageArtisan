<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'creator']);
        Role::create(['name' => 'inviter']);

        // Create Permissions
        Permission::create(['name' => 'super']);
        Permission::create(['name' => 'manage_workspaces']);
        Permission::create(['name' => 'manage_pages']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'view_feedback']);

        // Assign Permissions to Roles
        $adminRole = Role::findByName('admin');
        $adminRole->syncPermissions(Permission::all());

        $creatorRole = Role::findByName('creator');
        $creatorRole->syncPermissions(['manage_workspaces', 'manage_pages', 'view_feedback']);

        $inviteeRole = Role::findByName('inviter');
        $inviteeRole->syncPermissions(['view_feedback']);

        // Create admin role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create admin user
        $adminUser = User::create([
            'name' => 'Adminstrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'), // Change this to the desired password
        ]);

        // Assign the admin role to the admin user
        $adminUser->assignRole($adminRole);

        // Sync all permissions to the admin role
        $adminRole->syncPermissions(Permission::all());
    }
}
