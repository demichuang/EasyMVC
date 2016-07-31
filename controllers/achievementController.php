<?php

class achievementController extends Controller {
    
    // 到achievement頁
    function achievement(){
        $dstnum=$this->model("sqlcommand");
        $taic=$dstnum->getnum();                // 取Taichung資料
        $dstnum2=$this->model("sqlcommand");
        $tain=$dstnum2->getnum2();              // 取Tainan資料
        
        $this->view("achievement",[$taic[0],$taic[1]],[$tain[0],$tain[1]]); // 到achievement頁    
    }
    
    // 點選no按鈕
    function mygone($dnum){
        $myno=$this->model("sqlcommand");
        $taic=$myno->noclick();
        
        $this->view("achievement"); 
    }
}

?>
