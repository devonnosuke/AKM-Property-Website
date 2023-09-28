<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Portfolio extends BaseController
{
    // This the default method of controller
    public function index()
    {
        // Get validation data to show error validation messages
        $data['validation'] = $this->validation;

        // Get all data in table with Some functions
        // which have been provided in codeigniter : findAll()
        $data['portfolio'] = $this->portfolioModels->findAll();

        // Set title page
        $data['title'] = 'Portfolio';
        $data['portfolio_active'] = 'curr-active';


        // Return the view with data
        return view('admin/portfolio', $data);
    }

    // This method is used to delete records from the table
    public function drop($id, $nameImage = false)
    {
        if ($nameImage) {
            // $name = $this->request->getVar('name');

            unlink('assets/img/gallery/pic/' . $nameImage);
        }

        // Delete data in table with Some functions
        // which have been provided in codeigniter : delete($id)
        if ($this->portfolioModels->delete($id)) {
            // Create a flashdata session to display alert
            setAlert($id);
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
        // Get id data POST with ci4 : getVar(name)
        $id = $this->request->getVar('id');

        $type = $this->request->getVar('type');

        // Get file data POST with ci4 : getFile(name)
        // this variable will contain the youtube id if the add video form
        // is accepted or will contain the uploaded picture file if the add pic form is accepted
        $img_file = $this->request->getFile('file_name');

        // Set image convert extension

        if ($type == 'image') {
            // Generate New Img Name
            $img_ext = 'jpg';
            $img = imgGenerateName($img_file->getRandomName(), 'Portfolio', $img_ext);
            // $pic_name = $img_file->getRandomName();
            // Add new filename to $data and save to database
            $data['file_name'] = $img['nameWithNewExt'];
        } else {
            $data['file_name'] = $this->request->getVar('file_name');
        }

        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, 'portfolio')) {

            // Move the image to server if the type value=image
            if ($type == 'image') {

                // Check if the file_name has moved
                if ($img_file->isValid() && !$img_file->hasMoved()) {
                    // Move image to server
                    $img_file->move('assets/img/gallery/pic/', $img['nameWithOldExt']);

                    if ($img['oldExtOnly'] !== $img_ext && $img['oldExtOnly'] !== 'jpeg') {
                        // Convert Image to $img_ext value
                        imgConvert($img['nameWithOldExt'], $img['nameOnly'], 'assets/img/gallery/pic/', $img_ext);
                    }

                    // Resize image by maintaining aspect ratio
                    imgResize($img['nameWithNewExt'], 'assets/img/gallery/pic/', 950, 950, true, 40);
                }
            }

            // htmlspecialchars is used to prevent special characters from being executed by the browser
            $data = array_map('htmlspecialchars', $data);

            // Insert or change records to table with functions provided by codeigniter : save($data)
            if (!$this->portfolioModels->save($data)) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('Query Or Databases Error');
            }

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert($id);

            // Redirect to index of controller
            return redirect()->back();
        } else {
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
            return CheckData($this->portfolioModels->find($id));
        } else {
            // will return all records in the table and perform a query
            // using the methods of the model provided by codeigniter : findAll()
            return CheckData($this->portfolioModels->findAll());
        }
    }
}
