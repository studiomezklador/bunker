<?php
class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();
		$faker->addProvider(new Faker\Provider\Miscellaneous($faker));
		$faker->addProvider(new Faker\Provider\DateTime($faker));
		$faker->addProvider(new Faker\Provider\en_US\Text($faker));


		DB::table('categories')->truncate();

		$total_users = count(User::get());

		for ($i = 0; $i < 11; $i++) {

		    $cat = Category::create([
		    	'users_id' => rand(1, $total_users),
		    	 'title' => preg_replace('/[^a-z0-9\-]+/i', '', str_replace(' ','-',strtolower($faker->realText(12)))),
		    	 'desc' => $faker->realText(rand(20, 30)),
		    	 'status' => rand(0, 1)
		    ]);

		}
	}
}