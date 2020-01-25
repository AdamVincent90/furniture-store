<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 26/02/2019
 * Time: 23:06
 */

// Controller is used to load the admin related html.php files to the user. (Controller/Method)

class AdminController extends ViewController
{
    public function home()
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'home');
        $this->layout->Load_Page();
    }

    public function categories($key1 = "")
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'categories', $key1);
        $this->layout->Load_Page();
    }

    public function staff()
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'staff');
        $this->layout->Load_Page();
    }

    public function amendstaff($key1 = "")
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'amendstaff', $key1);
        $this->layout->Load_Page();
    }

    public function addstaff($key1 = "")
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'addstaff', $key1);
        $this->layout->Load_Page();
    }

    public function archive($key1 = "")
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'archive', $key1);
        $this->layout->Load_Page();
    }

    public function banner($key1 = "")
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'banner', $key1);
        $this->layout->Load_Page();
    }

    public function furniture($key1 = "")
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'furniture', $key1);
        $this->layout->Load_Page();
    }

    public function furniturearchive($key1 = "")
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'furniturearchive', $key1);
        $this->layout->Load_Page();
    }

    public function addfurniture($key1 = "")
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'addfurniture', $key1);
        $this->layout->Load_Page();
    }

    public function addcategory($key1 = "")
    {
        $this->layout('admin' . DIRECTORY_SEPARATOR . 'addcategory', $key1);
        $this->layout->Load_Page();
    }
}