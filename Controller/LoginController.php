<?php


include'../Model/Dao.php';


$data=new Dao();
$landloard=new LandLoard();
$tenent=new Tenent();


$landloard->setUsername($_POST['username']);
$landloard->setPassword($_POST['userpassword']);
$tenent->setUsername($_POST['username']);
$tenent->setPassword($_POST['userpassword']);


if($data->LoginLandloard($landloard)==1){

  header("Location: ../customer-orders.php?landloardlog=ok");

}elseif($data->LoginLandloard($landloard)==2){
  
    header("Location: ../index.php?login=ok&username=ok");
 
}else
if($data->LoginTenent($tenent)==1){

   header("Location: ../customer-orders.php?tenentlog=ok");

}elseif($data->LoginTenent($tenent)==2){

    header("Location: ../index.php?logint=ok&usernamet=ok");
 
}else{
    header("Location: ../index.php?login=ok&fail=ok"); 
}