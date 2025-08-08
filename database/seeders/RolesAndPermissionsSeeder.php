<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

Permission::firstOrCreate(['name' => 'manage members']);
Permission::firstOrCreate(['name' => 'view reports']);
Permission::firstOrCreate(['name' => 'manage journalists']);
Permission::firstOrCreate(['name' => 'publish activities']);

$roleMember = Role::firstOrCreate(['name' => 'member']);
$roleJournalist = Role::firstOrCreate(['name' => 'journalist']);
$roleWilayaAdmin = Role::firstOrCreate(['name' => 'wilaya_admin']);
$roleNationalAdmin = Role::firstOrCreate(['name' => 'national_admin']);

$roleMember->syncPermissions(['manage members']);
$roleJournalist->syncPermissions(['manage journalists']);
$roleWilayaAdmin->syncPermissions(['manage members','manage journalists','view reports','publish activities']);
$roleNationalAdmin->syncPermissions(Permission::pluck('name')->toArray());

    }
}
