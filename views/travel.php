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

<!-- Map  -->
<script>
function initMap() 
{
    // 地圖中心位置
    var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center:  new google.maps.LatLng('<?php echo $data[0]?>','<?php echo $data[1]?>')
    });
    
    // 地圖標記位置
    var marker = new google.maps.Marker({
    		position : new google.maps.LatLng('<?php echo $data[0] ?>','<?php echo $data[1]?>')
    });
		
	marker.setMap(map);     // 標記設定

	// 標記訊息顯示
	var infowindow = new google.maps.InfoWindow({
			content : '<?php echo $data[2] ?>'
	});
    
    // 開啟地圖、標記
	infowindow.open(map, marker);
	// 將地址轉換成經緯度座標
    var geocoder = new google.maps.Geocoder();
  
    // 點選Search按鈕，呼叫geocodeAddress function  
    document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
    });
}


function geocodeAddress(geocoder, resultsMap) 
{
    // 取得得到的地址
    var address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function(results, status) {
    
    //  順利解析得到的地址，回傳地理編碼，印出新標記
    if (status == google.maps.GeocoderStatus.OK) 
    {
        resultsMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
        });
    }
    // 未順利找到該地址
    else 
    {
      alert('Geocode was not successful for the following reason: ' + status);
    }
    });
}
</script>

<!-- API key--> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJHpvTDXyRQ_vf2DLT1tlFytkLSB2WbPQ&signed_in=true&callback=initMap"
async defer></script>

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


<!-- List Starts -->
<div class='overlay spacer'>
  <div class='container'>

    <!-- Taichung & Tainan button -->
    <form method="post" action="/EasyMVC/travel/dsbutton">
      <button  name="taic" type="submit">Taichung</button> 
      <button  name="tain" type="submit">Tainan</button> 
    </form>       

    <h3>Your list：</h3>
    <div class='row text-center'>
    
    <?php 
      for($i=0; $i<$data2; $i++)
      {
        echo "<h4>{$data3[$i]}";                                                  // 印出景點名稱    
        echo "<a href='/EasyMVC/travel/mydelete?delete=$data3[$i]'>delete</a>";   // 刪除景點      
        echo "</h4>";       
      }
    ?>
    
    </div>
  </div>
</div>
<!-- List Ends -->


<!-- Plan Starts -->
<div class="clearfix">
<div class="col-sm-6">
    <div id="carousel-testimonials" class="carousel slide testimonails  wowload fadeInLeft" data-ride="carousel">
      <div class="item  animated bounceInLeft row">
        <div  class="col-xs-10">
            
            <h4><?php echo $data4;?></h4>                       <!-- 印出計畫 -->
            <h5><a href='/EasyMVC/travel/goedit'>edit</a><h5>   <!-- 編輯計畫 -->
            
         </div>
      </div>
    </div>
</div>
<!-- Plan Ends -->


<!-- Map Starts -->
  <div class="col-sm-6 partners  wowload fadeInRight">
    <!--  map button -->
    <div id="floating-panel">
        <input id="address" type="textbox" value="Taichung Train Station">
        <input id="submit" type="button" value="Search">
    </div>
    <!-- map picture-->
    <div id="map" style="width: ˊ600px; height: 400px"></div>
  </div>
</div>
<!-- Map Ends --> 


</body>
</html>