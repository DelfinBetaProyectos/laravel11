<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Dayan - Admin
    $user = User::factory()->create([
      'firstname' => 'Dayan',
      'lastname' => 'Betancourt',
      'email' => 'dayan@kubilabs.com',
      'password' => Hash::make('dayan123')
    ]);

    // Alfredo - Admin
    $user = User::factory()->create([
      'firstname' => 'Alfredo',
      'lastname' => 'Cubillos',
      'email' => 'alfredo@kubilabs.com',
      'password' => Hash::make('alfredo123')
    ]);
  }
}
