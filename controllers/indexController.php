<?php

class indexController extends Controller {
    
    //  到首頁(登入頁)
    function index(){
        $this->view("index");
    } 
    
    //  未登入前點其他連結
    function nologin(){
        $this->view("index",1);     //回登入頁，傳data=1值，顯示需先登入
    }     
    
    //  點登入按鈕
    function login(){
        $user=$_POST["txtUserName"];        //  得輸入的username
        $password=$_POST['txtPassword'];    //  得輸入的userpassword
        
        $login =$this->model("sqlcommand");
    	$num =$login->logincheck($user,$password);  // 取user資料表與輸入的username和userpassword相符的資料筆數
    	
     	if (trim($user) !="" & $num == 1)   // 登入成功(如果輸入的username非空值，且user資料表內有一筆相符的資料)    
    	{
    		$_SESSION["userName"]=$user;    // $_SESSION['userName']設為輸入的username
    		$this->view("index");           // 回到登入頁
    	}
    	else                                //	登入失敗    
    	{
    	    $_SESSION["userName"]="Guest";  // $_SESSION["userName"]設為"Guest"
      	    $this->view("index",2);         // 回到登入頁，傳data=2值，顯示輸入錯誤或不是會員
      	}
    }       
    
    //  到註冊頁
    function gosignup() {
        $this->view("index_sign");
    }   
    
    //  點註冊按鈕
    function signup(){
        $newuser=$_POST["newtxtUserName"];      //  得輸入的新username
        $newpassword=$_POST['newtxtPassword'];  //  得輸入的新userpassword
        
        $signup=$this->model("sqlcommand");
    	$result =$signup->signupcheck($newuser);   // 取user資料表與新輸入的username相符的資料
    	$row = mysqli_fetch_array($result);        // 取每筆資料
        
    	if (mysqli_num_rows($result)>0)        // 如果有與輸入的username相符的資料                        
    	{
    	  if($row['userpassword']==$newpassword)    // 如果輸入的userpassword也相符
    	    $this->view("index",3);                 // 回到登入頁，傳data=3值，顯示本來就是會員了
    	  else                                      // 如果輸入的userpassword不相符 
    	    $this->view("index_sign",4);            // 回到註冊頁，傳data=4值，顯示帳號名已被使用
    	}
    	else                                   // 如果沒有與輸入的username相符的資料
    	{
        	$addnew=$this->model("sqlcommand");
        	$result =$addnew->adduser($newuser,$newpassword);    // 新增輸入的username和userpassword至user資料表
            $this->view("index",5);                              // 回到登入頁，傳data=5值，顯示現在是會員了
    	}
    }
    
    //  點登出按鈕
    function logout(){
        $_SESSION["userName"]= "Guest";   // $_SESSION["userName"]設為"Guest"
        $this->view("index");             // 回到登入頁
    }
}

?>
