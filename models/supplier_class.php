<?php

class supplier{
    public function get_connection(){
        return $con=mysqli_connect('localhost','root','12345678','ndr_db');
    }


    public function insert($id,$name,$mail,$address,$pass,$phone,$target_folder,$target_loc){
        $con=$this->get_connection();
        $query="insert into supplier (national_id,name,Email,address,ndr,phone,image,image_path) values ('$id','$name','$mail',
        '$address','$pass','$phone','$target_folder','$target_loc')" ;
        $result=mysqli_query($con,$query);

        if($result){
            session_start();
            $_SESSION['s_email']=$mail;
            header('location:../setting.php');
        }

        else{
            echo 'error'.mysqli_error($con);
        }

        return $result;
    }


    // update 

    public function update($name,$mail,$address,$pass,$phone,$target_folder,$target_loc){
        $con=$this->get_connection();
        $query="update supplier set name='$name',address='$address',ndr='$pass',
        phone='$phone',image='$target_folder',image_path='$target_loc' where Email='$mail' " ;
        $result=mysqli_query($con,$query);

        if($result){
            header('location:../setting.php');
        }

        else{
            echo 'error'.mysqli_error($con);
        }

        return $result;
    }


    
    




public $name;
public $password;
public $phone;
public $photo;
public $address;
public $email;

public function get_supplier($email_session){
    $con=$this->get_connection();
    $sql_get="select * from supplier where Email='$email_session'";
    $res=mysqli_query($con,$sql_get);
    if($res){
        while($row=mysqli_fetch_assoc($res)){
            $this->name=$row['name'];
            $this->password=$row['ndr'];
            $this->phone=$row['phone'];
            $this->photo=$row['image_path'];
            $this->address=$row['address'];
            $this->email=$row['Email'];

        }
    }
}


//get items for this supplier

public $photo_i;
public $name_i;
public $id_i;
public $prics;
public function get_supplier_items($email_session){
    $con=$this->get_connection();
    $sql_get="select * from items where supplier_email='$email_session'";
    $res=mysqli_query($con,$sql_get);
    if($res){
        while($row=mysqli_fetch_assoc($res)){
            $this->id_i=$row['id'];
            $this->name_i=$row['name'];
            $this->photo_i=$row['image_path'];
            $this->price=$row['price'];

            

        }
    }
}


//login for supplier

public $email_s;
public $password_s;

public function check_login($email,$password){
    $con=$this->get_connection();
    $sql_get="select * from supplier where Email='$email' and ndr='$password'";
    $res=mysqli_query($con,$sql_get);
    if($res){
        if(mysqli_num_rows($res)>0){
            session_start();
            $_SESSION['s_email']=$email;
            header('location:../setting.php');
         
         
         }

         else{
            echo '<script>alert("try again")</script>';
         }
    }

    else{
        echo '<script>alert("check your connection and try again")</script>';

    }
}


// forget password 

public function forget_password($email,$req_time,$ip_add,$ip_addr_local,$ip_from_proxy){
    $con=$this->get_connection();
    $sql="insert into reset_password (email,req_time,ip_address,ip_local_address,ip_proxy) values ('$email','$req_time','$ip_add',
    '$ip_addr_local','$ip_from_proxy')";

    $sql_q=mysqli_query($con,$sql);
 if($sql_q){
    
        $header="ndr.com";
        $to=$email;
        $subject="Reset your password";
        $message="please click on this mail to reset your passwrod \n
        http://www.ndr1.com/reset_password.php?e=$email";
     mail($to,$subject,$message,$header);
      header('location:check_email_msg.php');
    }
 


else{
    echo 'error'.mysqli_error($con);

}
}



}
?>