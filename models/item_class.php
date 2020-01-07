<?php
class item{
    public function get_connection(){
        return $con=mysqli_connect('localhost','root','12345678','ndr_db');
    }

    public function insert_item($name,$email,$price,$amount,$target_folder,$target_loc){
        $con=$this->get_connection();
        $query="insert into items (name,supplier_email,price,amount,image,image_path) values ('$name','$email','$price',
        '$amount','$target_folder','$target_loc')" ;
        $result=mysqli_query($con,$query);

        if($result){
            session_start();
            $_SESSION['s_email']=$email;
            header('location:../setting.php');
        }

        else{
            echo 'error'.mysqli_error($con);
        }

        return $result;

    }


    public function update($id,$name,$email,$price,$amount,$target_folder,$target_loc){
        $con=$this->get_connection();
        $query="update items set name='$name',price='$price',amount='$amount',image='$target_folder',image_path='$target_loc' where id='$id'";
        $result=mysqli_query($con,$query);
        if($result){
            // echo '<script>alert("update data ...")</script>';
           
            header('location:../setting.php');
        }
        else{
            echo "Error".mysqli_error($con);
     
        }
    }


    public function delete($id){
        $con=$this->get_connection();
        $query="delete from items where id='$id'";
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
    public $price;
    public $amount;
    public $path;

    public function get_item_by_id($id){
        $con=$this->get_connection();
        $query="select * from items where id='$id'";
        $result=mysqli_query($con,$query);
        if($result){
            $data=mysqli_fetch_assoc($result);
            $this->name=$data['name'];
            $this->price=$data['price'];
            $this->amount=$data['amount'];
            $this->path=$data['image_path'];

        }
    }

    public function get_image($id){
        $con=$this->get_connection();
        $query="select * from items where id='$id'";
        $result=mysqli_query($con,$query);
        if($result){
            $data=mysqli_fetch_assoc($result);
            $image_path=$data['image_path'];
            $image=$data['image'];
        }
        return array($image,$image_path);
        
    }
}

?>