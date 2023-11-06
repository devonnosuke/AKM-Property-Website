<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PropertySeeder extends Seeder
{
	public function run()
	{
		// for ($i = 0; $i < 6; $i++) {
		$data = [
			'id' => 12,
			'type_name' => 'Type 99/999',
			'slug' => 'type-99-999 ',
			'address' => 'Sigi Biromaru',
			'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut deserunt, dolor quaerat quasi quas architecto atque alias sed numquam accusantium, reprehenderit veniam, maxime vitae ullam enim fuga adipisci officia! Error?',
			'harga_jual' => 999000000,
			'features' => '9 kamar mandi, 9 kamar, 9garasi',
			'image' => '999.jpg',
			'color' => '#f436db',
			'luas_tanah' => '999',
			'denah' => '999-denah.png',
		];
		// using query builder
		$this->db->table('property')->insert($data);
	}
}
