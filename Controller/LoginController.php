<?php


include'../Model/Dao.php';


$data=new Dao();
$landloard=new LandLoard();



$landloard->setUsername($_POST['username']);
$landloard->setPassword($_POST['userpassword']);


if($data->LoginLandloard($landloard)==1){

  header("Location: ../customer-orders.php?landloardlog=ok");

}else{

   header("Location: ../index.php?login=ok&fail=ok");
 
}