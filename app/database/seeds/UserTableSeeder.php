<?php
class UserTableSeeder extends Seeder {

	public function run()
	{
		$user = new User;

		$user->fill([
				'name' => 'admin',
				'mail' => 'contact@studiomzk.com'
			]);
		$user->pwd = Hash::make('1234');

		$user->save();
	}
}