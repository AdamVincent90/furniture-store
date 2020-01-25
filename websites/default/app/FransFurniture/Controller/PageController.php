<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 20/02/2019
 * Time: 22:10
 */

// Controller is used to load the home related html.php files to the user. (Controller/Method)

class PageController extends ViewController
{

    public function home($key1 = '', $key2 = '')
    {
        $this->layout('home/home',
            [
                'key1' => $key1,
                'key2' => $key2
            ]);
        $this->layout->Load_Page();
    }

    public function contact($key1 = '', $key2 = '')
    {
        $this->layout('home/contact',
            [
                'key1' => $key1,
                'key2' => $key2
            ]);
        $this->layout->Load_Page();
    }

    public function about($key1 = '', $key2 = '')
    {
        $this->layout('home/about',
            [
                'key1' => $key1,
                'key2' => $key2
            ]);
        $this->layout->Load_Page();
    }

    public function faq($key1 = '', $key2 = '')
    {
        $this->layout('home/faq',
            [
                'key1' => $key1,
                'key2' => $key2
            ]);
        $this->layout->Load_Page();
    }
}