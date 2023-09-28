<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Educational extends BaseController
{
    // This the default method of controller
    public function index()
    {
        // Get validation data to show error validation messages
        $data['validation'] = $this->validation;

        // Get all data in table with Some functions
        // which have been provided in codeigniter : findAll()
        $data['educational'] = $this->educationalModels->findAll();

        // Set title page
        $data['title'] = 'Education';
        $data['educational_active'] = 'curr-active';


        // Return the view with data
        return view('admin/educational', $data);
    }

    // This method is used to delete records from the table
    public function drop($id)
    {
        // Delete data in table with Some functions
        // which have been provided in codeigniter : delete($id)
        if ($this->educationalModels->delete($id)) {
            // Create a flashdata session to display alert
            setAlert('delete');
            // Return to previous controller
            return redirect()->back();
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Id:' . $id . 'Not Found!');
        }
    }

    // This method is used for validation and save data to table
    // query automatically edits records if found $POST_[id];
    // and the query will automatically add record if not found $POST_[id];
    public function save()
    {
        // Get all data POST with ci4 : getPost()
        $data = $this->request->getPost();

        // htmlspecialchars is used to prevent special characters from being executed by the browser
        $data = array_map('htmlspecialchars', $data);

        $id = $this->request->getVar('id');

        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, 'educational')) {

            // Insert or change records to table with functions provided by codeigniter : save($data)
            if (!$this->educationalModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException($this->NotFoundMsg);
            }

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert($id);

            // Redirect to index of controller
            return redirect()->to('/admin/educational');
        } else {
            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation('#edit-edu-modal-', '#add-edu-modal', $id);

            // Back to previous controller and send the old() data input form
            return redirect()->back()->withInput();
        }
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
            return CheckData($this->educationalModels->find($id));
        } else {
            // will return all records in the table and perform a query
            // using the methods of the model provided by codeigniter : findAll()
            return CheckData($this->educationalModels->findAll());
        }
    }
}
