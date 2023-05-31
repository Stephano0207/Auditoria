<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      $role1=   Role::create(['name' => 'Admin']);
      $role2=   Role::create(['name' => 'Cliente']);

     Permission::create(['name' => 'admi.home'])->assignRole([$role1]);

      Permission::create(['name' => 'admi.producto.index'])->assignRole([$role1]);
      Permission::create(['name' => 'admi.producto.create'])->assignRole([$role1]);
     Permission::create(['name' => 'admi.producto.edit'])->assignRole([$role1]);
      Permission::create(['name' => 'admi.producto.destroy'])->assignRole([$role1]);


      Permission::create(['name' => 'admin.users.index'])->assignRole([$role1]);
      Permission::create(['name' => 'admin.users.edit'])->assignRole([$role1]);
      Permission::create(['name' => 'admin.users.update'])->assignRole([$role1]);

    }
}
