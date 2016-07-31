<?php

class achievementController extends Controller {
    
    
	function achievement(){


$dstnum=$this->model("sqlcommand");
$taic=$dstnum->getnum();
$dstnum2=$this->model("sqlcommand");
$tain=$dstnum2->getnum2();

/*
$row1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM $Table_dst WHERE d=1"));    // 從dst資料夾取Taichung的景點數
$row2=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM $Table_dst WHERE d=2"));    // 從dst資料夾取Tainan的景點數

// 從file資料夾取去過的Taichung景點數
$result1=mysqli_query($conn,"SELECT * FROM $Table_file
                            WHERE username ='{$_SESSION['userName']}'
                            AND gone=1"); 
$gone = mysqli_num_rows($result1);

// 從file2資料夾取去過的Tainan景點數
$result2=mysqli_query($conn,"SELECT * FROM $Table_file2
                            WHERE username ='{$_SESSION['userName']}'
                            AND gone=1");                       
$gone2 = mysqli_num_rows($result2);

$gonenumber = round(($gone/$row1)*100,2);       // 計算去過Taichung景點數的%
$gonenumber2 = round(($gone2/$row2)*100,2);     // 計算去過Tainan景點數的%

*/

$this->view("achievement",[$taic[0],$taic[1]],[$tain[0],$tain[1]]);
}





function mydelete($dnum){
 
    $deletedst=$this->model("sqlcommand");
    $row=$deletedst->deletedb($dnum);
    
    
    $this->view("/EasyMVC/travel/travel",$dnum); 
  
  
}







}

?>
