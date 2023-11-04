<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Promo extends BaseController
{
    private $title;

    // This the default method of controller
    public function __construct()
    {
        // Set title page
        $this->title = 'promo';
    }

    // This the default method of controller
    public function index()
    {
        // Get validation data to show error validation messages
        $data['validation'] = $this->validation;

        // Get all data in table with Some functions
        // which have been provided in codeigniter : findAll()
        $data['promos'] = $this->promoModels->findAll();
        $data['property'] = $this->propertyModels->findAll();

        // Send title page
        $data['title'] = $this->title;
        $data['promo_active'] = 'curr-active';

        // Return the view with data
        return view('admin/promo', $data);
    }

    // This method is used to delete records from the table
    public function drop($id, $nameImage)
    {
        // Delete picture in server
        if (unlink('assets/img/promo/' . $nameImage)) {
            // Delete data in table with Some functions
            // which have been provided in codeigniter : delete($id)
            if ($this->promoModels->delete($id)) {
                // Create a flashdata session to display alert
                setAlert('delete');
                // Return to previous controller
                return redirect()->back();
            } else {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Id:' . $id . 'Not Found!');
            }
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Name image:' . $nameImage . 'Not Found!');
        }
    }

    // This method is used for validation and save data to table
    // query automatically edits records if found $POST_[id];
    // and the query will automatically add record if not found $POST_[id];
    public function save($insert = false)
    {
        // Get id data POST with ci4 : getVar(name)
        $id = $this->request->getVar('id');

        // Get Old image name if set
        $old_img = $this->request->getVar('old_brosur');

        // Set image convert extension
        $img_ext = 'jpg';

        // Get image data POST with ci4 : getFile(name)
        $img_file = $this->request->getFile('brosur');
        
        // Get image data POST with ci4 : getFile(name)
        $nama_promo = $this->request->getVar('nama_promo');

        // Generate New Img Name
        $newImageName = imgGenerateName($img_file->getRandomName(), 'brosur-'.url_title($nama_promo), $img_ext);

        // Check whether to insert or edit
        if (!$insert) {
            // Set the validation rules to be used (Rules to edit form)
            // $validation_rules = 'promo';
            
            // Get POST id data with ci4 : getVar(name) and save to $data
            $data = [
                'id' => $id,
                'nama_promo' => $this->request->getVar('nama_promo'),
                'id_property' => $this->request->getVar('id_property'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'brosur' => $newImageName['nameWithNewExt'],
                'bonus' => $this->request->getVar('bonus'),
                'bebas' => $this->request->getVar('bebas'),
            ];

                 
            // le has been uploaded then set the name image
            // With new type and assign to $data
            // dd($old_img);
            if ($img_file->getError() !== 4) {
                $data['brosur'] = $newImageName['nameWithNewExt'];
            } else {
                // if else the old image name can be saved
                $data['brosur'] = $old_img;
            }

        } else {
            
            
            
            // Get all data POST with ci4 : getPost()
            $data = $this->request->getPost();
            // the name of pictue can be assign to $data
            $data['brosur'] = $img_file;
        }

        // Set the validation rules to be used (Rules to add form)
         if ($img_file->isValid()) {
            $validation_rules = 'promo';
        } else {
            $validation_rules = 'promoEdit';
        }
        
        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, $validation_rules)) {
            // dd($this->validation->run($data, $validation_rules));
            if ($img_file->isValid() && !$img_file->hasMoved()) {

                // Move file to server
                if ( $img_file->move('assets/img/promo/', $newImageName['nameWithOldExt'])) {
                    // Convert Image to $img_ext value
                    $convert = imgConvert($newImageName['nameWithOldExt'], $newImageName['nameOnly'], 'assets/img/promo', $img_ext);
     
                    // Crop and Resize image
                    // $fit = imgFit($newImageName['nameWithNewExt'], 'assets/img/promo/');
                    $fit = imgResize($newImageName['nameWithNewExt'], 'assets/img/promo/',1080, 1080, true);
                }

                // Check if the upload and image manipulation process is success
                if ($img_file && $convert && $fit) {
                    if ($id) {
                        unlink('assets/img/promo/' . $old_img);
                    }
                } else {
                    return new \CodeIgniter\Exceptions\PageNotFoundException('Gambar Gagal Disimpan!');
                }

                $data['brosur'] = $newImageName['nameWithNewExt'];
            }

            $data['slug'] = url_title($this->request->getVar('nama_promo'), '-', true);
            // htmlspecialchars is used to prevent special characters from being executed by the browser
            $data = array_map('htmlspecialchars', $data);

            // dd($data);
            // Insert or change records to table with functions provided by codeigniter Model : save($data)
            if (!$this->promoModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
            }
            
            // Convert and crop images

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert($id);
            
            // Redirect to index of controller
            return redirect()->to('/admin/promo');
        } else {
            
            // dd($this->validation->list_errors());
            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation(false, '#add-property-modal', false);

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
            'promo' => $this->promoModels->find($id),
            // 'property' => $this->propertyModels->findAll(),
        ];
        
        $data['promo_active'] = 'curr-active';

        $data['properties'] = $this->propertyModels->find($data['promo']->id_property);

        $data['type_name']  = $data['properties']->type_name;
        $data['color']  = $data['properties']->color;


        return view('admin/promo_edit', $data);
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
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Id/slug Not Found!');
            }
        }

        if ($id) {
            // will return 1 record based on the received $id and
            // perform a query using the method of the model provided by codeigniter : find()
            return CheckData($this->promoModels->find($id));
        } else {
            // will return all records in the table and perform a query
            // using the methods of the model provided by codeigniter : findAll()
            return CheckData($this->promoModels->findAll());
        }
    }
}
