<?php
    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../lib/database.php');
    require_once ($filepath.'/../helpers/format.php');
    ?>


<?php
ob_start();
    class cart
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function add_to_cart($quantity, $id){

            $quantity = $this->fm->Validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sID =  session_id();
            
            // kiem tra da them vao gio hang san pham nao chua?
            // $check_cart = "SELECT * FROM tbl_cart WHERE productID = '$id' AND sID='$sID'";
            // if($check_cart){
            //     $msg= "Product Already added!!";
            //     return $msg;
            // }else {

                $query = "SELECT * FROM tbl_product WHERE productID = '$id'";
                $result = $this->db->select($query)->fetch_assoc();
                

                $image = $result["image"];
                $price = $result["price"];
                $productName = $result["productName"];

                $query_insert = "INSERT INTO tbl_cart(productID,quantity,sID,image,price,productName) 
                VALUES ('$id','$quantity','$sID','$image','$price','$productName')";
                $insert_cart = $this->db->insert($query_insert);
                if ($insert_cart) {
                    header('Location:cart.php');
                } else {
                    header('Location:404.php');
                }

            // }
        }
        public function get_product_cart(){
            $sID =  session_id();
            $query = "SELECT * FROM tbl_cart WHERE sID = '$sID'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_quantity_cart($quantity, $cartID){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $cartID = mysqli_real_escape_string($this->db->link, $cartID);
            $query = "UPDATE tbl_cart SET 
                    quantity = '$quantity' WHERE cartID = '$cartID'";
            $result = $this->db->update($query);
            if($result){
                header('Location:cart.php');
            }else{
                $msg= "<span style class ='error'>Product Quantity Updated Not Successful </span>";
                return $msg;
            }
        }

        public function del_product_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link, $cartid);
            $query = "DELETE FROM tbl_cart WHERE cartID = '$cartid'";
            $result = $this->db->delete($query);
            if($result){
                header('Location:cart.php');
            }else{
                $msg= "<span style class ='error'>Product Quantity Delete Not Successful </span>";
                return $msg;
            }

            
        }


        
        public function check_cart(){
            $sID =  session_id();
            $query = "SELECT * FROM tbl_cart WHERE sID = '$sID'";
            $result = $this->db->select($query);
            return $result;
        }


        public function check_order($customer_id){
            $sID =  session_id();
            $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_all_data_cart(){
            $sID =  session_id();
            $query = "DELETE  FROM tbl_cart WHERE sID = '$sID'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_compare($customer_id){
            $sID =  session_id();
            $query = "DELETE  FROM tbl_compare WHERE customer_id = '$customer_id'";
            $result = $this->db->delete($query);
            return $result;
        }

        public function insertOrder($customer_id){
            $sID =  session_id();
            $query = "SELECT * FROM tbl_cart WHERE sID = '$sID'";
            $get_product = $this->db->select($query);
           if($get_product){
               while($result = $get_product->fetch_assoc()){
                   $productid = $result['productID'];
                   $productName = $result['productName'];
                   $quantity = $result['quantity'];
                   $price = $result['price'] * $quantity;
                   $image = $result['image'];
                   $customer_id = $customer_id;

                $query_order = "INSERT INTO tbl_order(productID,productName,quantity,price,image,customer_id) 
                VALUES ('$productid','$productName','$quantity','$price','$image','$customer_id')";
                $insert_order = $this->db->insert($query_order);
                return $insert_order;
                
               }
           }
        }

        public function getAmountPrice($customer_id){
            
            $query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id'";
            $get_price = $this->db->select($query);
            return $get_price;
        }

        public function get_cart_ordered($customer_id){
            
            $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
            $get_cart_ordered = $this->db->select($query);
            return $get_cart_ordered;
        }


        public function get_inbox_cart(){
            $query = "SELECT * FROM tbl_order order by date_order";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }

        public function shifted($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);

            $query = "UPDATE tbl_order SET 
                    status = '1'
                    WHERE id = '$id' AND date_order = '$time' AND price = '$price'";
            $result = $this->db->update($query);
            if($result){
                $msg= "<span style class ='success'>Update Order  Successful </span>";
                return $msg;
            }else{
                $msg= "<span style class ='error'>Update Order Not Success </span>";
                return $msg;
            }
        }
        public function del_shifted($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);

            $query = "DELETE FROM tbl_order 
                    WHERE id = '$id' AND date_order = '$time' AND price = '$price'";
            $result = $this->db->update($query);
            if($result){
                $msg= "<span style class ='success'>Delete Order  Successful </span>";
                return $msg;
            }else{
                $msg= "<span style class ='error'>Delete Order Not Success </span>";
                return $msg;
            }
        }
        
        public function shifted_confirm($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);

            $query = "UPDATE tbl_order SET 
                    status = '2'
                    WHERE customer_id = '$id' AND date_order = '$time' AND price = '$price'";
            $result = $this->db->update($query);
            return $result;
            
        }
        
    }
?>