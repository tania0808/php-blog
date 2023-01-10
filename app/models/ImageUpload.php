<?php

class ImageUpload
{
    public $image_name;
    private $image_size;
    private $image_type;
    private $image_temp; // the temporary location where the uploaded image is stored
    private $uploads_folder = "./assets/";
    private $upload_max_size = 2*1024*1024; // max upload file size 2MB

    // allowed image types
    private $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

    public $error = '';

    // Class methods

    public function __construct($image){
        $this->image_name = $image['name'];
        $this->image_size = $image['size'];
        $this->image_type = $image['type'];
        $this->image_temp = $image['tmp_name'];

        $this->isImage();
        $this->imageNameValidation();
        $this->sizeValidation();
        $this->checkFile();
    }

    private function isImage(){
        // finfo_open - create a new instance of the file-info object
        // FILEINFO_MIME_TYPE - detects the file's mime type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $this->image_temp);
        if(!in_array($mime, $this->allowed_image_types)){
            return $this->error = 'Only [ .jpeg, .jpg, .png and .gif ] files are allowed';
        }

        finfo_close($finfo);
    }

    private function imageNameValidation(){
        return $this->image_name = filter_var($this->image_name, FILTER_SANITIZE_STRING);
    }

    private function sizeValidation(){
        if($this->image_size > $this->upload_max_size){
            return $this->error = 'File is bigger than 2MB';
        }
    }

    private function checkFile(){
        if(file_exists($this->uploads_folder.$this->image_name)){
            return $this->error = 'File already exists in folder';
        }
    }

    public function moveFile(){
        if(!move_uploaded_file($this->image_temp, $this->uploads_folder.$this->image_name)){
            return $this->error = 'There was an error, please try again';
        }
    }

    private function recordImage(){

    }

}