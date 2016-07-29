<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Life is Travel</title>
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
        
         <!-- 尚未登入，顯示註冊連結 -->
         <a class="navbar-brand active" href="/EasyMVC/index/gosignup"><h2>Sign Up</h2></a>

            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
                
                 <!-- 尚未登入前點選其他頁面的連結，傳id=1值給頁面index.php，顯示要先登入 -->
                 <li class="active"><a href="index">Home</a></li>
                 <li ><a href="/EasyMVC/index/nologin">View</a></li>
                 <li ><a href="/EasyMVC/index/nologin">My Travel</a></li>
                 <li ><a href="/EasyMVC/index/nologin">My Achievement</a></li>
                 <li ><a href="/EasyMVC/index/nologin">Forum</a></li>
                 
              </ul>
            </div>

      </div>
     </div>
   </div>
</div>
<h1>1</h1>
<!-- Header Ends -->


<!-- Signup Starts-->
<div id="contact" class="mail">
  <div class="container contactform center">
    
    <!-- 顯示"Please Sign Up" -->
    <h2 class="text-center  wowload fadeInUp">Please Sign Up</h2>
    <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12">
        <!-- 顯示註冊畫面 --> 
        <form method="post" action="/EasyMVC/index/signup" >
          <input type="text" placeholder="Username" name="newtxtUserName" required>
          <input type="text"  placeholder="Password" name="newtxtPassword"  required>
          <button class="btn btn-primary" name="reset" type="reset">Clear</button>&nbsp;
          &nbsp;<button class="btn btn-primary" name="signup" type="submit">Sign Up</button> 
        </form>
      </div>
    </div>
    &nbsp;&nbsp;
    
    <!-- 得id=4值，顯示帳號名已被使用 -->
    <?php if ($data==4):?> 
      <h4 class="text-center  wowload fadeInUp">This name has already been used.</h4>
      <h4 class="text-center  wowload fadeInUp">Please change another.</h4>
    <?php endif; ?>
    
  
  </div>
</div>
<!-- Signup Ends-->

</body>
</html>