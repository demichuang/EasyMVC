<?php

class Controller {
    public function model($model) {
        require_once "../EasyMVC/models/$model.php";
        return new $model ();
    }
    
    public function view($view, $data = Array(),$data2 = Array(),$data3 = Array(),$data4 = Array()) {
        require_once "../EasyMVC/views/$view.php";
    }
}


?>