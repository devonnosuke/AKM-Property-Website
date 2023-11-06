<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    public function index()
    {
        
        $data['title'] = 'Dashboard';
        $data['dashboard_active'] = 'curr-active';
        $data['visitor'] = getVisitor();
        $data['validation'] = $this->validation;
        $data['personal'] = $this->personalModels->findAll()[0];
        return view('admin/dashboard', $data);
    }

    public function save()
    {
        // Get all data POST with ci4 : getPost()
        $data = $this->request->getPost();
        // dd($data);       

        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, 'personal')) {

            // htmlspecialchars is used to prevent special characters from being executed by the browser
            $data = array_map('htmlspecialchars', $data);

            // Insert or change records to table with functions provided by codeigniter : save($data)
            if (!$this->personalModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
            }

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert(1);

            // Redirect to index of controller
            return redirect()->to('/admin/dashboard');
        } else {
            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation(false, '#edit-profile', false);

            // Back to previous controller and send the old() data input form
            return redirect()->back()->withInput();
        }
    }
}
