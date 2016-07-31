<?php

class sqlcommand{
//首頁
    // 從user資料表取與輸入的username和userpassword相符的資料      
    function logincheck($user,$password){
        $cmd="SELECT * FROM user 
              WHERE username='$user' 
              AND userpassword='$password'";
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	
    	$num=mysqli_num_rows($result);
    	return $num;    // 回傳資料筆數
    }
    
    // 從user資料表取與輸入的新username相符的資料
    function signupcheck($newuser){
        $cmd="SELECT * FROM user 
              WHERE username='$newuser'";
    	$db =new connect_db();
    	$result=$db->connect($cmd);
        
    	return $result; // 回傳結果
    }
    
    // 新增新使用者的資料
    function adduser($newuser,$newpassword){
        $cmd="INSERT user(username,userpassword)  
              VALUES('$newuser','$newpassword')";       
    	$db =new connect_db();
    	$db->connect($cmd);
    	
    	
    	$cmd1="SELECT * FROM dst 
    	       WHERE d=1";
    	$db1 =new connect_db();
    	$result1=$db1->connect($cmd1);
    
    	while($row = mysqli_fetch_array($result1))
	    {
	        $cmd2="INSERT file(username,dnum,dname,additem,gone)
	               VALUES('$newuser','{$row['dnum']}','{$row['dname']}',0,0)";
    	    $db2 =new connect_db();
    	    $db2->connect($cmd2);
	    }
	    
	    
	    $cmd3="SELECT * FROM dst 
	           WHERE d=2";
    	$db3 =new connect_db();
    	$result2=$db3->connect($cmd3);
    
    	while($row = mysqli_fetch_array($result2))
	    {
	        $cmd4="INSERT file2(username,dnum,dname,additem,gone)
	               VALUES('$newuser','{$row['dnum']}','{$row['dname']}',0,0)";
        	$db4 =new connect_db();
        	$db4->connect($cmd4);
	    } 
	  
    }
    
    
    
//View    
    function cadd($additem){
        
        
        $cmd= "SELECT * FROM file 
                WHERE dnum='$additem' 
                AND username='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
        // 從file資料表內取和景點編號($_GET['additem'])及username對應的資料
        $row = mysqli_fetch_array($result);
        return $row;
        
        
    }
    
    function caddupdate($additem){
        
        
        $cmd= "UPDATE file SET additem=1
                WHERE dnum='$additem' 
                AND username='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
        return;
    }
    
    function nadd($additem){
        
        
        $cmd= "SELECT * FROM file2 
                WHERE dnum='$additem' 
                AND username='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
        // 從file資料表內取和景點編號($_GET['additem'])及username對應的資料
        $row = mysqli_fetch_array($result);
        return $row;
        
        
    }
    
    function naddupdate($additem){
        
        
        $cmd= "UPDATE file2 SET additem=1
                WHERE dnum='$additem' 
                AND username='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
 return;
    }
    
    
    function cgone($gone){
        
        
        $cmd= "SELECT * FROM file
                                WHERE dnum='$gone' 
                                AND username='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
        // 從file資料表內取和景點編號($_GET['additem'])及username對應的資料
        $row = mysqli_fetch_array($result);
        return $row;
        
        
    }
    
    function cgoneupdate($gone){
        
        $cmd= "UPDATE file SET gone=1
              WHERE dnum='$gone' 
              AND username='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
 return;
    }
    
    function ngone($gone){
        
        
        $cmd= "SELECT * FROM file2
                                WHERE dnum='$gone' 
                                AND username='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
        // 從file資料表內取和景點編號($_GET['additem'])及username對應的資料
        $row = mysqli_fetch_array($result);
        return $row;
        
        
    }
    
    function ngoneupdate($gone){
        
        $cmd= "UPDATE file2 SET gone=1
              WHERE dnum='$gone' 
              AND username='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
 return;
    }
    

    function see($id){
        if($_SESSION['dst']=="0"){
            $cmd= "SELECT * FROM dst
                    WHERE dnum ='$id' 
                    AND d=1";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
}
// 如果點選"Tainan按鈕"
else{
  $cmd= "SELECT * FROM dst
                    WHERE dnum ='$id' 
                    AND d=1";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
}
// 呼叫dst資料
 return;
    }

    function showpicture(){
    if($_SESSION['dst']=="0")   
        $cmd="SELECT * FROM file
            WHERE username='{$_SESSION['userName']}'";
        
    else                              
  //從file2資料表內取與username對應的資料
  $cmd="SELECT * FROM file2
        WHERE username='{$_SESSION['userName']}'";    
    
    
    
    $db =new connect_db();
    $result=$db->connect($cmd);
    return $result;
    
    
    
    
}

    
    
    
    
    
    
    
    
//Travel    
    // 從dstaddress取地點經緯度
    function ds($num){
        $_SESSION["ds"]=$num;
        
        $cmd= "SELECT *FROM dstaddress 
               WHERE d='$num'";
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	
    	$row=mysqli_fetch_array($result);
    	return $row;
    }
    
