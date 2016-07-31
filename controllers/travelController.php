<?php

class travelController extends Controller{
 
 // 到travel頁    
 function travel(){
  if(!empty($_POST['word']))  // 如果有編輯資料
  {
      $word = ereg_replace("\n", "<br />\n", $_POST['word']); // 將換行轉成資料庫存取的換行符號
      $getword=$this->model("sqlcommand");
      $getword->getedit($word);                               // 將編輯資料寫入資料庫
  }
   
  $dst=$this->model("sqlcommand");   
  $row=$dst->ds(0);                 // 初始頁面設為Taichung畫面
  
  $lat = $row['lat'];        // 取Taichung經度
  $lng = $row['lng'];        // 取Taichung緯度
  $mark = $row['mark'];      // 取Taichung標記
  
  $myedit=$this->model("sqlcommand");
  $row2 =$myedit->showedit();          // 取編輯資料
  
  $mylist=$this->model("sqlcommand");   
  $result =$mylist->mylist();          // 取user選取的景點
   
  while($row =mysqli_fetch_array($result))
  {
   $this->view("travel",[$lat,$lng,$mark],$row['dname'],$row2);  // 到travel頁
  }
 }
          
 // 點選地點按鈕
 function dsbutton(){
  if(isset($_POST['tain']))  // 點選Taichung按鈕
   $num=1;
  else                       // 點選Tainan按鈕
   $num=0;
  
  $dst=$this->model("sqlcommand");   
  $row=$dst->ds($num);              // 取地點經緯度
  
  $lat = $row['lat'];     // 取經度
  $lng = $row['lng'];     // 取緯度
  $mark = $row['mark'];   // 取標記
  
  $myedit=$this->model("sqlcommand");
  $row2 =$myedit->showedit();          // 取編輯資料
  
  $mylist=$this->model("sqlcommand");   
  $result =$mylist->mylist();          // 取user選取的景點

  while($row =mysqli_fetch_array($result))
  {
   $this->view("travel",[$lat,$lng,$mark],$row['dname'],$row2);  // 到travel頁
  }
 }

 // 到編輯規劃頁面
 function goedit(){
  $echoedit=$this->model("sqlcommand");
  $edit =$echoedit->myedit();           // 取編輯資料
  
  $this->view("travel_edit",$edit);     // 到travel頁
 }

 // 刪除景點
 function mydelete($dname){
  $deletedst=$this->model("sqlcommand");
  $row=$deletedst->deletedb($dname);      
  
  $this->view("/EasyMVC/travel/travel");  // 到travel頁
 }
 
}

?>
