<?php
// include("/EasyMVC/models/connect_db.php");
// $db=new connect_db();

class sqlcommandModel{

    function logindb($user,$password)
    {        
        
        
        $cmd="SELECT * FROM user WHERE `username`='$user' AND `userpassword`='$password'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	return $result;
    }
    
    function checkdb($newuser){
        
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
    
}
?>
