<?php

class travelController extends Controller {
    
    
	function travel(){
	        $this->view("travel");
	        
	    }
	    
	function dsbutton(){
			
			$dst=$this->model("sqlcommand");
			
	if(isset($_POST['tain']))
			$num=1;
			
   
// 點選"Taichung按鈕"
else

   $num=0;
   
$row=$dst->ds($num);	
 // 取資料
$this->view("travel",$row);
	

}
}
?>
