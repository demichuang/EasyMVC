<?php

class newviewController extends Controller {

	// 到 newview 頁    
	function newview(){
	  if(isset($_POST['taichung'])) // 點選"Tainan按鈕"                        
	      $num=0;
	  
	  if(isset($_POST['tainan']))   // 點選"Tainan按鈕"     
	      $num=1;     
	      
	  $dst=$this->model("sqlcommand");   
    $dst->dst($num);                  // 設定$_SESSION["dst"]
    
    if(isset($_GET['id']))      // 如果有$_GET['id']值
    {             
  		$id= $_GET['id'];  
  		
  		$seemore=$this->model("sqlcommand");   
      $seemore->see($id);                   // 設$_SESSION["id"]為$_GET['id']     
      
      $getid=$this->model("sqlcommand");
  	  $seerow=$getid->seeclick($id);        // 取景點資料  
    }
    else                         // 如果沒有$_GET['id']值
    {
      $seemore=$this->model("sqlcommand");   
      $seemore->see(0);                     // 設$_SESSION["id"]為0
    }
    
    $dstchoose =$this->model("sqlcommand");
    $result =$dstchoose->showpicture();     // 取景點圖片

    $array =array();    // 放景點號碼
    $array2 =array();   // 放景點名稱
    $array3 =array();   // 放已點選add的景點名
    $array4 =array();   // 放已點選gone的景點名
  
    while($row = mysqli_fetch_array($result[1])) //將資料寫進array
    {
      array_push($array,$row['dnum']);
      array_push($array2,$row['dname']);
      array_push($array3,$row['additem']);
      array_push($array4,$row['gone']);
    }
  
    $this->view("newview",$result[0],[$array,$array2,$array3,$array4],[$seerow[0],$seerow[1]]); // 到 newview 頁
	}
	
	function seebutton(){
		
				
	}
	
	
	// 點選 add按鈕    
	function addbutton(){
	  $additem=$_GET['additem'];        

    $add=$this->model("sqlcommand");
	  $add->addclick($additem);           
	  header("location:/EasyMVC/newview/newview");  // 到 newview 頁 
  }
    
	// 點選 gone按鈕    
	function gonebutton(){
    $gone=$_GET['gone'];    

    $havegone=$this->model("sqlcommand");
	  $havegone->goneclick($gone);
	  header("location:/EasyMVC/newview/newview");  // 到 newview 頁
	}

	
	


}
?>
