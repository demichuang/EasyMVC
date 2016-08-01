<?php

class contactController extends Controller {
    
  // 到forum頁    
  function contact(){
    if (!empty($_POST['name']) && !empty($_POST['word'])) //如果名字和留言都不是空值
    {    
      $name = $_POST['name'];     // $name設為接收到的name            
      $word = $_POST['word'];     // $word設為接收到的留言
      
      date_default_timezone_set('Asia/Taipei');   //時間設定:Taipei時間 
      $now = date("Y-m-d H:i:s");                 //時間設定(年、月、日 時、分、秒)
      
      $addword=$this->model("sqlcommand");
      $addword->addword($name,$word,$now);     // 寫入talk資料表
    }
    
    $showword=$this->model("sqlcommand");
    $numrows=$showword->showword();       // 從talk資料表最新資料開始取
    
    $array =array();  // 放留言者名稱
    $array2=array();  // 放留言時間
    $array3=array();  // 放留言內容
    
    while($row=mysqli_fetch_array($numrows[1])) // 留言紀錄寫進array
    {
        array_push($array,$row['name']);
        array_push($array2,$row['time']);
        array_push($array3,$row['word']);
    }
    
    $this->view("contact",$numrows[0],$array,$array2,$array3);    // 到forum頁
  }
  
  // 到新增留言頁
  function goenter(){
      $this->view("contact_send");
  }
}

?>
