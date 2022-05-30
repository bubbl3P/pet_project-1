<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    ?>


<?php
    class product
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        // insert
        public function insert_product($data, $files)
        {
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            // kiemtra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image =  substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "uploads/".$unique_image;

            if ($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name ="") {
                // thong bao user and password
                $alert = "<span class='error'>Field must be not empty!!</span>";
                return $alert;
            } else {
                move_uploaded_file($file_temp, $upload_image);
                $query = "INSERT INTO tbl_product(productName,brandID,catID,product_desc,price,type,image) 
                VALUES ('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'>Insert product successfully</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Insert product not success</span>";
                    return $alert;
                }
            }
        }
        // show
        public function show_product()
        {
            $query =
            "SELECT tbl_product.*, tbl_category.catName,tbl_brand.brandName 
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
            INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
            ORDER BY tbl_product.productID  desc";
            
            // $query = "SELECT * FROM tbl_product ORDER BY productID desc";
            $result = $this->db->select($query);
            return $result;
        }
        // update
        public function update_product($data, $file, $id)
        {
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            // kiemtra hinh anh va lay hinh anh cho vao folder upload
            $permited  = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image =  substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "uploads/".$unique_image;
            
            
        
            if ($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="") {
                $alert = "<span class='error'>Field must be not empty!!</span>";
                return $alert;
            } else {
                if (!empty($file_name)) {
                    // neu nguoi dung chon anh
                    if ($file_size > 204800) {
                        $alert = "<span class='success'>Image size should be less than 2MB!</span>";
                        return $alert;
                    } elseif (in_array($file_ext, $permited) === false) {
                        // echo "<span> class ='error'>You can upload only:-".implode(',', $permited)."</span>";
                        $alert = "<span class='success'>You can upload only:-".implode(',', $permited)."</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp, $upload_image);
                    $query = "UPDATE tbl_product SET 
                    productName='$productName',
                    brandID='$brand',
                    catID='$category',
                    type='$type',
                    price='$price',
                    image='$unique_image',
                    product_desc='$product_desc'
                    WHERE productID='$id'";
                } else {
                    // neu nguoi dung ko chon anh
                    $query = "UPDATE tbl_product SET 
                    productName='$productName',
                    brandID='$brand',
                    catID='$category',
                    type='$type',
                    price='$price',
                    product_desc='$product_desc'
                    WHERE productID='$id' ";
                }
                
             
                
                $result = $this->db->update($query);
                if ($result) {
                    $alert = "<span class='success'>Product updated successfully!!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'> Product updated not success!!  </span>";
                    return $alert;
                }
            }
        }


        public function del_product($id)
        {
            $query = "DELETE FROM tbl_product WHERE productID = '$id'";
            $result = $this->db->delete($query);
            if ($result) {
                $alert = "<span class='success'> Product deleted successfully!</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Product can not deleted! </span>";
                return $alert;
            }
        }

        public function del_wlist($proid, $customer_id){
            $query = "DELETE FROM tbl_wishlist WHERE productID = '$proid' AND customer_id = '$customer_id' ";
            $result = $this->db->delete($query);
            return $result;
        }
        
        public function getproductbyid($id)
        {
            $query = "SELECT * FROM tbl_product WHERE productID = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        // END BACKEND

        public function getproduct_feathered()
        {
            $query = "SELECT * FROM tbl_product WHERE type = '0'";
            $result = $this->db->select($query);
            return $result;
        }

        
        public function getproduct_new()
        {
            $query = "SELECT * FROM tbl_product order by productID desc LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id){
            $query = 
            "SELECT tbl_product.*, tbl_category.catName,tbl_brand.brandName 
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
            INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID  WHERE tbl_product.productID = '$id'";
            
           
            $result = $this->db->select($query);
            return $result;
        }

        public function getLastestDell(){
            $query = "SELECT * FROM tbl_product WHERE brandID ='7' order by productID desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastestOppo(){
            $query = "SELECT * FROM tbl_product WHERE brandID ='3' order by productID desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastestHuawei(){
            $query = "SELECT * FROM tbl_product WHERE brandID ='9' order by productID desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastestSamsung(){
            $query = "SELECT * FROM tbl_product WHERE brandID ='8' order by productID desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }


        public function get_compare($customer_id){
            $query = "SELECT * FROM tbl_compare WHERE  customer_id='$customer_id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_wishlist($customer_id){
            $query = "SELECT * FROM tbl_wishlist WHERE  customer_id='$customer_id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }


        public function insertCompare($productid,$customer_id){
        
            $productid = mysqli_real_escape_string($this->db->link, $productid);
            $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
   
            
            // kiem tra da them vao gio hang san pham nao chua?
            $check_compare = "SELECT * FROM tbl_compare  WHERE productID = '$productid' AND customer_id='$customer_id'";
            $result_check_compare = $this->db->select($check_compare);
            if($result_check_compare){
                $msg= "<span class='error'> Product already added to compare </span>";
                return $msg;
            }else {
                $query = "SELECT * FROM tbl_product WHERE productID = '$productid'";
                $result = $this->db->select($query)->fetch_assoc();
                

                $productName = $result["productName"];
                $price = $result["price"];
                $image = $result["image"];

                $query_insert = "INSERT INTO tbl_compare(productID,price,image,customer_id,productName) 
                VALUES ('$productid','$price','$image','$customer_id','$productName')";
                $insert_compare = $this->db->insert($query_insert);
                if ($insert_compare) {
                    $alert = "<span class='success'>Added Compare successfully!!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'> Added Compare not success!!  </span>";
                    return $alert;
                }
            }
        }
        

        public function insertWishlist($productid,$customer_id){
            $productid = mysqli_real_escape_string($this->db->link, $productid);
            $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
   
            
            // kiem tra da them vao gio hang san pham nao chua?
            $check_wlist = "SELECT * FROM tbl_wishlist  WHERE productID = '$productid' AND customer_id='$customer_id'";
            $result_check_wlist = $this->db->select($check_wlist);
            if($result_check_wlist){
                $msg= "<span class='error'> Product already added to wishlist </span>";
                return $msg;
            }else {
                $query = "SELECT * FROM tbl_product WHERE productID = '$productid'";
                $result = $this->db->select($query)->fetch_assoc();
                

                $productName = $result["productName"];
                $price = $result["price"];
                $image = $result["image"];

                $query_insert = "INSERT INTO tbl_wishlist(productID,price,image,customer_id,productName) 
                VALUES ('$productid','$price','$image','$customer_id','$productName')";
                $insert_wlist = $this->db->insert($query_insert);
                if ($insert_wlist) {
                    $alert = "<span class='success'>Added to  Wishlist successfully!!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'> Added to Wishlist not success!!  </span>";
                    return $alert;
                }
            }
        }

    }
?>