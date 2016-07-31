<?php
/*
// 點選"delete按鈕"
if(($_GET['del'])!="")
{
    // 如果點選"Taichung按鈕"
    if($_SESSION['ds']=="0")
        // 將file的additem欄位更改為0(刪除加入景點)
        mysqli_query($conn,$sql = "UPDATE $Table_file SET additem=0
                                    WHERE dnum='{$_GET['del']}' 
                                    AND username='{$_SESSION['userName']}'");
    // 如果點選"Tainan按鈕"
    if($_SESSION['ds']=="1") 
        // 將file2的additem欄位更改為0(刪除加入景點)
        mysqli_query($conn,"UPDATE $Table_file2 SET additem=0
                            WHERE dnum='{$_GET['del']}' 
                            AND username='{$_SESSION['userName']}'");
    header('Location:travel.php');      // 跳轉頁面(travel.php)
}
*/
// 點選"no按鈕"
if(($_GET['gone'])!="")
{ 
    // 如果點選"Taichung按鈕"
        // 將file的gone欄位更改為0(刪除已去景點)
        mysqli_query($conn,"UPDATE $Table_file SET gone=0
                            WHERE dname='{$_GET['gone']}' 
                            AND username='{$_SESSION['userName']}'");
    // 如果點選"Tainan按鈕"
        // 將file2的gone欄位更改為0(刪除已去景點)
        mysqli_query($conn,"UPDATE $Table_file2 SET gone=0
                            WHERE dname='{$_GET['gone']}' 
                            AND username='{$_SESSION['userName']}'");
    header("Location:achievement.php");     // 跳轉頁面(achievement.php)
}
?>

