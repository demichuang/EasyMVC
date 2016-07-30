<?php

class indexController extends Controller {
    
    
    function index() {
        $this->view("index");
    }
    
    /*
    function hello($name) {
       // $user = $this->model("User");
        //$user->name = $name;
        $this->view("index", $user);
        // echo "Hello! $user->name";
    }
    */
    function gosignup() {
        $this->view("index_sign");
    }
    
    
    
    
    
    function user(){
        
    }
    
    function nologin(){
        $this->view("index",1);
    }
    
    function login()
    {
        // 檢查user資料表內是否有與輸入的username和userpassword相符的資料
$user=$_POST["txtUserName"];
$password=$_POST['txtPassword'];

	$login=$this->model("sqlcommand");
	$row =$login->logincheck($user,$password);

  // 登入成功(如果輸入的username非空值，且user資料表內有一筆相符的資料)
 	if (trim($user) !="" & $row == 1)       
	{
		$_SESSION["userName"]=$user;    // $_SESSION['userName']設為輸入的username
		$this->view("index");                  // 跳轉回到原頁面(index.php)
		                                      // 離開php程式
	}
//	登入失敗
	else                                    
	{
	  $_SESSION["userName"]="Guest";        // $_SESSION["userName"]設為"Guest"
  	
  	$this->view("index",2);   // 跳轉回到原頁面(index.php)，傳id=2值，顯示輸入錯誤或不是會員
  	                             // 離開php程式
// 	}
        
        
        
    }
    
}

function logout(){
    
    $_SESSION["userName"]= "Guest";   // $_SESSION["userName"]設為"Guest"
$this->view("index");   
}


function signup(){
    // 檢查user資料表內是否有與輸入的username相符的資料
    $newuser=$_POST["newtxtUserName"];
    $newpassword=$_POST['newtxtPassword'];
    
    
    $signup=$this->model("sqlcommand");
	$result =$signup->signupcheck($newuser);
    
	$row = mysqli_fetch_array($result);
  
  // 如果有與輸入的username相符的資料
	if (mysqli_num_rows($result)>0)                         
	{
	  // 如果輸入的userpassword也相符
	  if($row['userpassword']==$newpassword)    
	  {
  		$this->view("index",3);                           
	  }
	  // 如果輸入的userpassword不相符
	  else    
	  {
	    	$this->view("index_sign",4);                                     // 離開php程式
	  }
	}
	// 如果沒有與輸入的username相符的資料
	else    
	{
	  // 新增輸入的username和userpassword至user資料表
   $newsignup=$this->model("sqlcommand");
	$result =$newsignup->adduser($newuser,$newpassword);
    
    $this->view("index",5); 
	}
    
    
    
}

}
?>
