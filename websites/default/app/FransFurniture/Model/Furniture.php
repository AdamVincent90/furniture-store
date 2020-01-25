<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 26/02/2019
 * Time: 22:37
 */

// Entity class which allows to access the furniture table in MySql, uses specific logic and generics for the use of the
// furniture queries

class Furniture
{
    public $con;
    public $load;
    public $table;

    public function __construct()
    {
        $this->con = new Connection();
        $this->load = $this->con->open();
        $this->table = new DatabaseTable($this->load, 'furniture', 'id');
    }

    public function load_categories()
    {
        return $fetch = $this->table->findAll(' ORDER BY categoryId DESC');
    }

    public function edit_furniture($field, $key)
    {
        return $furniture_result = $this->table->find($field, $key);
    }

    public function amend_furniture($record)
    {
        $this->table->save($record);
    }

    public function delete_furniture($id)
    {
        $this->table->delete($id);
    }

    public function check_stock($layout_data)
    {
        if (empty($layout_data)) {
            echo '<h2>There is currently no stock of this specification of product</h2>';
        }
    }
}