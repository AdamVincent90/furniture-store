<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 20/02/2019
 * Time: 23:27
 */

// Class loads the layout html.php files and generic header, footer and title of the web-page to display to the user.

class View
{
    protected $layout_name;
    protected $layout_title;
    protected $layout_data;

    public function __construct($layout_name, $layout_data)
    {
        $this->layout_name = $layout_name;
        $this->layout_data = $layout_data;
    }

    public function Load_Page()
    {
        if (file_exists(VIEW . $this->layout_name . '.html.php')) {
            $this->layout_title = explode('/', $this->layout_name)[1];
            $this->layout_title = ucfirst($this->layout_title);
            include VIEW . 'header.html.php';                          // Displays website header
            explode('/', $this->layout_name)[0] == 'furniture' ? include VIEW . 'furniture_layout.html.php' : '';
            explode('/', $this->layout_name)[0] == 'admin' ? include VIEW . 'admin_layout.html.php' : '';
            include VIEW . $this->layout_name . '.html.php';          // Displays unique page content
            include VIEW . 'footer.html.php';                       // Displays website footer
        }
    }
}