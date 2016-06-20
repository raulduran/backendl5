<?php

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('permission_role')->truncate();
        DB::table('role_user')->truncate();
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        //User
        $admin = User::create([
            'email' => 'demo@demo.com',
            'name' => 'Demo User',
            'password' => 'demo'
        ]);

        //Roles
        $role_admin = Role::create(['name' => 'admin', 'label' => 'Administrador']);
        $role_editor = Role::create(['name' => 'editor', 'label' => 'Editor']);
        $role_user = Role::create(['name' => 'user', 'label' => 'Usuario']);

        //Permission
        $permission_admin_user = Permission::create(['name' => 'admin_user', 'label' => 'Administrar usuarios']);

        //Roles Users
        $admin->roles()->save($role_admin);

        //Roles Users
        $role_admin->givePermissionTo($permission_admin_user);
    }
}
