<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        [
          'name'   => 'dev',
          'display_name'  => 'Developer',
        ],  
        [
          'name'   => 'author',
          'display_name' => 'Professor',
        ],
        [
          'name'   => 'audience',
          'display_name' => 'user',
        ],  
      ]);
    }
}
