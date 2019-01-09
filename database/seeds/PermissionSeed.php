<?php

use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        $Roles = [
            'booster',
            'admin',
            'developer'
        ];

        foreach ($Roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
