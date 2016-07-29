<?php
// include("/EasyMVC/models/connect_db.php");
// $db=new connect_db();

class sqlcommandModel{

    function logincheck($user,$password)
    {        
        $cmd="SELECT * FROM user WHERE `username`='$user' AND `userpassword`='$password'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	return $result;
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
    
    
    
    function picture(){
        if($_SESSION['dst']=="0"){
  //從file資料表內取與username對應的資料
  
         $cmd= "SELECT * FROM file 
                              WHERE username='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
        }
else                              
{
  //從file資料表內取與username對應的資料
  
         $cmd= "SELECT * FROM file2 
                              WHERE username='{$_SESSION['userName']}'";
    	$db =new connect_db();
    	$result=$db->connect($cmd);
        }
  // 取每筆資料
  while($row = mysqli_fetch_array($result)){
    echo "<figure class='effect-oscar  wowload fadeInUp' >";
    
    // 如果點選"Taichung按鈕"
    if($_SESSION['dst']=="0")
      //顯示Taichung景點圖片
      echo "<img name ='face'src='images/portfolio/0{$row['dnum']}.jpg' width='500' height='300'alt='img01'/>";
    // 如果點選"Tainan按鈕"
    else
      //顯示Tainan景點圖片
      echo "<img name ='face'src='images/portfolio/1{$row['dnum']}.jpg' width='500' height='300'alt='img01'/>";
    
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
    
}
?>
