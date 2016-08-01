<?php

class newviewController extends Controller {
    
  //  
// 	function newview(){
// 	  $this->dstbutton();
// 	 }
	
	// 點選地點按鈕，定義$_SESSION['dst']    
	function newview(){
	  if(isset($_POST['tainan'])) // 點選"Tainan按鈕"     
	      $num=1;     
	  if(isset($_POST['taichung']))                        
	      $num=0;     
	  $dst=$this->model("sqlcommand");   
    $dst->dst($num);                  // 設定$_SESSION["dst"]
    
    $dstchoose =$this->model("sqlcommand");
    $result =$dstchoose->showpicture();     // 取景點圖片
    
    // $addchoose =$this->model("sqlcommand");
    // $result2 =$addchoose->showadd();         // add按鈕顯示
    
    // $gonechoose =$this->model("sqlcommand");
    // $result3 =$gonechoose->showgone();     // 取景點圖片
    

  // 取每筆資料
  
  $array =array();    // 放景點號碼
  $array2 =array();   // 放景點名稱
  $array3 =array();   // 放add
  $array4 =array();   // 放gone
  
  
  while($row = mysqli_fetch_array($result[1])){
    array_push($array,$row['dnum']);
    array_push($array2,$row['dname']);
    array_push($array3,$row['additem']);
    array_push($array4,$row['gone']);
    
  }
  // while($row = mysqli_fetch_array($result2)){
  //   array_push($array3,$row['additem']);
    
  // }  while($row = mysqli_fetch_array($result3)){
  //   array_push($array4,$row['gone']);
    
  // }
  
  $this->view("newview",$result[0],[$array,$array2],$array3,$array4);
	}
	
	function seebutton(){
		if(isset($_GET['see']))               
			$_SESSION["see"]=$_GET['see'];  // 設$_SESSION["see"]為$_GET['see']
		// 已點選過"see more按鈕" 
		else
			$_SESSION["see"]=0; 
				
	}
	
	
	    
	function addbutton(){
	   
	  	  if(($_GET['additem'])!="")    
{  
  // 如果點選"Taichung按鈕"
  if($_SESSION['dst']=="0")
  {
    
    $additem=$_GET['additem'];
    
    $addtaic=$this->model("sqlcommand");
	$result =$addtaic->cadd($additem);
    
    
     
    // 如果景點未被使用者加入
    if($row['additem']=="0")
    {
        $updatetaic=$this->model("sqlcommand");
		$result =$updatetaic->caddupdate($additem);
    }
  }
  // 如果點選"Tainan按鈕"
  else
  {
    $additem=$_GET['additem'];
    
    $addtain=$this->model("sqlcommand");
	$result =$addtain->nadd($additem);
    // 如果景點未被使用者加入
    if($row['additem']=="0"){
          
        $updatetain=$this->model("sqlcommand");
		$result =$updatetain->naddupdate($additem);
    }
  }
}
	        
	        
	    }
	    
	function gonebutton(){
	      
	    if(($_GET['gone'])!="")        
{
  // 如果點選"Taichung按鈕"
  if($_SESSION['dst']=="0")
  {
    $gone=$_GET['gone'];
    // 從file資料表內取和景點編號($_GET['gone'])及username對應的資料
	$gonetaic=$this->model("sqlcommandModel");
	$row =$gonetaic->cgone($gone); 
  
    if($row['gone']=="0")
    {
    	
    	$updatetaic=$this->model("sqlcommandModel");
		$result =$updatetaic->cgoneupdate($gone);
      
    }
  }
  // 如果點選"Tainan按鈕"
  else
  {
    $gone=$_GET['gone'];
    // 從file資料表內取和景點編號($_GET['gone'])及username對應的資料
	$gonetain=$this->model("sqlcommandModel");
	$row =$gonetain->ngone($gone); 
    // 如果景點未被使用者標示去過 
    
    if($row['gone']=="0")
    {
      $updatetain=$this->model("sqlcommandModel");
		$result =$updatetain->ngoneupdate($gone);
      
    }
  }
}
	}
	
	
	
	
	
	function seeclick(){
	  $seeclick=$this->model("sqlcommand");
		$result =$seeclick->see($id);
		while($row =mysqli_fetch_array($result))
    {
       $this->view($row['dname'],$row['dinfo']);   
    }
	  
	}
	

	  
	  
	  
	  
	  
	  
	  
	
	


}
?>
