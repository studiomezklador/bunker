<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->command->info('Users table successfully seeded!');
		
		$this->call('PostsTableSeeder');
		$this->command->info('Posts Table successfully seeded!');

		$this->call('CategoriesTableSeeder');
		$this->command->info('Categories Table successfully seeded!');
	}

}
