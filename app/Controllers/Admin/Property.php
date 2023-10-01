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
            if ($this->propertyModels->delete($id)) {
                // Create a flashdata session to display alert
                setAlert('delete');
                // Return to previous controller
                return redirect()->back();
            } else {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Id:' . $id . 'Not Found!');
            }
        }
    }

    // This method is used for validation and save data to table
    // query automatically edits records if found $POST_[id];
    // and the query will automatically add record if not found $POST_[id];
    public function save($insert = false)
    {
        // Get id data POST with ci4 : getVar(name)
        $id = $this->request->getVar('id');
        // Get file data POST with ci4 : getFile(name)
        $img_files = $this->request->getFiles();
        
        $img = $this->request->getFile('image');
        // Get Old image name if set
        $old_img = $this->request->getVar('old_img');

        // Set image convert extension
        $img_ext = 'jpg';
        

        // Generate New Img Name
        // $imgNewNames = imgGenerateBatchName($img_files, 'Properti', $img_ext);
        // dd($imgNewNames);
        // $img = imgGenerateName($img_file->getRandomName(), 'Properti', $img_ext);

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
            ];

            // If the file has been uploaded then set the name image
            // With new type and assign to $data
            if ($img_file->getError() !== 4) {
                $data['img'] = $img['nameWithNewExt'];
            } else {
                // if else the old image name can be saved
                $data['img'] = $old_img;
            }
        } else {

           $images = imgUploadBatch($img_files, $img_ext);

            // Set the validation rules to be used (Rules to add form)
            $validation_rules = 'property';

            // Get all data POST with ci4 : getPost()
            $data = $this->request->getPost();
            // dd($img_files);
            // the name of pictue can be assign to $data
            $data['img'] = $images[0]['nameWithNewExt'];
        }

        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, $validation_rules)) {
            
            foreach ($images as $imageName) {
                $i = 0;
            // Move the image to server and delete old image
                if ($img_files['img'][$i++]->isValid()) {

                    // Move file to server
                    // $img_file->move('assets/img/property/', $img['nameWithOldExt']);

                    // Convert Image to $img_ext value
                    $convert = imgConvert($imageName['nameWithOldExt'],$imageName['nameOnly'] , 'assets/img/property', $img_ext, 78);

                    // Crop and Resize image
                    $fit = imgFit($imageName['nameWithNewExt'], 'assets/img/property');

                    // Check if the upload and image manipulation process is success
                    if ($img_file && $convert && $fit) {

                        if ($id) {
                            unlink('assets/img/property/' . $old_img);
                        }
                    } else {
                        return new \CodeIgniter\Exceptions\PageNotFoundException('File Failed to save');
                    }
                }
            }

            // htmlspecialchars is used to prevent special characters from being executed by the browser
            // dd($data);
            $data = array_map('htmlspecialchars', $data);

            // Insert or change records to table with functions provided by codeigniter Model : save($data)
            if (!$this->propertyModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
            }

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert($id);

            // Redirect to index of controller
            return redirect()->to('/admin/property');
        } else {

            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation(false, '#add-slider-modal', false);

            // Back to previous controller and send the old() data input form
            return redirect()->back()->withInput();
        }
    }

    // This Method to show the edit page
    public function edit($id)
    {
        $data = [
            'validation' => $this->validation,
            'title' => $this->title,
            'slider' => $this->findAll($id),
        ];
        $data['sliders_active'] = 'curr-active';

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
