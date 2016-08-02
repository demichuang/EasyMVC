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
<div class='highlight-info'>
  <div class='container'>
    <div class='row text-center  wowload fadeInDownBig'> 
    
    <?php
        echo "<h3>$data3[0]</h3>";    // 印出景點名      
        echo "<h4>$data3[1]</h4>";    // 印出景點資訊
        echo "<h3></h3>";       
    ?>
    
    </div>
  </div>
</div>
<!-- See Button click Ends -->


<!-- Picture Starts -->
<div id="works"  class=" clearfix grid" > 
<form method ="post" action="/EasyMVC/newview/newview">

<?php
  for($i=0; $i<$data; $i++)
  {
    echo "<figure class='effect-oscar  wowload fadeInUp' >";
    
    if($data4[0]==0)                    // 如果點選"Taichung按鈕"
      echo "<img name ='face'src='/EasyMVC/views/images/portfolio/0{$data2[0][$i]}.jpg' width='500' height='300'alt='img01'/>";   //顯示Taichung景點圖片
    else                                // 如果點選"Tainan按鈕"
      echo "<img name ='face'src='/EasyMVC/views/images/portfolio/1{$data2[0][$i]}.jpg' width='500' height='300'alt='img01'/>";   //顯示Tainan景點圖片
    
    echo "<figcaption>";
    echo "<h2>{$data2[1][$i]}</h2>";    //顯示景點名字      
    echo "<p><br>";
                 
            if($data2[2][$i]==0)        //未加入該景點             
              echo "<a href='/EasyMVC/newview/addbutton?additem={$data2[1][$i]}'>add</a>";    //顯示"add"按鈕
            else                        //已加入該景點
              echo "<a>已加</a>" ;                                                            //顯示"已加"按鈕
              
            if($data2[3][$i]==0)        //未去過該景點             
              echo "<a href='/EasyMVC/newview/gonebutton?gone={$data2[1][$i]}'>gone</a></p>"; //顯示"gone"按鈕
            else                        //已去過該景點
              echo "<a>已選</a></p>" ;                                                        //顯示"已選"按鈕
            
             
            if($data4[1]==0)            //尚未點選"see more按鈕"   
              echo"<p><a href='/EasyMVC/newview/newview?id={$data2[0][$i]}'>see more</a>";    //顯示"see more"按鈕
            else                        //已點選過"see more按鈕"
              if($data2[0][$i]==$data4[1])  //判斷哪一景點按了see more按鈕
                echo"<p><a href='/EasyMVC/newview/newview?id=0'>close</a>";                   //顯示"close"按鈕
              //其餘景點  
              else
                echo"<p><a href='/EasyMVC/newview/newview?id={$data2[0][$i]}'>see more</a>";  //顯示"see more"按鈕   
                 
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