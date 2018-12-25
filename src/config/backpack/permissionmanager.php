<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Models used in the User, Role and Permission CRUDs.
    |
    */

    'models' => [
        'user'       => App\Models\BackpackUser::class,
        'permission' => Backpack\PermissionManager\app\Models\Permission::class,
        'role'       => Backpack\PermissionManager\app\Models\Role::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Disallow the user interface for creating/updating permissions or roles.
    |--------------------------------------------------------------------------
    | Roles and permissions are used in code by their name
    | - ex: $user->hasPermissionTo('edit articles');
    |
    | So after the developer has entered all permissions and roles, the administrator should either:
    | - not have access to the panels
    | or
    | - creating and updating should be disabled
    */

    'allow_permission_create' => true,
    'allow_permission_update' => true,
    'allow_permission_delete' => true,
    'allow_role_create'       => true,
    'allow_role_update'       => true,
    'allow_role_delete'       => true,

    /*
    |--------------------------------------------------------------------------
    | Multiple-guards functionality
    |--------------------------------------------------------------------------
    |
    */
    'multiple_guards' => false,

    /*
    |--------------------------------------------------------------------------
    | Validation rules for requests
    |--------------------------------------------------------------------------
    |
    | "%id%" token is used to exclude current record id from unique rule.
    |
    */

    'validation' => [
        'permisssion' => [
            'store' => [
                'name' => 'required|string|max:255|unique:permissions',
            ],
            'update' => [
                'name' => 'required|string|max:255|unique:permissions,name,%id%',
            ],
        ],

        'role' => [
            'store' => [
                'name' => 'required|string|max:255|unique:roles',
            ],
            'update' => [
                'name' => 'required|string|max:255|unique:roles,name,%id%',
            ],
        ],

        'user' => [
            'store' => [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ],
            'update' => [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,%id%',
                'password' => 'string|min:6|confirmed',
            ],
        ],
    ],

];
