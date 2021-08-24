<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleUser = Role::create(['name' => 'Users']);

        Permission::create(['name' => 'admin.home'])->assignRole($roleAdmin);
        Permission::create(['name' => 'users.home'])->assignRole($roleUser);

        Permission::create(['name' => 'users.emails.index'])->assignRole($roleUser);
        Permission::create(['name' => 'users.emails.create'])->assignRole($roleUser);

        Permission::create(['name' => 'admin.users.index'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin.users.create'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin.users.update'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin.users.destroy'])->assignRole($roleAdmin);
    }
}
