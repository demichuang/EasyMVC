<?php

class indexController extends Controller {
    
    
    function index(){
        $this->view("index");
        
    }
    
    function nologin(){
   
  	  $this->view("index",1);
        
        
    }
    
    
    
    function login()
    {
      
    $user=$_POST["txtUserName"];
    $password=$_POST['txtPassword'];

	$login=$this->model("sqlcommandModel");
	$result =$login->logindb($user,$password);

  // 登入成功(如果輸入的username非空值，且user資料表內有一筆相符的資料)
 	if (trim($user) !="" & mysqli_num_rows($result) == 1)       
	{
		$_SESSION["userName"]=$user;    // $_SESSION['userName']設為輸入的username
		$this->view("index");                  // 跳轉回到原頁面(index.php)
	}	                  
//	登入失敗
	else                                    
	{
	  $_SESSION["userName"]="Guest";        // $_SESSION["userName"]設為"Guest"
  	  
  	  $this->view("index",2);
  	  
   
    }
    
}

function logout(){
    
    $_SESSION["userName"]= "Guest";   // $_SESSION["userName"]設為"Guest"
    $this->view("index");
}

function gosignup(){
	
	$this->view("index_sign");
}

function signup(){
    
    $newuser=$_POST["newtxtUserName"];
    $newpassword=$_POST['newtxtPassword'];
	$signup=$this->model("sqlcommandModel");
	$result =$signup->checkdb($newuser);
	$row = mysqli_fetch_array($result); 
  
  // 如果有與輸入的username相符的資料
	if (mysqli_num_rows($result)>0)                         
	{
	  // 如果輸入的userpassword也相符
	  if($row['userpassword']==$newpassword)    
	  {
  		$this->view("index",3);                             // 離開php程式
	  }
	  // 如果輸入的userpassword不相符
	  else    
	  {
	    $this->view("index_sign",4);
	  }
	}
	// 如果沒有與輸入的username相符的資料
	else    
	{
		$signupsuccess=$this->model("sqlcommandModel");
		$signupsuccess->adduser($newuser,$newpassword);

        $this->view("index",5);            // 離開php程式
	}
}


}
?>
