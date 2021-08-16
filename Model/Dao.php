<?php
 require'../Model/Tenent.php';
 require'../Model/Landloard.php';


 session_start();

class Dao{ 
  private $conn;
  private $sql;
  private $result;
  private $row;
 
 
   public function __construct()
   {
                       $this->conn=mysqli_connect("localhost","root","","dreamparadise");
                       if($this->conn)
                       {
                            echo"connected";
                       }else
                       {
                            echo"not connected";     
                       }     

   }
  

    
   public function LoginLandloard(LandLoard $landloard)
   {
                  $this->sql="select * from LandLoard  where username='".$landloard->getUserName()."' ;";
                  $this->result=mysqli_query($this->conn,$this->sql);
                  while($this->row=mysqli_fetch_assoc($this->result))
                  {
                             if($landloard->getPassword() == $this->row['password'])
                             {
                                  $_SESSION['landloard']= $this->row['username'];
                                  $_SESSION['landloardid']= $this->row['id'];
                                  return 1;
                              }
                                                          

                  }
                      return 0;                          
    }
     public function insertJCustomer(JobNote $jn,Customer $cus,Device $dev,$receiptionistid)
   {

           $this->sql="insert into customer(uid,addre,email,password,username,tel) values('','".$cus->getAddress()."','".$cus->getEmail()."','".$cus->getPassword()."','".$cus->getUsername()."','".$cus->getTel()."');";
          $query=mysqli_query($this->conn,$this->sql);
    }
}