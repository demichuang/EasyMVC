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
        
        <!-- 顯示使用者名稱 -->
        <a class="navbar-brand active"><h2><?php echo $_SESSION['userName'];?></h2></a>
            
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
                
                 <li ><a href="../index">Home</a></li>
                 <li ><a href="/EasyMVC/newview/newviewp">View</a></li>
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


<!-- Enter Starts -->
<div id="contact" class="mail">
  <div class="container contactform center">
    
    <!-- 顯示"Please Say Something" -->
    <h2 class="text-center  wowload fadeInUp">Say Something ...</h2>
    <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12"> 
        <!-- 顯示留言畫面 -->
        <form method="post" action="/EasyMVC/contact/contact">
          <input type="text" placeholder="Name" name="name" required>
          <textarea rows="5" placeholder="Your words" name="word"  required></textarea>
          <button class="btn btn-primary" name="reset" type="reset">Clear</button>&nbsp;
      &nbsp;<button class="btn btn-primary" name="submit" type="submit">Send</button> 
        </form>
        
      </div>
    </div>
  </div>
</div>
<!-- Enter Ends -->

</body>
</html>