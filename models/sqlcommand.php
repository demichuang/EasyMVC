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
	  
	  return;
	  
	  
	  
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

    
    
    
    
    
    
    
    
    
    function ds($num){
        
        $_SESSION["ds"]=$num; 
        
        
        $cmd= "SELECT *FROM dstaddress 
                                WHERE d=$num";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	$row=mysqli_fetch_array($result);
    	return $row;
    	
        
        
    }
    
    function mylist(){
            
        // 如果點選"Taichung按鈕"            
if($_SESSION['ds']=="0")
    // 從file資料表內取username加入的景點的資料
    $cmd="SELECT * FROM file 
            WHERE username ='{$_SESSION['userName']}' 
            AND additem ='1'"; 
// 如果點選"Tainan按鈕"
else
    // 從file2資料表內取username加入的景點的資料 
   $cmd="SELECT * FROM file2 
        WHERE username ='{$_SESSION['userName']}' 
        AND additem ='1'"; 
   
   $db=new connect_db();
   $result=$db->connect($cmd);
  // $num=mysqli_num_rows($result);
   return $result;
    
}

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
    function getedit($word){
        
        if($_SESSION['ds']=="0")
            $cmd="UPDATE user SET edit ='$word'
                WHERE username='{$_SESSION['userName']}'";
            
        else
            $cmd="UPDATE user SET edit2 ='$word'
                WHERE username='{$_SESSION['userName']}'";
        $db=new connect_db();
        $db->connect($cmd);
        return; 
        
    }

function deletedb($dnum){
     if($_SESSION['ds']=="0"){
     $cmd="UPDATE file SET additem=0
                                    WHERE dnum='$dnum' 
                                    AND username='{$_SESSION['userName']}'";

    
         
     }
    // 如果點選"Tainan按鈕"
    if($_SESSION['ds']=="1") 
        {// 將file2的additem欄位更改為0(刪除加入景點)
        $cmd="UPDATE file2 SET additem=0
                                    WHERE dnum='$dnum' 
                                    AND username='{$_SESSION['userName']}'";
}
    
    $db=new connect_db();
    $db->connect($cmd);
     return;
}







    function getnum(){
        $cmd="SELECT * FROM dst WHERE d=1";
//        $cmd2="SELECT * FROM dst WHERE d=2";
        $cmd3="SELECT * FROM file
                WHERE username ='{$_SESSION['userName']}'
                AND gone=1";
/*        $cmd4="SELECT * FROM file2
                WHERE username ='{$_SESSION['userName']}'
                AND gone=1";
  */      
        
        
        $db=new connect_db();
        $result=$db->connect($cmd);
    //    $result2=$db->connect($cmd2);
        $result3=$db->connect($cmd3);
      //  $result4=$db->connect($cmd4);
        
        $row1=mysqli_num_rows($result);
        //$row2=mysqli_num_rows($result2);
        $gone = mysqli_num_rows($result3);
        $row =mysqli_fetch_array($result3);
        //$gone2 = mysqli_num_rows($result4);
        
        
        $gonenumber = round(($gone/$row1)*100,2);       // 計算去過Taichung景點數的%
        //$gonenumber2 = round(($gone2/$row2)*100,2);
        
        return [$row,$gonenumber];
        //return $y=$gonenumber2;
    }
    function getnum2(){
      //  $cmd="SELECT * FROM dst WHERE d=1";
        $cmd2="SELECT * FROM dst WHERE d=2";
     /*   $cmd3="SELECT * FROM file
                WHERE username ='{$_SESSION['userName']}'
                AND gone=1";*/
        $cmd4="SELECT * FROM file2
                WHERE username ='{$_SESSION['userName']}'
                AND gone=1";
        
        
        
        $db=new connect_db();
   //     $result=$db->connect($cmd);
        $result2=$db->connect($cmd2);
   //     $result3=$db->connect($cmd3);
        $result4=$db->connect($cmd4);
        
    //    $row1=mysqli_num_rows($result);
        $row2=mysqli_num_rows($result2);
    //    $gone = mysqli_num_rows($result3);
        $gone2 = mysqli_num_rows($result4);
        $row =mysqli_fetch_array($result4);
        
        
    //    $gonenumber = round(($gone/$row1)*100,2);       // 計算去過Taichung景點數的%
        $gonenumber2 = round(($gone2/$row2)*100,2);
        
     //   return $x=$gonenumber;
        return [$row,$gonenumber2];
    }
    function noclick(){
        
    }
    
    
    
    
    
    
    
    
    
function addword( $name, $word, $now){
        
     $cmd="INSERT talk (name,word,time)
                                VALUES ( $name, $word, $now)";   //從talk資料表最新資料開始取
$db=new connect_db();
$result=$db->connect($cmd);   
return $result;      
}    

function showword(){
    
$cmd="SELECT * FROM talk ORDER BY num DESC";   //從talk資料表最新資料開始取
$db=new connect_db();
$result=$db->connect($cmd);
$numwords = mysqli_num_rows($result);   //總留言數


$row = mysqli_fetch_array($result);
    
    




return [$numwords,$row];
}
    
    
}
?>
