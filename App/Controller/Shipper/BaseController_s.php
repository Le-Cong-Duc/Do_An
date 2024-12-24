<?php
class BaseController_S
{
    protected $titePage = '';
    protected $data = [];

    function View($viewpage, $titlePage, $data)
    {
        $file = "App/View/Shipper/".$viewpage.".php";
        if (is_file($file)) {
            require_once $file;
        } else {
            echo "File does not exist !!!";
        }
    }
}

?>