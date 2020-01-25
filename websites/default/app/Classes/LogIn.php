<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 26/02/2019
 * Time: 23:22
 */

// A class in which is designed to check the login credentials of a user and store their details in a Session.


class LogIn
{
    public $connection;
    public $con;
    public $load;
    public $query = [];


    // Open the connection to the database with the relevant entity class required.
    public function __construct()
    {
        $this->connection = new Connection();
        $this->con = $this->connection->open();
        $this->load = new DatabaseTable($this->con, 'admin', ':id');
    }

    // Function which compares the users log-in credentials to their database counterpart.
    public function verify()
    {
        $this->query = $this->load->find('staff_id', $_POST['username']);

        foreach ($this->query as $row) {
            $password = $row['password'];
            $username = $row['staff_id'];
            $firstname = $row['firstname'] . ' ' . $row['lastname'];
        }

        if (isset($password)) {
            if (password_verify($_POST['pass'], $password)) {
                $_SESSION['loggedin'] = $firstname;
                $_SESSION['staffTrack'] = $username;
                $_SESSION['credential'] = $password;
                header('location: /admin/home');
            } else {
                echo '<p> Incorrect log-in credentials. Please try again. </p>';
            }
        }
    }
}