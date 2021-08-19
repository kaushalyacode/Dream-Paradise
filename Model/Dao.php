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
                              return 2;
                                                          

                  }
                      return 0;                          
    }
    public function LoginTenent(Tenent $tenent)
   {
                  $this->sql="select * from Tenent  where username='".$tenent->getUserName()."' ;";
                  echo "1";
                  $this->result=mysqli_query($this->conn,$this->sql);
                  echo "2";
                  while($this->row=mysqli_fetch_assoc($this->result))
                  { echo "3";
                             if($tenent->getPassword() == $this->row['password'])
                             {
                            echo "4";
                             $_SESSION['tenent']= $this->row['username'];
                                  $_SESSION['tenentid']= $this->row['id'];
                                  return 1;
                              }
                               echo "5";
                              return 2;
                                                          

                  }
                   echo "6";
                      return 0;                          
    }
     public function insertJCustomer(JobNote $jn,Customer $cus,Device $dev,$receiptionistid)
   {

           $this->sql="insert into customer(uid,addre,email,password,username,tel) values('','".$cus->getAddress()."','".$cus->getEmail()."','".$cus->getPassword()."','".$cus->getUsername()."','".$cus->getTel()."');";
          $query=mysqli_query($this->conn,$this->sql);
    }
}