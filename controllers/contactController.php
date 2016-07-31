<?php

class contactController extends Controller {
    
  // 到forum頁    
  function contact(){
    if (!empty($_POST['name']) && !empty($_POST['word']))
    {    
      $name = $_POST['name'];   
      $word = $_POST['word'];
      
      date_default_timezone_set('Asia/Taipei');   //時間設定:Taipei時間 
      $now = date("Y-m-d H:i:s");                 //時間設定(年、月、日 時、分、秒)
      
      $addword=$this->model("sqlcommand");
      $addword->addword($name,$word,$now);     // 寫入talk資料表
    }
    
    $showword=$this->model("sqlcommand");
    $numrows=$showword->showword();     //從talk資料表最新資料開始取
    
    while($row=mysqli_fetch_array($numrows[1]))
    {
        $this->view("contact",$numrows[0],[$row['name'],$row['time'],$row['word']]);
    }
  }
  
  // 到新增留言頁
  function goenter(){
      $this->view("contact_send");
  }

}

?>
