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
        <a class="navbar-brand active"></a>
            
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
                
                 <li ><a href="../index">Home</a></li>
                 <li ><a href="/EasyMVC/newview/newview">View</a></li>
                 <li class="active"><a href="/EasyMVC/travel/travel">My Travel</a></li>
                 <li ><a href="/EasyMVC/achievement/achievement">My Ahievement</a></li>
                 <li ><a href="/EasyMVC/contact/contact">Forum</a></li>
                 <li ><a href="../index">Logout</a></li>
               
              </ul>
            </div>
            
      </div>
     </div>
   </div>
</div>
<!-- Header Ends -->

<h1>1</h1>

<!-- Edit Starts-->
<div id="contact" class="mail">

  <div class="container contactform center">
    
    <!-- 顯示"Enter your words" -->
    <h2 class="text-center  wowload fadeInUp">Enter your words</h2>
    <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12">
        <!-- 顯示編輯畫面 --> 
        <form method="post" action="/EasyMVC/travel/travel" >
          <textarea rows="5" name="word"><?php echo $data;?></textarea>
          <button class="btn btn-primary" name="reset" type="reset">Reset</button>&nbsp;
          &nbsp;<button class="btn btn-primary" name="signin" type="submit">Send</button> 
        </form>
      </div>
    </div>
 
   </div>
</div>
<!-- Edit Ends-->

</body>
</html>