<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Life is Travel.</title>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/EasyMVC/views/assets/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="/EasyMVC/views/assets/animate/animate.css" />
<link rel="stylesheet" href="/EasyMVC/views/assets/animate/set.css" />
<link rel="stylesheet" href="/EasyMVC/views/assets/gallery/blueimp-gallery.min.css">
<link rel="shortcut icon" href="/EasyMVC/views/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/EasyMVC/views/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/EasyMVC/views/assets/style.css">

<script type="text/javascript" src="jquery.min.js"></script>

</head>


<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
      <div class="container">
        
        <!-- 顯示使用者名稱 -->
        <a class="navbar-brand active"><h2><?php echo $_SESSION["userName"]?></h2></a>
            
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
                
                 <li ><a href="../index">Home</a></li>
                 <li class="active"><a href="/EasyMVC/newview/newview">View</a></li>
                 <li ><a href="/EasyMVC/travel/travel">My Travel</a></li>
                 <li ><a href="/EasyMVC/achievement/achievement">My Achievement</a></li>
                 <li ><a href="/EasyMVC/contact/contact">Forum</a></li>
                 <li ><a href="../index">Logout</a></li>
               
              </ul>
            </div>

      </div>
     </div>
   </div>
</div>
<h1>1</h1>
<!-- Header Ends -->


<!-- Taichung & Tainan Button -->
<form method="post" action="/EasyMVC/newview/newview">
  <button  name="taichung" type="submit">Taichung</button> 
  <button  name="tainan" type="submit">Tainan</button> 
</form>


<!-- See Button click  Starts -->
<?php
// 如果點選"Taichung按鈕"// 如果點選"Taichung按鈕"
/*
if($_SESSION['dst']=="0")
  // 從dst資料表內取Taichung景點的資料
  $result=mysqli_query($conn,"SELECT * FROM $Table_dst
                              WHERE dnum ='{$_GET['id']}' 
                              AND d=1"); 
// 如果點選"Tainan按鈕"
else
  // 取dst資料表內取Tainan景點的資料
  $result=mysqli_query($conn,"SELECT * FROM $Table_dst
                              WHERE dnum ='{$_GET['id']}'
                              AND d=2"); 
*/

if ($_SESSION['id'] ==1){
echo "<div class='highlight-info'>
        <div class='container'>
            <div class='row text-center  wowload fadeInDownBig'> ";
    // 取每筆資料 
//    while($row =mysqli_fetch_array($result))
 //   {
        echo "<h3>$data3[0]</h3>";    // 印出景點名      
        echo "<h4>$data3[1]</h4>";    // 印出景點資訊
        echo "<h3></h3>";       
//    }
    echo    "</div>
          </div>
        </div>";
}
?>
<!-- See Button click Ends -->


<!-- Picture Starts -->
<div id="works"  class=" clearfix grid" > 
<form method ="post" action="newview">

<?php
// 如果點選"Taichung按鈕"
/*
if($_SESSION['dst']=="0")
  //從file資料表內取與username對應的資料
  $result=mysqli_query($conn,"SELECT * FROM $Table_file 
                              WHERE username='{$_SESSION['userName']}'");
// 如果點選"Tainan按鈕"
else                              
  //從file2資料表內取與username對應的資料
  $result=mysqli_query($conn,"SELECT * FROM $Table_file2
                             WHERE username='{$_SESSION['userName']}'");
*/  // 取每筆資料
  for($i=0; $i<$data; $i++){
    echo "<figure class='effect-oscar  wowload fadeInUp' >";
    
    // 如果點選"Taichung按鈕"
   if($_SESSION['dst']=="0")
      //顯示Taichung景點圖片
     echo "<img name ='face'src='/EasyMVC/views/images/portfolio/0{$data2[0][$i]}.jpg' width='500' height='300'alt='img01'/>";
    // 如果點選"Tainan按鈕"
   else
      //顯示Tainan景點圖片
      echo "<img name ='face'src='/EasyMVC/views/images/portfolio/1{$data2[0][$i]}.jpg' width='500' height='300'alt='img01'/>";
    
    //顯示景點名字
    echo "<figcaption>
          <h2>{$data2[1][$i]}</h2>      
            <p><br>";
            
            //未加入該景點      
            if($data2[2][$i]==0)             
              echo "<a href='/EasyMVC/newview/addbutton?additem={$data2[1][$i]}'>add</a>";    //顯示"add"按鈕
            //已加入該景點
           else
              echo "<a>已加</a>" ;                                                            //顯示"已加"按鈕
              
            //未去過該景點
            if($data2[3][$i]==0)                
              echo "<a href='/EasyMVC/newview/gonebutton?gone={$data2[1][$i]}'>gone</a></p>"; //顯示"gone"按鈕
            //已去過該景點
            else
              echo "<a>已選</a></p>" ;                                                        //顯示"已選"按鈕
            
            //尚未點選"see more按鈕" 
            if($_SESSION["id"]==0)     
              echo"<p><a href='EasyMVC/newview/newview?id={$data2[0][$i]}'>see more</a>";   //顯示"see more"按鈕
            //已點選過"see more按鈕"
            else
              //判斷哪一景點按了see more按鈕
              if($data2[0][$i]==$_SESSION['id'])
                echo"<p><a href='EasyMVC/newview/newview?id=0'>close</a>";                   //顯示"close"按鈕
              //其餘景點  
              else
                echo"<p><a href='EasyMVC/newview/newview?id={$data2[0][$i]}'>see more</a>";   
                  
    echo    "</p>
          </figcaption>
        </figure>";
  }
?>

</form>
</div>
<!-- Picture Ends -->

</body>
</html>