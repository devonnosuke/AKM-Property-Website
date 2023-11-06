<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Specification extends Seeder
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
				'id_property' => $id_property,
				'spec_name' => $i.'Pondasi99',
				'spec' => $i.'Batu 99',
			];
			// using query builder
			$this->db->table('specification')->insert($data);
		}
	}
}