    // 取user加入的景點
    function mylist(){
        if($_SESSION['ds']=="0")
            $cmd="SELECT * FROM file 
                  WHERE username ='{$_SESSION['userName']}' 
                  AND additem ='1'"; 
        else
            $cmd="SELECT * FROM file2 
                  WHERE username ='{$_SESSION['userName']}' 
                  AND additem ='1'"; 
           
        $db=new connect_db();
        $result=$db->connect($cmd);
        return $result;
    }

    // 取user的規劃資料
    function showedit(){
        $cmd="SELECT * FROM user
              WHERE username='{$_SESSION['userName']}'";
        $db=new connect_db();
        $result=$db->connect($cmd);
        
        $row=mysqli_fetch_array($result);
        
        if($_SESSION['ds']=="0")
            return $row['edit'];
        else
            return $row['edit2'];
    }
    
    // 顯示規劃在編輯頁面
    function myedit(){
        $cmd="SELECT * FROM user 
                    WHERE username='{$_SESSION['userName']}'";
        $db=new connect_db();
        $result=$db->connect($cmd);
        $row=mysqli_fetch_array($result);
        
        if($_SESSION['ds']=="0")
            $edit = ereg_replace("<br />", "", $row['edit']);
            
        else
            $edit = ereg_replace("<br />", "", $row['edit2']);
        return $edit;
    }
    
    // 規劃寫入資料庫
    function getedit($word){
        if($_SESSION['ds'] =="0")
            $cmd="UPDATE user SET edit ='$word'
                  WHERE username='{$_SESSION['userName']}'";
        else
            $cmd="UPDATE user SET edit2 ='$word'
                  WHERE username='{$_SESSION['userName']}'";
        $db=new connect_db();
        $db->connect($cmd);
    }

    // 取消景點選取
    function deletedb($dname){
     if($_SESSION['ds']=="0")
        $cmd="UPDATE file SET additem=0
              WHERE dname='$dname' 
              AND username='{$_SESSION['userName']}'";

    if($_SESSION['ds']=="1")
        $cmd="UPDATE file2 SET additem=0
              WHERE dname='$dname' 
              AND username='{$_SESSION['userName']}'";
    $db=new connect_db();
    $db->connect($cmd);
    }



//Achievement
    // 取得Taichung 去過景點和計算%
    function getnum(){
        $cmd="SELECT * FROM dst 
              WHERE d=1";
        $cmd2="SELECT * FROM file
               WHERE username ='{$_SESSION['userName']}'
               AND gone=1";

        $db=new connect_db();
        $result=$db->connect($cmd);
        $result2=$db->connect($cmd2);
        
        $row = mysqli_num_rows($result);
        $gone = mysqli_num_rows($result2);
        $row1 =mysqli_fetch_array($result2);
        
        $gonenumber = round(($gone/$row)*100,2);      
        
        return [$row1,$gonenumber];
    }
    
    // 取得Tainan 去過景點和計算%
    function getnum2(){
        $cmd="SELECT * FROM dst 
               WHERE d=2";
        $cmd2="SELECT * FROM file2
               WHERE username ='{$_SESSION['userName']}'
               AND gone=1";
        
        $db=new connect_db();
        $result=$db->connect($cmd);
        $result2=$db->connect($cmd2);
        
        $row=mysqli_num_rows($result);
        $gone = mysqli_num_rows($result2);
        $row1 = mysqli_fetch_array($result2);
        
        $gonenumber = round(($gone/$row)*100,2);
        
        return [$row1,$gonenumber];
    }
    
    // 取消已去過的景點
    function noclick(){
        $cmd="UPDATE file SET gone=0
              WHERE dname='{$_GET['gone']}' 
              AND username='{$_SESSION['userName']}'";
        $cmd2="UPDATE file2 SET gone=0
               WHERE dname='{$_GET['gone']}' 
               AND username='{$_SESSION['userName']}'";
        $db=new connect_db();
        $db->connect($cmd);
        $db->connect($cmd2);
    }
    
    
    
//Forum
    // 新增留言
    function addword( $name, $word, $now){
        $cmd="INSERT talk (name,word,time)
              VALUES ( '$name', '$word', '$now')";  
        $db=new connect_db();
        $db->connect($cmd); 
    }    
    
    // 顯示留言
    function showword(){
    $cmd="SELECT * FROM talk ORDER BY num DESC";   //從talk資料表最新資料開始取
    $db=new connect_db();
    $result=$db->connect($cmd);
    
    $numwords = mysqli_num_rows($result);
        
    return [$numwords,$result];
    }
}

?>
