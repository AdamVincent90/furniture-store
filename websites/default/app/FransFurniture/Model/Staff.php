<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 19/03/2019
 * Time: 17:29
 */

// Entity class which allows to access the staff table in MySql, uses specific logic and generics for the use of the
// staff queries

class Staff
{
    public $con;
    public $load;
    public $table;

    public function __construct()
    {
        $this->con = new Connection();
        $this->load = $this->con->open();
        $this->table = new DatabaseTable($this->load, 'admin', 'staff_id');
    }

    public function load_staff()
    {
        return $staff_fetch = $this->table->findAll(' ORDER BY firstname');
    }

    public function load_staff_details($key1)
    {
        return $staff_result = $this->table->find('staff_id', $key1);
    }

    public function edit_staff_details($key1)
    {

        if (password_verify($_POST['password'], $_SESSION['credential'])) {
            $this->table->update($key1);
            header('location: /admin/staff');
        } else {
            invalid();
        }
    }

    public function add_staff($record)
    {
        try {
            if ($record['password'] === $_POST['confirm_password']) {
                $record['password'] = password_hash($record['password'], PASSWORD_DEFAULT);

                $this->table->save($record);
            }
        } catch (\http\Exception\InvalidArgumentException $e) {
            $e->getMessage();
        }
    }

    public function delete_staff($id)
    {
        if (password_verify($_POST['password'], $_SESSION['credential'])) {
            $this->table->delete($id);
            header('location: /admin/staff');
        } else {
            invalid();
        }
    }
}