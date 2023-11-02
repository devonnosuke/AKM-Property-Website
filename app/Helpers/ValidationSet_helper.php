<?php

/**
 * Helper method to change value of form data
 */
function radioCheck($data, $value, $useOld = false)
{
    if ($useOld) {
        if ($data == $useOld) {
            return 'checked';
        }
    }

    if ($data == $value) {
        return 'checked';
    }
}


function activeCheck($val)
{
    if ($val) {
        return $val;
    }
    return '';
}

function oldCheck($field, $value)
{
    if (old($field)) {
        return old($field);
    } else {
        return $value;
    }
}

function validCheck($errMsg)
{
    if ($errMsg) {
        return 'invalid';
    }

    return 'valid';
}

function selectCheck($data, $value, $old = false)
{
    if ($data == $value) {
        return 'selected';
    }
    if ($data == $old) {
        return 'selected';
    }
}

function errorMsgCheck($errMsg)
{
    if ($errMsg) {
        return 'data-error="' . $errMsg . '"';
    }
}

// ================= Flashdata Session function

/**
 * Helper method to create flashdata session to display 
 * alert with showAlert() call in view
 * 
 * $info = id of the record can be edited or information deleted;
 *
 * @param string $info
 *
 * @return SetAlert|null
 */
function setAlert($info = false)
{
    // dd($id);
    if ($info) {
        if ($info == 'delete') {
            session()->setFlashdata('alert', 'Deleted!');
        } else {
            session()->setFlashdata('alert', 'Updated!');
        }
    } else {
        session()->setFlashdata('alert', 'Saved!');
    }
}

/**
 * Helper method to shown alert after setAlert() is executed
 * 
 * Examples:
 *      showAlert(session()->getFlashdata('alert'), 'TableName');
 *
 * @param mixed $sessionData
 * @param string $tableName
 *
 * @return ShowAlert|null
 */
function showAlert($sessionData)
{
    if ($sessionData) {
        return '<span class="flash-data" data-flashdata="' . $sessionData . '">';
    }
}

/**
 * Helper method to create flashdata session to display 
 * modal with showModalValidation() call in view
 * 
 * Examples:
 *    setModalValidation($id, '#add-data-modal', '#add-data-edit');
 *    $id = id of the record can be edited;
 *
 * @param string $editModalLink
 * @param string $addModalLink
 * @param integer $id
 *
 * @return SetModalValidation|null
 */
function setModalValidation($editModalLink = false, $addModalLink = false, $id = false)
{
    if ($id) {
        session()->setFlashdata('showModal', $editModalLink . $id);
    } else {
        session()->setFlashdata('showModal', $addModalLink);
    }
}

/**
 * Helper method to display the modal after setModalValidation()
 * is executed and display the modal on the page
 * 
 * Examples:
 *    showModalValidation(session()->getFlashdata('showModal'));
 *
 * @param mixed $sessionData
 *
 * @return ShowModalValidation|null
 */
function showModalValidation($sessionData)
{
    if ($sessionData) {
        return '<span class="flash-data-modal" data-flashdata="' . $sessionData . '"></span>';
    }
}


/**
 * Helper method to split string into an base a separator
 * 
 * Examples:
 *    splitString("one, two, three",',');
 *
 * @param string $string
 * @param string $separator
 *
 * @return splitString|null
 */
function splitString($string, $separator)
{
    return(explode($separator,$string));
}

function checkAvaiable($id_property, $promo) {
    foreach ($promo as $p ) {
        if ($p->id_property == $id_property) {
            return "disabled";
        }
    }
}

function readAvaiable($id_property, $promo) {
    foreach ($promo as $p ) {
        if ($p->id_property == $id_property) {
            return "<i> --telah memiliki promo-- </i>";
        }
    }
}

function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 0, ",", ".");
    return $hasil;
}

function getVisitor(){
    $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
    $db = \Config\Database::connect();
    $pengunjunghariini  = $db->query("SELECT * FROM visitor WHERE date='".$date."' GROUP BY ip")->getNumRows(); // Hitung jumlah pengunjung
    
    $dbpengunjung = $db->query("SELECT COUNT(hits) as hits FROM visitor")->getRow(); 
    
    $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
    
    $bataswaktu = time() - 300;
    
    $pengunjungonline  = $db->query("SELECT * FROM visitor WHERE online > '".$bataswaktu."'")->getNumRows(); // hitung pengunjung online
    
    
    $data['pengunjunghariini']=$pengunjunghariini;
    $data['totalpengunjung']=$totalpengunjung;
    $data['pengunjungonline']=$pengunjungonline;
    return $data;
}

function setOldSepec($flashName,$specification)
{
 
    session()->setFlashdata($flashName, $specification);
 
}

function getOldSpec($id, $flashName)
{
    // dd(session()->getFlashdata('spec'));
    if(session()->getFlashdata($flashName) != null){
        return session()->getFlashdata($flashName)[$id];
    }
    return false;
}

function validSpecCheck($data)
{
    if ($data == '') {
        return 'invalid';
    }

    return 'valid';
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
