<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 22/03/2019
 * Time: 20:16
 */

// Entity class which allows to access the banner table in MySql, uses specific logic and generics for the use of the
// banner queries

class Banner
{
    public $con;
    public $load;
    public $table;

    public function __construct()
    {
        $this->con = new Connection();
        $this->load = $this->con->open();
        $this->table = new DatabaseTable($this->load, 'banner', 'banner_id');
    }

    public function load_updates()
    {
        return $updates = $this->table->findAll(' ORDER BY banner_date DESC LIMIT 10');
    }

    public function add_notice($record)
    {
        if (password_verify($_POST['confirm_password'], $_SESSION['credential'])) {
            $this->table->save($record);
            echo '<p>Your Banner submitted</p>';
        } else {
            echo '<p>Invalid Password</p>';
        }
    }
}