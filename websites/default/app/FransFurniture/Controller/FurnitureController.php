<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 26/02/2019
 * Time: 11:37
 */

// Controller is used to load the furniture related html.php files to the user. (Controller/Method)

class FurnitureController extends ViewController
{
    public $load_cat = [];
    public $con;
    public $loading;
    public $argument;

    public function __construct()
    {
        $con = new Connection();
        $this->loading = $con->open();
        $this->argument = new DatabaseTable($this->loading, 'furniture', 'id');
    }

    public function main()
    {
        $this->layout('furniture' . DIRECTORY_SEPARATOR . 'main', $this->argument->findAll());
        $this->layout->Load_Page();
    }

    public function category($key1)
    {
        $this->layout('furniture' . DIRECTORY_SEPARATOR . 'category', $this->argument->find('categoryId', $key1));
        $this->layout->Load_Page();
    }

    public function condition($key1, $key2)
    {
        $this->layout('furniture' . DIRECTORY_SEPARATOR . 'condition', $this->argument->andFind('categoryId', 'cond', $key1, $key2));
        $this->layout->Load_Page();
    }
}