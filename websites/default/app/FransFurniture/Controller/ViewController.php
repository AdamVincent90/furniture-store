<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 20/02/2019
 * Time: 23:23
 */

// A navigation controller which is used to send the correct layout file and data to the View class.

class ViewController
{
    protected $layout;

    public function layout($layout_name, $layout_data = [])
    {
        $this->layout = new View($layout_name, $layout_data);
        return $this->layout;
    }
}