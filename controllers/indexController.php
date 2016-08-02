<?php

class indexController extends Controller {

    //  到首頁(登入頁)
    function index(){
        $sUserName=$this->model("sqlcommand")->haveuser();      // 判斷$_SESSION["userName"]是否存在
        $this->view("index",$sUserName);
    } 
    
    //  未登入前點其他連結
    function nologin(){
        $sUserName=$this->model("sqlcommand")->haveuser();      // 判斷$_SESSION["userName"]是否存在
        $this->view("index",$sUserName,1);                      //回登入頁，傳data2=1值，顯示需先登入
    }     
    
    //  點登入按鈕
    function login(){
        //$this->user();
        
        $user=$_POST["txtUserName"];        //  得輸入的username
        $password=$_POST['txtPassword'];    //  得輸入的userpassword
        
    	$num =$this->model("sqlcommand")->logincheck($user,$password);  // 取user資料表與輸入的username和userpassword相符的資料筆數
    	
     	if (trim($user) !="" & $num == 1)                               // 登入成功(如果輸入的username非空值，且user資料表內有一筆相符的資料)    
    	{
            $sUserName=$this->model("sqlcommand")->sessionuser($user);      // $_SESSION['userName']設為輸入的username
    		$this->view("index",$sUserName);                                // 回到登入頁
    	}
    	else                                                            //	登入失敗    
    	{
            $sUserName=$this->model("sqlcommand")->sessionuser("Guest");    // $_SESSION["userName"]設為"Guest"
      	    $this->view("index",$sUserName,2);                              // 回到登入頁，傳data2=2值，顯示輸入錯誤或不是會員
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
 
    	$result =$this->model("sqlcommand")->signupcheck($newuser); // 取user資料表與新輸入的username相符的資料
    	$row = mysqli_fetch_array($result);                         // 取每筆資料
        
    	if (mysqli_num_rows($result)>0)                                 // 如果有與輸入的username相符的資料                        
    	{
    	  if($row['userpassword']==$newpassword)                            // 如果輸入的userpassword也相符
    	  { 
            $sUserName=$this->model("sqlcommand")->sessionuser("Guest");    // $_SESSION["userName"]設為"Guest"
      	    $this->view("index",$sUserName,3);                              // 回到登入頁，傳data2=3值，顯示本來就是會員了
    	  }
    	  else                                                              // 如果輸入的userpassword不相符 
    	    $this->view("index_sign",4);                                    // 回到註冊頁，傳data2=4值，顯示帳號名已被使用
    	}
    	else                                                            // 如果沒有與輸入的username相符的資料
    	{        	
        	$result =$this->model("sqlcommand")->adduser($newuser,$newpassword);    // 新增輸入的username和userpassword至user資料表
            $sUserName=$this->model("sqlcommand")->sessionuser("Guest");            // $_SESSION["userName"]設為"Guest"
      	    $this->view("index",$sUserName,5);                                      // 回到登入頁，傳data2=5值，顯示現在是會員了
    	}
    }
    
    //  點登出按鈕
    function logout(){
        $sUserName=$this->model("sqlcommand")->sessionuser("Guest");    // $_SESSION["userName"]設為"Guest"
        $this->view("index",$sUserName);                                // 回到登入頁
    }
}

?>
