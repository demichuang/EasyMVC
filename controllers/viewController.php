<?php

class viewController extends Controller {
    
    
	function view(){
	        $this->view("view");
	        
	    }
	    
	function dstbutton(){
			if(isset($_POST['taichung']))  
	   $_SESSION["dst"]=0;       // 設$_SESSION["dst"]為0
	   
	
	// 點選"Tainan按鈕"  
	if(isset($_POST['tainan']))     
	   $_SESSION["dst"]=1;   
		
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
    
    $addtaic=$this->model("sqlcommandModel");
	$result =$addtaic->cadd($additem);
    
    
     
    // 如果景點未被使用者加入
    if($row['additem']=="0")
    {
        $updatetaic=$this->model("sqlcommandModel");
		$result =$updatetaic->caddupdate($additem);
    }
  }
  // 如果點選"Tainan按鈕"
  else
  {
    $additem=$_GET['additem'];
    
    $addtain=$this->model("sqlcommandModel");
	$result =$addtain->nadd($additem);
    // 如果景點未被使用者加入
    if($row['additem']=="0"){
          
        $updatetain=$this->model("sqlcommandModel");
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
	  $seeclick=$this->model("sqlcommandModel");
		$result =$seeclick->see($id);
		while($row =mysqli_fetch_array($result))
    {
       $this->view($row['dname'],$row['dinfo']);   
    }
	  
	}
	


}
?>
