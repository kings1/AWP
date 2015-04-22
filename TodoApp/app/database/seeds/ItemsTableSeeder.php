<?php

class ItemsTableSeeder extends Seeder {
	public function run(){

		DB::table('items')->delete();/*First delete table content*/

		$items = array(
			array(
				'owner_id' => 1,
				'name' => 'Buy milk',
				'done' => false
			),

			array(
				'owner_id' => 1,
				'name' => 'Return book to library',
				'done' => true
			),

			array(
				'owner_id' => 1,
				'name' => 'Do assignment',
				'done' => false
			),
		);

		DB::table('items')->insert($items);/*Insert data into table*/
	}
}