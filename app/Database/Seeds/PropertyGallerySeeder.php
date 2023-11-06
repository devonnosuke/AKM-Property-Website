<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PropertyGallerySeeder extends Seeder
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
		
		for ($i = 0; $i < 3; $i++) {
			$data = [
				'image_name' => $i.'999-gallery.jpg',
				'id_property' => $id_property,
			];
			// using query builder
			$this->db->table('property_img')->insert($data);
		}
	}
}
