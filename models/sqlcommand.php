<?php
// include("/EasyMVC/models/connect_db.php");
// $db=new connect_db();

class sqlcommand{

   
    
       
    function logincheck($user,$password)
    {        
        $cmd="SELECT * FROM user WHERE `username`='$user' AND `userpassword`='$password'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	$row=mysqli_num_rows($result);
    	return $row;
    }
    
    function signupcheck($newuser){
        
        $cmd="SELECT * FROM user WHERE `username`='$newuser'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	//$row = mysqli_fetch_array($result);
    	
    	return $result;
        
    }
    
    function adduser($newuser,$newpassword){
        
        $cmd="INSERT user(username,userpassword)
              VALUES('$newuser','$newpassword')";
    	$db =new connect_db();
    	$db->connect($cmd);
    	
    	
    	
    	$cmd1="SELECT * FROM dst WHERE d=1";
    	$db1 =new connect_db();
    	$result1=$db1->connect($cmd1);
    	
    
    	while($row = mysqli_fetch_array($result1))
	  {
	    
	    $cmd2="INSERT file(username,dnum,dname,additem,gone)
	           VALUES('$newuser','{$row['dnum']}','{$row['dname']}',0,0)";
    
    	$db2 =new connect_db();
    	$db2->connect($cmd2);

	  }
	    
	    
	    
	    $cmd3="SELECT * FROM dst WHERE d=2";
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

    }
}
?>
    
    

