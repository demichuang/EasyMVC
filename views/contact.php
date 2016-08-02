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
             <li ><a href="/EasyMVC/newview/newview">View</a></li>
             <li ><a href="/EasyMVC/travel/travel">My Travel</a></li>
             <li ><a href="/EasyMVC/achievement/achievement">My Ahievement</a></li>
             <li class="active"><a href="/EasyMVC/contact/contact">Forum</a></li>
             <li ><a href="../index">Logout</a></li>
           
          </ul>
        </div>
      </div>
     </div>
   </div>
</div>
<h1>1</h1>
<!-- Header Ends -->


<!--Forum Starts -->
<div class="container contactform center">
  <!-- 顯示"Say Something" -->
  <h2 class="text-center  wowload fadeInUp">Say Something ...</h2>
  <!-- 顯示總留言數 -->
  <h4><?php echo "Total：$data messages "; ?></h4>
  <!-- 顯示我想留言 -->
  <h4 class="text-right  wowload fadeInUp"><a href="/EasyMVC/contact/goenter">I want say something...</a></h4>
  
  <form cols="35" rows="7" >
    <ul>
      
    <?php
      for ($i=0; $i<$data; $i++)
      {
        echo "<li text-align: center>
              <p><h5><strong>{$data2[$i]}</strong>";        // 印出名字
    	  echo " <em>({$data3[$i]})</em></h5></p>";           // 印出時間
    		echo "<div class='text-center  wowload fadeInUp'>
    		        <p><h5>{$data4[$i]}</h5></p>";              // 印出留言
    		echo "</div>
    		      </li>";                                     
      }
    ?>    
      
    </ul>
  </form>
  
</div>
<!--Forum Ends -->

</body>
</html>
