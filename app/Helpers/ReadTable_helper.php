<?php 

function getSlugPromoByIdPro($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('promo');
    $builder->select('*');
    $builder->where('id_property', $id);
    return $builder->get()->getRowArray()['slug'];
}

function specGetByProIdSeparate($id_property){ 
    $db = \Config\Database::connect();
    $builder = $db->table('specification');
    $builder->select('*');
    $builder->where('id_property', $id_property);
    
    $datas = $builder->get()->getResultArray();
    $spec_name = [];
    $spec = [];
    foreach ($datas as $data) {
        array_push($spec_name,$data['spec_name']);
        array_push($spec,$data['spec']);
    }
    
    $data = [
        'spec_name' => $spec_name,
        'spec' => $spec,
    ];
    
    return $data;
}

function getPromoByIdPro($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('promo');
    $builder->select('*');
    // $builder->join('property', "property.id = $this->table.id_property");
    $builder->where('id_property', $id);
    return $builder->get()->getRowArray();
}
