<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory(20)->create();
        \App\Models\Action::factory(3)
          ->state(new Sequence(
              ['name' => 'Read'],
              ['name' => 'Write'],
              ['name' => 'Delete'],
          ))->create();
          \App\Models\Permission::factory(4)
            ->state(new Sequence(
                ['name' => 'Super Admin'],
                ['name' => 'Admin'],
                ['name' => 'HR Admin'],
                ['name' => 'Employee'],
            ))->create();
        \App\Models\User::factory(10)->create();
    }
}
