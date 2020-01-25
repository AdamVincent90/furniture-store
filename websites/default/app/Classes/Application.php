<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 20/02/2019
 * Time: 21:19
 */

// Main entry point class of the system, allows for the URL of the web browser to be used to call class controllers
// and their methods.

class Application
{
    protected $class = "PageController";
    protected $method = "home";
    protected $arguments = [];

    public function __construct()
    {
        $this->get_url_data();

        if (file_exists(CONTROLLER . $this->class . '.php')) {
            $this->class = new $this->class;

            if (method_exists($this->class, $this->method)) {
                call_user_func_array([$this->class, $this->method], $this->arguments);
            } else {
                if ($this->method != 'images') {
                    $this->PreviousPage();
                }
            }

        } else {
            $this->PreviousPage();
        }
    }

    protected function get_url_data()
    {
        $url_value = trim($_SERVER['REQUEST_URI'], '/');

        if (!empty($url_value)) {
            $url_value = explode('/', $url_value);
            $this->class = isset($url_value[0]) ? $url_value[0] . 'Controller' : 'PageController';
            $this->method = isset($url_value[1]) ? $url_value[1] : 'home';
            unset($url_value[0], $url_value[1]);
            $this->arguments = array_values($url_value);
        }
    }

    public function PreviousPage()
    {

        echo '<script> alert("Current Page does not exist"); window.history.back()</script>';
    }
}