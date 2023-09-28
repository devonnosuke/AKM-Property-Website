<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Services extends BaseController
{
    private $title;

    // This the default method of controller
    public function __construct()
    {
        // Set title page
        $this->title = 'Services';
    }

    // This the default method of controller
    public function index()
    {
        // Get validation data to show error validation messages
        $data['validation'] = $this->validation;

        // Get all data in table with Some functions
        // which have been provided in codeigniter : findAll()
        $data['services'] = $this->servicesModels->findAll();
        $data['cta'] = $this->ctaModels->findAll();

        // Send title page
        $data['title'] = $this->title;
        $data['services_active'] = 'curr-active';


        // Return the view with data
        return view('admin/services', $data);
    }

    // This method is used to delete records from the table
    public function drop($id, $nameImage)
    {
        // $name = $this->request->getVar('name');

        // Delete picture in server
        if (unlink('assets/img/services/' . $nameImage)) {
            // Delete data in table with Some functions
            // which have been provided in codeigniter : delete($id)
            if ($this->servicesModels->delete($id)) {
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
        $img_file = $this->request->getFile('img');
        // Get Old image name if set
        $old_img = $this->request->getVar('old_img');

        // Set image convert extension
        $img_ext = 'jpg';

        // Generate New Img Name
        $img = imgGenerateName($img_file->getRandomName(), 'Service', $img_ext);

        // Check whether to insert or edit
        if (!$insert) {
            // Set the validation rules to be used (Rules to edit form)
            $validation_rules = 'servicesEdit';

            // Get POST id data with ci4 : getVar(name) and save to $data
            $data = [
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'description' => $this->request->getVar('description'),
                'features' => $this->request->getVar('features'),
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

            // Set the validation rules to be used (Rules to add form)
            $validation_rules = 'services';

            // Get all data POST with ci4 : getPost()
            $data = $this->request->getPost();

            // the name of pictue can be assign to $data
            $data['img'] = $img['nameWithNewExt'];
        }

        // dd($data);

        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, $validation_rules)) {

            // Move the image to server and delete old image
            if ($img_file->isValid() && !$img_file->hasMoved()) {

                // Move file to server
                $img_file->move('assets/img/services/', $img['nameWithOldExt']);

                // Convert Image to $img_ext value
                $convert = imgConvert($img['nameWithOldExt'], $img['nameOnly'], 'assets/img/services', $img_ext, 70);

                // Check if the upload and image manipulation process is success
                if ($img_file && $convert) {
                    if ($id) {
                        unlink('assets/img/services/' . $old_img);
                    }
                } else {
                    return new \CodeIgniter\Exceptions\PageNotFoundException('File Failed to save');
                }
            }

            // htmlspecialchars is used to prevent special characters from being executed by the browser
            $data = array_map('htmlspecialchars', $data);

            // Insert or change records to table with functions provided by codeigniter Model : save($data)
            if (!$this->servicesModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
            }

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert($id);

            // Redirect to index of controller
            return redirect()->to('/admin/services');
        } else {

            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation(false, '#add-services-modal', false);

            // Back to previous controller and send the old() data input form
            return redirect()->back()->withInput();
        }
    }


    // This method is used for save data to table
    public function cta_save()
    {
        $cta = [
            '',
            $this->request->getVar('cta_whatsapp'),
            $this->request->getVar('cta_telephone'),
            $this->request->getVar('cta_email'),
            $this->request->getVar('cta_whatsapp_text')
        ];

        for ($i = 1; $i <= 4; $i++) {

            $data = [
                'id' => $i,
                'cta_value' => $cta[$i],
            ];

            // htmlspecialchars is used to prevent special characters from being executed by the browser
            $data = array_map('htmlspecialchars', $data);

            // Insert or change records to table with functions provided by codeigniter Model : save($data)
            if (!$this->ctaModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
            }
        }

        // Set alert session to show notification flashdata
        // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
        setAlert();

        // Redirect to index of controller
        return redirect()->to('/admin/services');
    }

    // This Method to show the edit page
    public function edit($id)
    {

        $data = [
            'validation' => $this->validation,
            'title' => $this->title,
            'service' => $this->findAll($id),
            'services_active' => 'curr-active'
        ];

        return view('admin/service_edit', $data);
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
            return CheckData($this->servicesModels->find($id));
        } else {
            // will return all records in the table and perform a query
            // using the methods of the model provided by codeigniter : findAll()
            return CheckData($this->servicesModels->findAll());
        }
    }
}
