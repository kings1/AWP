<?php

class UsersTableSeeder extends Seeder {
	public function run(){

		DB::table('users')->delete(); /*First delete table content*/

		$users = array(
			array(
				'name' => 'Kings',
				'password' => Hash::make('test'),
				'email' => 'kingsy_great1@yahoo.com'
			)
		);

		DB::table('users')->insert($users); /*Insert data into users table*/
	}
}