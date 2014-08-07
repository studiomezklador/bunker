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

		$this->call('UsersTableSeeder')->command->info('Users table successfully seeded!');
		//$this->call('PostsTableSeeder')->command->info('Posts Table successfully seeded!');
	}

}
