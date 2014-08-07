<?php
class UsersTableSeeder extends Seeder {

	public function run()
	{
		$pwd = '1234';

		DB::table('users')->truncate();

		$users = [
			['username' => 'admin',
			'email' => 'contact@studiomzk.com',
			'password' => Hash::make($pwd)
			],

			['username' => 'zef',
			'email' => 'se@studiomzk.com',
			'password' => Hash::make($pwd)
			],

			['username' => 'kiki',
			'email' => 'cd@studiomzk.com',
			'password' => Hash::make($pwd)
			]

		];

		foreach ($users as $user) {
			User::create($user);
		}
		//User::create($users);

	}
}