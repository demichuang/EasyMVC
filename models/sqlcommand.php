<?php

class sqlcommand{
//首頁
    
    // 判斷$_SESSION["userName"]是否存在 
    function haveuser(){
        if (isset($_SESSION["userName"]))       
            $sUserName = $_SESSION["userName"]; 
        else
            $sUserName = "Guest";               

        return $sUserName;              // 回傳$sUserName 
    }
    
    // 定義$_SESSION["userName"] 
    function sessionuser($sessionuser){
        $_SESSION["userName"] =$sessionuser; 
        return $_SESSION["userName"];        // 回傳$_SESSION["userName"]  
    }
    
    // 從user資料表取與輸入的username和userpassword相符的資料      
    function logincheck($user,$password){
        $cmd="SELECT * FROM `user` 
              WHERE `username`='$user' 
              AND `userpassword`='$password'";
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	$num=mysqli_num_rows($result);
    	
    	return $num;    // 回傳資料筆數
    }
    
    // 從user資料表取與輸入的新username相符的資料
    function signupcheck($newuser){
        $cmd="SELECT * FROM `user` 
              WHERE `username`='$newuser'";
    	$db =new connect_db();
    	$result=$db->connect($cmd);
        $num =mysqli_num_rows($result);
        $row =mysqli_fetch_array($result);
        
    	return [$row,$num]; // 回傳結果
    }
    
    // 新增新使用者的資料
    function adduser($newuser,$newpassword){
        $cmd="INSERT `user`(`username`,`userpassword`)  
              VALUES('$newuser','$newpassword')";       
    	$db =new connect_db();
    	$db->connect($cmd);
    	
    	
    	$cmd1="SELECT * FROM `dst` 
    	       WHERE `d`='1'";
    	$result1=$db->connect($cmd1);
    
    	while($row = mysqli_fetch_array($result1))
	{
            $cmd2="INSERT `file`(`username`,`dnum`,`dname`,`additem`,`gone`)
                   VALUES('$newuser','{$row['dnum']}','{$row['dname']}','0','0')";
            $db->connect($cmd2);
	}
	    
	    
	$cmd3="SELECT * FROM `dst` 
	       WHERE `d`='2'";
    	$result2=$db->connect($cmd3);
    
    	while($row = mysqli_fetch_array($result2))
	{
	    $cmd4="INSERT `file2`(`username`,`dnum`,`dname`,`additem`,`gone`)
	           VALUES('$newuser','{$row['dnum']}','{$row['dname']}','0','0')";
       	    $db->connect($cmd4);
	 } 
	  
    }
    
    
    
//View
    // 設$_SESSION["dst"]
    function dst($dstnum){
        $_SESSION["dst"]=$dstnum;
        return $_SESSION["dst"];
    }
    
    // 設$_SESSION["id"]
    function see($id){
        $_SESSION["id"]=$id;
        return $_SESSION["id"];
    }

    // 取景點資料
    function seeclick($id){
        if($_SESSION['dst']==0)
            $cmd= "SELECT * FROM `dst`
                   WHERE `dnum` ='$id' 
                   AND `d`='1'";
        if($_SESSION['dst']==1)
            $cmd= "SELECT * FROM `dst`
                   WHERE `dnum` ='$id' 
                   AND `d`='2'";
 
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	$row =mysqli_fetch_array($result);
    	
    	return [$row['dname'],$row['dinfo']];  // 回傳景點名、景點資訊
    }
    
    // 取景點圖片
    function showpicture(){
        if($_SESSION['dst']==0)   
            $cmd="SELECT * FROM `file`
                  WHERE `username`='{$_SESSION['userName']}'";
        if($_SESSION['dst']==1)                            
            $cmd="SELECT * FROM `file2`
                  WHERE `username`='{$_SESSION['userName']}'";
                  
        $db =new connect_db();
        $result=$db->connect($cmd);
        $num = mysqli_num_rows($result);
        
        $array =array();                // 放景點號碼
        $array2 =array();               // 放景點名稱
        $array3 =array();               // 放已點選add的景點名
        $array4 =array();               // 放已點選gone的景點名
      
        while($row = mysqli_fetch_array($result))       // 將資料寫進array
        {
          array_push($array,$row['dnum']);
          array_push($array2,$row['dname']);
          array_push($array3,$row['additem']);
          array_push($array4,$row['gone']);
        }
        
        return [$num,$array,$array2,$array3,$array4];   // 回傳景點數、資料
    }
 
    // add按鈕改為已加
    function addclick($additem){
        $cmd="UPDATE `file` SET `additem`='1'
              WHERE `dname`='$additem' 
              AND `username`='{$_SESSION['userName']}'";
        $cmd2="UPDATE `file2` SET `additem`='1'
               WHERE `dname`='$additem' 
               AND `username`='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	$result=$db->connect($cmd2);
    }
    
    // gone按鈕改為已選 
    function goneclick($gone){
        $cmd="UPDATE `file` SET `gone`='1'
              WHERE `dname`='$gone' 
              AND `username`='{$_SESSION['userName']}'";
        $cmd2="UPDATE `file2` SET `gone`='1'
              WHERE `dname`='$gone' 
              AND `username`='{$_SESSION['userName']}'";
    	
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	$result=$db->connect($cmd2);
    }

    
    
//Travel    
    // 從dstaddress取地點經緯度
    function ds($num){
        $_SESSION["ds"]=$num;
        
        $cmd= "SELECT *FROM `dstaddress` 
               WHERE `d`='$num'";
    	$db =new connect_db();
    	$result=$db->connect($cmd);
    	$row=mysqli_fetch_array($result);
    	
    	return $row;
    }
    
