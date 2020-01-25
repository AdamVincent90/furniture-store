<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 22/03/2019
 * Time: 18:40
 */

// Entity class which allows to access the query table in MySql, uses specific logic and generics for the use of the
// query queries

class Query
{
    public $con;
    public $load;
    public $table;

    public function __construct()
    {
        $this->con = new Connection();
        $this->load = $this->con->open();
        $this->table = new DatabaseTable($this->load, 'query', 'query_id');
    }

    public function add_query($record)
    {
        $this->table->save($record);
    }

    public function load_query()
    {
        return $customer_queries = $this->table->find('complete', 'no');
    }

    public function load_archives()
    {
        return $completed_tasks = $this->table->find('complete', 'yes');
    }

    public function alter_query($record)
    {
        $this->table->update($record);
    }
}