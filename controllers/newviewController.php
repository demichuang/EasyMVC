<?php

class newviewController extends Controller {
    
    
	function newview(){
	        $this->view("newview");
	        
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
	
	
	
/*	
	
	function __construct(){
	  
	  // 如果點選"Taichung按鈕"

    $dst =$this->model("sqlcommand");
    $result =$dst->showpicture();
    return $result;

  // 取每筆資料
//  while($row = mysqli_fetch_array($result)){
//    echo "<figure class='effect-oscar  wowload fadeInUp' >";
    
    // 如果點選"Taichung按鈕"
    if($_SESSION['dst']=="0")
      //顯示Taichung景點圖片
      
      $this->view("view",0.$row['dnum']);
      //echo "<img name ='face'src='images/portfolio/0{$row['dnum']}.jpg' width='500' height='300'alt='img01'/>";
    // 如果點選"Tainan按鈕"
    else
      $this->view("view",1.$row['dnum']);
      
      //顯示Tainan景點圖片
     // echo "<img name ='face'src='images/portfolio/1{$row['dnum']}.jpg' width='500' height='300'alt='img01'/>";
    
    //顯示景點名字
    echo "<figcaption>
          <h2>{$row['dname']}</h2>      
            <p><br>";
            
            //未加入該景點      
            if($row['additem']==0)             
              echo "<a href='view.php?additem={$row['dnum']}'>add</a>";   //顯示"add"按鈕
            //已加入該景點
           else
              echo "<a>已加</a>" ;                                        //顯示"已加"按鈕
              
            //未去過該景點
            if($row['gone']==0)                
              echo "<a href='view.php?gone={$row['dnum']}'>gone</a></p>";  //顯示"gone"按鈕
            //已去過該景點
            else
              echo "<a>已選</a></p>" ;                                    //顯示"已選"按鈕
            
            //尚未點選"see more按鈕" 
            if($_SESSION["see"]==0)     
              echo"<p><a href='view.php?id={$row['dnum']}'>see more</a>";   //顯示"see more"按鈕
            //已點選過"see more按鈕"
            else
              //判斷哪一景點按了see more按鈕
              if($row['dnum']==$_SESSION['see'])
                echo"<p><a href='view.php?id=0'>close</a>";                   //顯示"close"按鈕
              //其餘景點  
              else
                echo"<p><a href='view.php?id={$row['dnum']}'>see more</a>";   
                  
    echo    "</p>
          </figcaption>
        </figure>";
	  
	  
	  
	  
	  
	  
	  
	}
	
*/

}
?>
