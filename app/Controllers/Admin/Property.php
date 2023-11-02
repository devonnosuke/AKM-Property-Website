<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Property extends BaseController
{
    private $title;

    // This the default method of controller
    public function __construct()
    {
        // Set title page
        $this->title = 'Property';
    }

    // This the default method of controller
    public function index()
    {
        // Get validation data to show error validation messages
        $data['validation'] = $this->validation;

        // Get all data in table with Some functions
        // which have been provided in codeigniter : findAll()
        $data['property'] = $this->propertyModels->findAll();

        // Send title page
        $data['title'] = $this->title;
        $data['property_active'] = 'curr-active';

        // Return the view with data
        return view('admin/property', $data);
    }

    // This method is used to delete records from the table
    public function drop($id, $nameImage)
    {
        // $name = $this->request->getVar('name');

        // Delete picture in server
        if (unlink('assets/img/property/' . $nameImage)) {
            // Delete data in table with Some functions
            // which have been provided in codeigniter : delete($id)
            $images = $this->propertyImgModels->getImageByProId($id);
            foreach ($images as $image) {
                if (!unlink('assets/img/property/' . $image['image_name'])) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('ImageFile:' . $image['image_name'] . 'Not Found!');
                } else {
                    if (!$this->propertyImgModels->delete($image['image_name'])) {
                        throw new \CodeIgniter\Exceptions\PageNotFoundException('ImageID:' . $image['image_name'] . 'Not Found!');
                    }
                }
            }
            
            // Delete data in table with Some functions
            // which have been provided in codeigniter : delete($id)
            if($this->specificationModels->deleteByProId($id)){
            
                if ($this->propertyModels->delete($id)) {
                    
                    // Create a flashdata session to display alert
                    setAlert('delete');
                    // Return to previous controller
                    return redirect()->back();
                } else {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('property_id:' . $id . 'Not Found!');
                }

            } else {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('IdProperty In spec table:' . $id . 'Not Found!');
            }
        }
    }

    // This method is used for validation and save data to table
    // query automatically edits records if found $POST_[id];
    // and the query will automatically add record if not found $POST_[id];
    public function save($insert = false)
    {
        // dd($this->request->getVar('features'));
        // dd($this->request->getVar());
        // Get id data POST with ci4 : getVar(name)
        $id = $this->request->getVar('id');

        // Get images[] data POST with ci4 : getFile(name)
        $img_files = $this->request->getFiles();
        
        // Get Old image name if set
        $old_img = $this->request->getVar('old_img');
        $old_denah = $this->request->getVar('old_denah');

        // spec_data
        $specification_name = $_POST['spec_name'];
        $specification = $_POST['spec'];

        // Set image convert extension
        $img_ext = 'jpg';

        // Get image data POST with ci4 : getFile(name)
        $img_file = $this->request->getFile('image');
        $denah_file = $this->request->getFile('denah');
        $type_name = $this->request->getVar('type_name');

        // Generate New Img Name
        $newImageName = imgGenerateName($img_file->getRandomName(), 'properti', $img_ext);
        // Generate New Denah Img Name
        $newDenahImageName = imgGenerateName($denah_file->getRandomName(), 'properti '.$type_name.' ', $img_ext);

        // Check whether to insert or edit
        if (!$insert) {
            // Set the validation rules to be used (Rules to edit form)
            $validation_rules = 'propertyEdit';
            
            // Get POST id data with ci4 : getVar(name) and save to $data
            $data = [
                'id' => $id,
                'type_name' => $this->request->getVar('type_name'),
                'address' => $this->request->getVar('address'),
                'description' => $this->request->getVar('description'),
                'harga_jual' => $this->request->getVar('harga_jual'),
                'features' => $this->request->getVar('features'),
                'image' => $newImageName['nameWithNewExt'],
                'color' => strtoupper($this->request->getVar('color')),
                'luas_tanah' => $this->request->getVar('luas_tanah'),
                'luas_bangunan' => $this->request->getVar('luas_bangunan'),
                'denah' => $newDenahImageName['nameWithNewExt'],
            ];

            // If the file has been uploaded then set the name image
            // With new type and assign to $data
            // dd($old_img);
            if ($img_file->getError() !== 4) {
                $data['image'] = $newImageName['nameWithNewExt'];
            } else {
                // if else the old image name can be saved
                $data['image'] = $old_img;
            }

            // If the file has been uploaded then set the name image
            // With new type and assign to $data
            // dd($old_img);
            if ($denah_file->getError() !== 4) {
                $data['denah'] = $newDenahImageName['nameWithNewExt'];
            } else {
                // if else the old image name can be saved
                $data['denah'] = $old_denah;
            }

            // ==== add spec data
            // d($specification);
            $id_property = $this->request->getVar('id');
            $this->specificationModels->deleteByProId($id_property);
            for ($i=0; $i < (count($specification)); $i++) {

                $specc['id_property'] = $id_property;
                
                $specc['spec_name'] = $specification_name[$i]; 
                
                $specc['spec'] = $specification[$i]; 

                if (!$this->specificationModels->save($specc)) {
                    return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
                }
                
                // array_push($specValidation,$spec);
                // d($specc);
            }
            // dd($specc);


        } else {
            
            // Set the validation rules to be used (Rules to add form)
            $validation_rules = 'property';
            
            // Get all data POST with ci4 : getPost()
            $data = $this->request->getPost();
            $data['color'] = strtoupper($this->request->getVar('color'));
            // the name of pictue can be assign to $data
            $data['image'] = $img_file;
            $data['denah'] = $denah_file;
        }

        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, $validation_rules)) {
            // dd($this->validation->run($data, $validation_rules));
            if ($img_file->isValid() && !$img_file->hasMoved()) {

                // Move file to server
                if ( $img_file->move('assets/img/property/', $newImageName['nameWithOldExt'])) {
                    // Convert Image to $img_ext value
                    $convert = imgConvert($newImageName['nameWithOldExt'], $newImageName['nameOnly'], 'assets/img/property', $img_ext);
     
                    // Crop and Resize image
                    // $fit = imgFit($newImageName['nameWithNewExt'], 'assets/img/property/');
                    $fit = imgResize($newImageName['nameWithNewExt'], 'assets/img/property/',1080, 1080, true);

                }

                // Check if the upload and image manipulation process is success
                if ($img_file && $convert && $fit) {
                    if ($id) {
                        unlink('assets/img/property/' . $old_img);
                    }
                } else {
                    return new \CodeIgniter\Exceptions\PageNotFoundException('Gambar Gagal Disimpan!');
                }

                $data['image'] = $newImageName['nameWithNewExt'];
            }

            if ($denah_file->isValid() && !$denah_file->hasMoved()) {

                // Move file to server
                if ( $denah_file->move('assets/img/property/', $newDenahImageName['nameWithOldExt'])) {
                    // Convert Image to $img_ext value
                    $convert = imgConvert($newDenahImageName['nameWithOldExt'], $newDenahImageName['nameOnly'], 'assets/img/property', $img_ext);
     
                    // Crop and Resize image
                    // $fit = imgFit($newDenahImageName['nameWithNewExt'], 'assets/img/property/');
                    $fit = imgResize($newImageName['nameWithNewExt'], 'assets/img/property/',1080, 1080, true);

                }

                // Check if the upload and image manipulation process is success
                if ($denah_file && $convert && $fit) {
                    if ($id) {
                        unlink('assets/img/property/' . $old_denah);
                    }
                } else {
                    return new \CodeIgniter\Exceptions\PageNotFoundException('Gambar Gagal Disimpan!');
                }

                $data['denah'] = $newDenahImageName['nameWithNewExt'];
            }


            $data['slug'] = url_title($this->request->getVar('type_name'), '-', true);

            unset($data['spec_name']);
            unset($data['spec']);
            // dd($data);

            // htmlspecialchars is used to prevent special characters from being executed by the browser
            $data = array_map('htmlspecialchars', $data);

            // Insert or change records to table with functions provided by codeigniter Model : save($data)
            if (!$this->propertyModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
            }
            
            $id_property = $this->propertyModels->getLastid();
            $id_property = $id_property[0]['id'];
            
            // Convert and crop images
            if ($insert && $img_files['img'][0]->getError() !== 4) {
                
                
                // Uplaod images
                if (!$images = imgUploadBatch($img_files, $img_ext)) {
                    return new \CodeIgniter\Exceptions\PageNotFoundException('imgUploadBatch() Error');
                }

                $i = 0;
                foreach ($images as $imageName) {
                    // dd($imageName);
                    // Convert Image to $img_ext value
                    $convert = imgConvert( $imageName['nameWithOldExt'], $imageName['nameOnly'], 'assets/img/property', $img_ext, 78);

                    // Crop and Resize image
                    // $fit = imgFit($imageName['nameWithNewExt'], 'assets/img/property');
                    $fit = imgResize($newImageName['nameWithNewExt'], 'assets/img/property/',1080, 1080, true);


                    // Check if the upload and image manipulation process is success
                    if ($img_files && $convert && $fit) {

                        $dataImages = [
                            'image_name'=>$imageName['nameWithNewExt'],
                            'id_property'=>$id_property,
                        ];
                        // Insert or change records to table with functions provided by codeigniter Model : save($data)
                        $this->propertyImgModels->simpan($dataImages);
                    } else {
                        return new \CodeIgniter\Exceptions\PageNotFoundException('File Failed to save');
                    }


                }
            
            }

            if ($insert) {
                // ==== add spec data
                for ($i=0; $i < (count($specification)); $i++) {

                    $spec['id_property'] = $id_property;
                    
                    $spec['spec_name'] = $specification_name[$i]; 
                    
                    $spec['spec'] = $specification[$i]; 

                    if (!$this->specificationModels->save($spec)) {
                        return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
                    }
                
                    // array_push($specValidation,$spec);
                    // d($spec);
                }
                // dd($spec);
            }

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert($id);

            // Redirect to index of controller
            return redirect()->to('/admin/property');
        } else {

            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation(false, '#add-property-modal', false);
            setOldSepec('spec',$specification);
            setOldSepec('spec_name',$specification_name);
            // dd();

            // Back to previous controller and send the old() data input form
            return redirect()->back()->withInput();
        }
    }

    // This Method to show the edit page
    public function edit($id)
    {
        // getImgList($this->propertyImgModels);
        $data = [
            'validation' => $this->validation,
            'title' => $this->title,
            'property' => $this->findAll($id),
            'images' =>getImgList($this->propertyImgModels),
            // 'spec_name'=>$this->specificationModels->getByProId($id),
        ];

        // ==== read spec data
        $specification = $this->specificationModels->getByProId($id);
        $spec_name = [];
        $spec = [];

        for ($i=0; $i < (count($specification)); $i++) {
            

            array_push($spec_name,$specification[$i]['spec_name']) ; 
            array_push($spec,$specification[$i]['spec']) ; 
            
            // $data['spec'] = $specification[$i]['spec'];
        }

        $data['spec_name'] = implode(',',$spec_name);
        $data['spec'] = implode(',',$spec);
        $data['spec_count'] = count($specification);


        $data['property_active'] = 'curr-active';

        return view('admin/property_edit', $data);
    }

    // This method is used to retrieve all records from the table
    // or return 1 record if the $id parameter is accepted
    public function findAll($id)
    {
        // This function is used to check whether the query process was executed successfully
        function CheckData($record)
        {
            if ($record) {
                return $record;
            } else {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Id Not Found!');
            }
        }

        if ($id) {
            // will return 1 record based on the received $id and
            // perform a query using the method of the model provided by codeigniter : find()
            return CheckData($this->propertyModels->find($id));
        } else {
            // will return all records in the table and perform a query
            // using the methods of the model provided by codeigniter : findAll()
            return CheckData($this->propertyModels->findAll());
        }
    }
}
