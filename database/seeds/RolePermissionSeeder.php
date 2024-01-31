<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);

        // Permission List as array
        $permissions = [

            [
                'group_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'librarian',
                'permissions' => [
                    // manage-category Permissions
                    'book.create',
                    'book.view',
                    'book.edit',
                    'book.delete',
                ]
            ],
            [
                'group_name' => 'post',
                'permissions' => [
                    // post Permissions
                    'post.create',
                    'post.view',
                    'post.edit',
                    'post.delete',
                    'post.approve',
                ]
            ],
            [
                'group_name' => 'post-notification',
                'permissions' => [
                    // post-notification Permissions
                    'notification.view',
                ]
            ],
            [
                'group_name' => 'author',
                'permissions' => [
                    // author Permissions
                    'author.view',
                    'author.edit',
                    'author.delete',
                    'author.approve',
                ]
            ],
            [
                'group_name' => 'ads',
                'permissions' => [
                    // ads Permissions
                    'ads.create',
                    'ads.view',
                    'ads.edit',
                    'ads.delete',
                    'ads.approve',
                ]
            ],
        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
