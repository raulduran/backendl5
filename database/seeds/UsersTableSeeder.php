<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		DB::table('users')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');

		$faker = Faker\Factory::create();

		User::create([
			'email' => 'info@backendl5.com',
			'name' => 'BackendL5',
			'password' => 'admin',
			'role' => 'admin'
		]);

		for ($i=0; $i<9; $i++)
		{
			$username = $faker->username;
			User::create([
				'email' => $faker->email,
				'name' => $faker->name,
				'password' => 'test',
				'role' => 'user'
			]);
		}
	}
}