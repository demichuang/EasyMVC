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
             <li class="active"><a href="/EasyMVC/achievement/achievement">My Ahievement</a></li>
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


<!-- 取Taichung去過的景點 -->
<div class='overlay spacer'>
  <div class='container'>
    <div class='row text-center'>
    
    <?php
      for($i=0; $i<$data[0]; $i++)
      {
        echo "<h4>{$data2[$i]}";                                                      // 印出景點名
        echo "<a href='/EasyMVC/achievement/deletemygone?gone=$data2[$i]'>no</a>";    // 刪除景點
        echo "</h4>";       
      }
    ?>
    
    </div>
  </div>
</div>

<!-- 印出Taichung% -->
<div class='highlight-info'>
  <div class='container'>
    <div class='row text-center  wowload fadeInDownBig'> 
      <h4>Taichung：complete <?php echo $data4[0] ?>%</h4>
    </div>
  </div>
</div>


<!-- 取Tainan去過的景點 -->
<div class='overlay spacer'>
  <div class='container'>
    <div class='row text-center'>

    <?php
      for($i=0; $i<$data[1]; $i++) 
      {
        echo "<h4>{$data3[$i]}";                                                      // 印出景點名
        echo "<a href='/EasyMVC/achievement/deletemygone?gone=$data3[$i]'>no</a>";    // 刪除景點
        echo "</h4>";       
      }
    ?>
    
    </div>
  </div>
</div>

<!-- 印出Tainan% -->
<div class='highlight-info'>
  <div class='container'>
    <div class='row text-center  wowload fadeInDownBig'> 
      <h4>Taichung：complete <?php echo $data4[1] ?>%</h4>
    </div>
  </div>
</div>

</body>
</html>