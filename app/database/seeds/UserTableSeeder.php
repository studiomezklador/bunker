<?php
class UserTableSeeder extends Seeder {

	public function run()
	{
		$user = new User;

		$user->fill([
				'username' => 'admin',
				'email' => 'contact@studiomzk.com'
			]);
		$user->password = Hash::make('1234');

		$user->save();
	}
}