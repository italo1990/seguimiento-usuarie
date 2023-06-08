<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);

        $user_voluntaries_permissions = [17, 18, 23 ,24, 21, 26];
        Role::findOrFail(3)->permissions()->sync($user_voluntaries_permissions);

        $user_general_coordinator_permissions = [1, 12, 13, 14, 15, 16, 17 , 18, 19, 20, 21, 22, 23, 24, 25, 26, 32];
        Role::findOrFail(4)->permissions()->sync($user_general_coordinator_permissions);
    }
}