    // 取user加入的景點
    function mylist(){
        if($_SESSION['ds']=="0")
            $cmd="SELECT * FROM `file` 
                  WHERE `username` ='{$_SESSION['userName']}' 
                  AND `additem` ='1'"; 
        else
            $cmd="SELECT * FROM `file2` 
                  WHERE `username` ='{$_SESSION['userName']}' 
                  AND `additem` ='1'"; 
           
        $db=new connect_db();
        $result=$db->connect($cmd);
        $num = mysqli_num_rows($result);
        
        $array=array();                             // 放選取的景點
  
        while($row =mysqli_fetch_array($result))    // 將選取的景點放入array
        {
         array_push($array,$row['dname']);
        }
        
        return [$num,$array];          // 回傳資料筆數、資料
    }

    // 取user的規劃資料
    function showedit(){
        $cmd="SELECT * FROM `user`
              WHERE `username`='{$_SESSION['userName']}'";
        $db=new connect_db();
        $result=$db->connect($cmd);
        $row=mysqli_fetch_array($result);
        
        if($_SESSION['ds']=="0")
            return $row['edit'];    // 回傳Taichung規劃資料
        else
            return $row['edit2'];   // 回傳Tainan規劃資料
    }
    
    // 顯示規劃在編輯頁面
    function myedit(){
        $cmd="SELECT * FROM `user` 
              WHERE `username`='{$_SESSION['userName']}'";
        $db=new connect_db();
        $result=$db->connect($cmd);
        $row=mysqli_fetch_array($result);
        
        if($_SESSION['ds']=="0")
            $edit = ereg_replace("<br />", "", $row['edit']);
        else
            $edit = ereg_replace("<br />", "", $row['edit2']);
        
        return $edit;           // 回傳規劃資料
    }
    
    // 規劃寫入資料庫
    function getedit($word){
        if($_SESSION['ds'] =="0")
            $cmd="UPDATE `user` SET `edit` ='$word'
                  WHERE `username`='{$_SESSION['userName']}'";
        else
            $cmd="UPDATE `user` SET `edit2` ='$word'
                  WHERE `username`='{$_SESSION['userName']}'";
                  
        $db=new connect_db();
        $db->connect($cmd);
    }

    // 取消景點選取
    function deletedb($del){
        $cmd="UPDATE `file` SET `additem`='0'
              WHERE `dname`='$del' 
              AND `username`='{$_SESSION['userName']}'";
        $cmd2="UPDATE `file2` SET `additem`='0'
               WHERE `dname`='$del' 
               AND `username`='{$_SESSION['userName']}'";
               
        $db=new connect_db();
        $db->connect($cmd);
        $db->connect($cmd2);
    }



//Achievement
    // 取得Taichung 去過景點和計算%
    function getnum(){
        $cmd="SELECT * FROM `dst` 
              WHERE `d`='1'";
        $cmd2="SELECT * FROM `file`
               WHERE `username` ='{$_SESSION['userName']}'
               AND `gone`='1'";

        $db=new connect_db();
        $result=$db->connect($cmd);
        $result2=$db->connect($cmd2);
        $row = mysqli_num_rows($result);
        $gone = mysqli_num_rows($result2);
        
        $gonenumber = round(($gone/$row)*100,2);
        
        $array =array();                            // 放Taichung景點名稱
        while($row2=mysqli_fetch_array($result2))   // Taichung景點寫進array      
        {
            array_push($array,$row2['dname']);
        }
        
        return [$gone,$array,$gonenumber];          // 回傳Taichung去過的景點數、資料、%
    }
    
    // 取得Tainan 去過景點和計算%
    function getnum2(){
        $cmd="SELECT * FROM `dst` 
               WHERE `d`='2'";
        $cmd2="SELECT * FROM `file2`
               WHERE `username` ='{$_SESSION['userName']}'
               AND `gone`='1'";
        
        $db=new connect_db();
        $result=$db->connect($cmd);
        $result2=$db->connect($cmd2);
        $row=mysqli_num_rows($result);
        $gone = mysqli_num_rows($result2);
        
        $gonenumber = round(($gone/$row)*100,2);
        
        $array =array();                            // 放Tainan景點名稱
        while($row2=mysqli_fetch_array($result2))   // Tainan景點寫進array      
        {
            array_push($array,$row2['dname']);
        }
        
        return [$gone,$array,$gonenumber];          // 回傳Tainan去過的景點數、資料、%
    }
    
    // 取消已去過的景點
    function noclick($getgone){
        $cmd="UPDATE `file` SET `gone`='0'
              WHERE `dname`='$getgone' 
              AND `username`='{$_SESSION['userName']}'";
        $cmd2="UPDATE `file2` SET `gone`='0'
               WHERE `dname`='$getgone' 
               AND `username`='{$_SESSION['userName']}'";
               
        $db=new connect_db();
        $db->connect($cmd);
        $db->connect($cmd2);
    }
    
    
    
//Forum
    // 新增留言
    function addword( $name, $word, $now){
        $cmd="INSERT `talk` (`name`,`word`,`time`)
              VALUES ( '$name', '$word', '$now')";  
        $db=new connect_db();
        $db->connect($cmd); 
    }    
    
    // 顯示留言
    function showword(){
        $cmd="SELECT * FROM `talk` 
              ORDER BY num DESC";   
        $db=new connect_db();
        $result=$db->connect($cmd);
        $numwords = mysqli_num_rows($result);
        
        $array =array();            // 放留言者名稱
        $array2=array();            // 放留言時間
        $array3=array();            // 放留言內容
    
        while($row=mysqli_fetch_array($result))           // 留言紀錄寫進array
        {
            array_push($array,$row['name']);
            array_push($array2,$row['time']);
            array_push($array3,$row['word']);
        }
        
        return [$numwords,$array,$array2,$array3];        // 回傳留言數、查詢結果
    }
}

?>
