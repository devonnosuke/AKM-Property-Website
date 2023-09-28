<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Personal extends BaseController
{
    // This the default method of controller
    public function index()
    {

        // Get validation data to show error validation messages
        $data['validation'] = $this->validation;

        // Get One data in table with Some functions
        // which have been provided in codeigniter : find($id)
        $data['personal'] = $this->personalModels->find(1);

        // Set title page
        $data['title'] = 'Personal About';
        $data['personal_active'] = 'curr-active';


        // Return the view with data
        return view('admin/personal', $data);
    }

    // Drop method disabled because we only allow 1 record in personal table to be use
    // public function drop($id)
    // {

    //     if ($this->personalModels->delete($id)) {
    //         session()->setFlashdata('notif', 'Data with id=' . $id . ' has been deleted!');
    //         return redirect()->to('/');
    //     } else {
    //         return new \CodeIgniter\Exceptions\PageNotFoundException('error');
    //     }
    // }

    // This method is used for validation and save data to table
    // query automatically edits records if found $POST_[id];
    // and the query will automatically add record if not found $POST_[id];
    public function save()
    {

        // Get File from Form
        $cvFile = $this->request->getFile('cv');
        // Get old filename
        $cvOld = $this->request->getVar('cvOld');

        // Get image from form
        $imgFile = $this->request->getFile('img');
        // Get old image name
        $imgOld = $this->request->getVar('imgOld');

        // Get data POST from form uses getvar($name)
        $data = [
            'id' => 1,
            'fullname' => $this->request->getVar('fullname'),
            'born' => $this->request->getVar('born'),
            'age' => $this->request->getVar('age'),
            'gender' => $this->request->getVar('gender'),
            'country' => $this->request->getVar('country'),
            'about_text' => $this->request->getVar('about_text'),
        ];

        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, 'personal')) {

            // Check if the file has been uploaded
            if ($cvFile->isValid() && !$cvFile->hasMoved()) {
                // Create a random name
                $cvFileName = imgGenerateName($cvFile->getRandomName(), 'PersonalCV');
                // Move files to server
                $cvFile->move('assets/cv/', $cvFileName['nameWithOldExt']);
                // Delete old files
                unlink('assets/cv/' . $cvOld);
                // Add new filename to $data to save to database
                $data['cv'] = $cvFileName['nameWithOldExt'];
            } else {
                // Add old filename to $data to save to database
                $data['cv'] = $cvOld;
            }

            // Check if the picture has been uploaded
            if ($imgFile->isValid() && !$imgFile->hasMoved()) {

                // Create a random name
                // $imgFileName = ;

                $img = imgGenerateName($imgFile->getRandomName(), 'Personal', 'jpg');

                // Move picture to server
                $imgFile->move('assets/img/', $img['nameWithOldExt']);

                // Convert Image to $img_ext value
                imgConvert($img['nameWithOldExt'], $img['nameOnly'], 'assets/img/', 'jpg');

                // Resize image by maintaining aspect ratio
                // imgResize($img['nameWithNewExt'], 'assets/img/', 850, 850, true, 40);
                imgFit($img['nameWithNewExt'], 'assets/img/', 750, 750, 75);

                // Delete old files
                unlink('assets/img/' . $imgOld);

                // Add new filename to $data to save to database
                $data['img'] = $img['nameWithNewExt'];
            } else {
                // Add old filename to $data to save to database
                $data['img'] = $imgOld;
            }

            // htmlspecialchars is used to prevent special characters from being executed by the browser
            $data = array_map('htmlspecialchars', $data);

            // Insert or change records to table with functions provided by codeigniter : save($data)
            if ($this->personalModels->save($data)) {
                setAlert();
                return redirect()->back();
            }
        } else {
            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation(false, '#personal-modal');

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
            return CheckData($this->personalModels->find($id));
        } else {
            // will return all records in the table and perform a query
            // using the methods of the model provided by codeigniter : findAll()
            return CheckData($this->personalModels->findAll());
        }
    }
}
