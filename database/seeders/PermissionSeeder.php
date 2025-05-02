<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            "role.view",
            "role.create",
            "role.edit",
            "role.delete",

            "product.view",
            "product.create",
            "product.edit",
            "product.delete",
        ];

        foreach ($permissions as $key => $value) {
            Permission::create(['name' => $value]);
        }
    }
}
