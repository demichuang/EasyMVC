<?php

class newviewController extends Controller {

  // 到 newview 頁    
  function newview(){
    if(isset($_GET['id']))                                // 如果有$_GET['id']值
    {             
      $id= $_GET['id'];   
      $sessionid=$this->model("sqlcommand")->see($id);    // 設$_SESSION["id"]為$_GET['id']   
      $seerow=$this->model("sqlcommand")->seeclick($id);  // 取景點資料       
    }
    else                                                  // 如果沒有$_GET['id']值
    {
      $sessionid=$this->model("sqlcommand")->see(0);      // 設$_SESSION["id"]為0
    }
    
    if(isset($_POST['taichung']))   // 點選"Taichung按鈕"                        
         $dstnum=0;
    if(isset($_POST['tainan']))     // 點選"Tainan按鈕"                               
         $dstnum=1;     
	   
    $sessiondst=$this->model("sqlcommand")->dst($dstnum);         // 設定$_SESSION["dst"]
    $result =$this->model("sqlcommand")->showpicture();           // 取景點圖片

    $this->view("newview",$result[0],[$result[1],$result[2],$result[3],$result[4]],[$seerow[0],$seerow[1]],[$sessiondst,$sessionid]); // 到 newview 頁(data1:景點數、data2:圖片景點資料、data3:景點資訊、data4:地點景點編號)
	}

  // 點選 add按鈕    
  function addbutton(){
    $additem=$_GET['additem'];        
    $this->model("sqlcommand")->addclick($additem);           
    header("location:/EasyMVC/newview/newview");    // 到 newview 頁 
  }
    
  // 點選 gone按鈕    
  function gonebutton(){
    $gone=$_GET['gone'];
	  $this->model("sqlcommand")->goneclick($gone);
	  header("location:/EasyMVC/newview/newview");    // 到 newview 頁
	}
	
}
?>
