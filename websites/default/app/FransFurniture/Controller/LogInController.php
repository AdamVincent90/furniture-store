<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 05/03/2019
 * Time: 22:12
 */

// Controller is used to load the log-in related html.php files to the user. (Controller/Method)

class LogInController extends ViewController
{
    public function dashboard()
    {
        $this->layout('login' . DIRECTORY_SEPARATOR . 'dashboard');
        $this->layout->Load_Page();
    }
}