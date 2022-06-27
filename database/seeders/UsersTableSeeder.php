<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'admin', 
            'name' => 'admin', 
            'email' => 'adminweb@banyuwangikab.go.id',
            'password' => bcrypt('adminbanyuwangikab!@@!')
        ]);

        $user = User::create([
            'username' => 'operator', 
            'name' => 'operator', 
            'email' => 'operatorweb@banyuwangikab.go.id',
            'password' => bcrypt('operatorbanyuwngikab@2021!!')
        ]);

        $user = User::create([
            'username' => 'operator', 
            'name' => 'operator', 
            'email' => 'operatorweb2@banyuwangikab.go.id',
            'password' => bcrypt('operator2banyuwngikab@2021!!')
        ]);

        $role = Role::create(['name' => 'Operator']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
