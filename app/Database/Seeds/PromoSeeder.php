<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PromoSeeder extends Seeder
{
	public function run()
	{
        $db      = \Config\Database::connect();
		$builder = $db->table('property');
		$builder->select('id');
		$builder->orderBy('id','DESC');
		$builder->limit(1);
		$id_property = $builder->get()->getResultArray();
		$id_property = $id_property[0]['id'];

		// for ($i = 0; $i < 6; $i++) {
		$data = [
			'nama_promo' => 'promo 999',
			'slug' => 'promo-999',
			'id_property' => $id_property,
			'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut deserunt, dolor quaerat quasi quas architecto atque alias sed numquam accusantium, reprehenderit veniam, maxime vitae ullam enim fuga adipisci officia! Error kah?.',
			'brosur' => '999-brosur.jpg',
			'bonus' => 'bonus 1,bonus 2,bonus 3',
			'bebas' => 'bebas 1,bebas 2,bebas 3',
			
		];
		// using query builder
		$this->db->table('promo')->insert($data);
	}
}
