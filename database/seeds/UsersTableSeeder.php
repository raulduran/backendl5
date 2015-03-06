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
			'email' => 'demo@demo.com',
			'name' => 'Demo User',
			'password' => bcrypt('demo'),
			'role' => 'admin'
		]);
	}
}