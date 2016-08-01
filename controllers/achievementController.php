<?php

class achievementController extends Controller {
    
    // 到achievement頁
    function achievement(){
        $dstnum=$this->model("sqlcommand");
        $taic=$dstnum->getnum();                // 取Taichung資料
        $dstnum2=$this->model("sqlcommand");
        $tain=$dstnum2->getnum2();              // 取Tainan資料
        
        $array =array();  // 放Taichung景點名稱
        $array2=array();  // 放Tainan景點名稱
        
        while($row=mysqli_fetch_array($taic[1]))    // Taichung景點寫進array      
        {
            array_push($array,$row['dname']);
        }
        
        while($row=mysqli_fetch_array($tain[1]))    // Tainan景點寫進array
        {
            array_push($array2,$row['dname']);
        }
        
        $this->view("achievement",[$taic[0],$tain[0]],$array,$array2,[$taic[2],$tain[2]]); // 到achievement頁    
    }
    
    // 點選no按鈕
    function deletemygone(){
        $getgone = $_GET['gone'];       
        
        $myno=$this->model("sqlcommand");
        $myno->noclick($getgone);           // 取消已去過的景點
        
        header("location:/EasyMVC/achievement/achievement");    // 到achievement頁
    }
}

?>
