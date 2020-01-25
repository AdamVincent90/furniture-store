<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 22/03/2019
 * Time: 21:03
 */

// Entity class which allows to access the category table in MySql, uses specific logic and generics for the use of the
// category queries

class Category
{
    public $con;
    public $load;
    public $table;

    public function __construct()
    {
        $this->con = new Connection();
        $this->load = $this->con->open();
        $this->table = new DatabaseTable($this->load, 'category', 'id');
    }

    public function load_categories()
    {
        return $categories = $this->table->findAll(' ORDER BY name');
    }

    public function load_category_details($key)
    {
        return $category = $this->table->find('id', $key);
    }

    public function amend_category($record)
    {
            $this->table->save($record);
    }

    public function delete_category($key)
    {
        $this->table->delete($key);
    }
}