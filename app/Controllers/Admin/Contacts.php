<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Contacts extends BaseController
{
    // This the default method of controller
    public function index()
    {
        // Get validation data to show error validation messages
        $data['validation'] = $this->validation;

        // Get all data in table with Some functions
        // which have been provided in codeigniter : findAll()
        $data['social'] = $this->socialcontactModels->findAll();
        $data['contact'] = $this->addressContactModels->find(1);
        $data['contact1'] = $this->addressContactModels->find(2);

        // Set title page
        $data['title'] = 'Contact & Social';
        $data['contacts_active'] = 'curr-active';

        // Return the view with data
        return view('admin/contacts', $data);
    }

    // This method is used to delete records from the table
    public function drop($id)
    {
        // Delete data in table with Some functions
        // which have been provided in codeigniter : delete($id)
        if ($this->socialcontactModels->delete($id)) {
            // Create a flashdata session to display alert
            session()->setFlashdata('alert', 'Deleted');
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

        $contact_type = $this->request->getPost('contact_type');

        // Create a link that opens in the user's email or telephone program
        if ($contact_type == 'telephone' || $contact_type == 'telegram') {
            $data['link'] = "tel:+" . $data['link'];
        } elseif ($contact_type == 'envelope') {
            $data['link'] = "mailto:" . $data['link'];
        }  elseif ($contact_type == 'whatsapp') {
            $data['link'] = "https://wa.me/".$data['link']."?text=Hallo saya telah melihat info di akmproperti.com dan ingin bertanya tentang ";
        }

        // Get id data POST with ci4 : getVar(name)
        $id = $this->request->getVar('id');

        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, 'social_contact')) {

            // htmlspecialchars is used to prevent special characters from being executed by the browser
            $data = array_map('htmlspecialchars', $data);

            // Insert or change records to table with functions provided by codeigniter : save($data)
            if (!$this->socialcontactModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
            }

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert($id);

            // Redirect to index of controller
            return redirect()->to('/admin/contacts');
        } else {
            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation(false, '#add-social-modal', false);

            // Back to previous controller and send the old() data input form
            return redirect()->back()->withInput();
        }
    }

    // This method is used for validation and save data to table
    // query automatically edits records if found $POST_[id];
    // and the query will automatically add record if not found $POST_[id];
    public function saveAddressContact()
    {
        // Get all data POST with ci4 : getPost()
        $data = $this->request->getPost();
        // Get id data POST with ci4 : getVar(name)
        $id = $this->request->getVar('id');

        $data['id'] = $id;
        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, 'address_contact')) {

            // htmlspecialchars is used to prevent special characters from being executed by the browser
            $data = array_map('htmlspecialchars', $data);

            // Insert or change records to table with functions provided by codeigniter : save($data)
            if (!$this->addressContactModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
            }

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert($id);

            // Redirect to index of controller
            return redirect()->to('/admin/contacts');
        } else {
            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation(false, '#add-social-modal', false);

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
            return CheckData($this->socialcontactModels->find($id));
        } else {
            // will return all records in the table and perform a query
            // using the methods of the model provided by codeigniter : findAll()
            return CheckData($this->socialcontactModels->findAll());
        }
    }
}
