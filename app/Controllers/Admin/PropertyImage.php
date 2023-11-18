<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Tinify;

class PropertyImage extends BaseController
{
    // This the default method of controller
    public function index($id_property)
    {
        // Get validation data to show error validation messages
        $data['validation'] = $this->validation;

        // Get all data in table with Some functions
        // which have been provided in codeigniter : findAll()
        $data['propertyImages'] = $this->propertyImgModels->getPropertyById($id_property);
        $data['property'] = $this->propertyModels->find($id_property);

        // Set title page
        $data['title'] = 'ImageProperty';
        $data['property_active'] = 'curr-active';
        // dd($data);
        // Return the view with data
        return view('admin/propertyimages', $data);
    }

    public function save()
    {
        $id_property = $this->request->getVar('id_property');
        $img_files = $this->request->getFiles();
        // dd($img_files);

        // d($id_property);
        // dd($img_files);

        // Set image convert extension
        $img_ext = 'jpg';
        
        $data['img'] = $img_files['img'];

        // Run validation with the rules set in App/Config/Validation.php
        if ($this->validation->run($data, "property_images")) {
            // Uplaod images
            if (!$images = imgUploadBatch($img_files, $img_ext, 'Properti-Gallery')) {
                return new \CodeIgniter\Exceptions\PageNotFoundException('imgUploadBatch() Error');
            }

            // Convert and crop images
            if ($images) {
                $i = 0;
                foreach ($images as $imageName) {
                    // dd($imageName);
                    // Convert Image to $img_ext value
                    $convert = imgConvert( $imageName['nameWithOldExt'], $imageName['nameOnly'], 'assets/img/property', $img_ext, 40);

                    // Crop and Resize image
                    $fit = imgFit($imageName['nameWithNewExt'], 'assets/img/property');
                    $fit = imgResize($imageName['nameWithNewExt'], 'assets/img/property/',450, 600, true);

                    // \Tinify\setKey("dp2V008T2SVxk8TXLsf0YvfMJ3b0DSfH");

                    // $source = \Tinify\fromFile("assets/img/property/".$imageName['nameWithOldExt']);
                    // $resized = $source->resize(array(
                    //     "method" => "fit",
                    //     "width" => 650,
                    //     "height" => 650
                    // ));
                    // $resized->toFile("assets/img/property/".$imageName['nameWithOldExt']);


                    // Check if the upload and image manipulation process is success
                    if ($img_files && $fit) {

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

            // Set alert session to show notification flashdata
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setAlert($id_property);

            // Redirect to index of controller
            return redirect()->to('/admin/property-image/'.$id_property);

        }  else {

            // Set show modal session to shown up modal form if validation is wrong
            // Initialization of this function can be seen in App/Helper/ValidationSet_helper.php
            setModalValidation(false, '#modal-picture', false);

            // Back to previous controller and send the old() data input form
            return redirect()->back()->withInput();
        }

    }

    // This method is used to delete records from the table
    public function drop($imageName)
    {
        // Delete picture in server
        if (file_exists('assets/img/property/' . $imageName)) {
            unlink('assets/img/property/' . $imageName);
        }

        // Delete data in table with Some functions
        // which have been provided in codeigniter : delete($id)
        if ($this->propertyImgModels->delete($imageName)) {
            // Create a flashdata session to display alert
            setAlert($imageName);
            // Return to previous controller
            return redirect()->back();
        }
    }
}
