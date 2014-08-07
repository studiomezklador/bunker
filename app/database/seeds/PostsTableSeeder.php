<?php
class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();
		$faker->addProvider(new Faker\Provider\Miscellaneous($faker));
		$faker->addProvider(new Faker\Provider\DateTime($faker));
		$faker->addProvider(new Faker\Provider\en_US\Text($faker));


		DB::table('posts')->truncate();

		$total_users = count(User::get());

		for ($i = 0; $i < ($total_users * 10); $i++) {
			$title = $faker->sentence(5);

		    $user = Post::create([
		    	'users_id' => rand(1, $total_users),
		        'categories_id' => rand(0,9),
		        'title' => $title,
		        'slug' => preg_replace('/[^a-z0-9\-]+/i', '', str_replace(' ','-',strtolower($title))),
		        'content' => $faker->realText(rand(10,100)),
		    ]);
		}

	}
}