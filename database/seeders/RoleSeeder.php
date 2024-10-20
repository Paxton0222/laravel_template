<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group = new Role();
        $group->id = 1;
        $group->name = '超級管理員';
        $group->desc = 'super user';
        $group->save();
    }
}
