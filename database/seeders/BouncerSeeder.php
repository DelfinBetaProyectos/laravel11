<?php

namespace Database\Seeders;

use Silber\Bouncer\BouncerFacade as Bouncer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->createRoles();
    $this->createAbilities();
    
    Bouncer::allow('admin')->everything();  // allow the role 'admin' to have access to everything
  }

  /**
   * Create Roles
   */
  protected function createRoles()
  {
  	Bouncer::role()->create([
      'name' => 'admin',
      'title' => 'Administrator',
    ]);

    Bouncer::role()->create([
      'name' => 'manager',
      'title' => 'Manager',
    ]);

    Bouncer::role()->create([
      'name' => 'user',
      'title' => 'User',
    ]);
  }

  /**
   * Create Abilities
   */
  protected function createAbilities()
  {
  	Bouncer::ability()->create([
      'name' => '*',
      'title' => 'All Abilities',
      'entity_type' => '*',
    ]);
  }
}
