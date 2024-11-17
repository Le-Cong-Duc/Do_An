<?php
class BaseController_U
{
    protected $titePage = '';
    protected $data = [];

    function View($viewpage, $titlePage, $data)
    {
        $file = "App/View/User/".$viewpage.".php";
        if (is_file($file)) {
            require_once $file;
        } else {
            echo "File does not exist !!!";
        }
    }
}

?>