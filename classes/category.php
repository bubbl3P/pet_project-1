<?php
    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../lib/database.php');
    require_once ($filepath.'/../helpers/format.php');
    ?>


<?php
    class category {
        
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function insert_category($catName){
            // kiemtra dau gach xeo gach ngang
            $catName = $this->fm->Validation($catName);
            
            // ket noi voi CSDL
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            

            if(empty($catName)) 
            {
                // thong bao user and password
                $alert = "<span class='error'>Category must be not empty!!</span>";
                return $alert;
            }else {
                $query = "INSERT INTO tbl_category(catName) VALUES ('$catName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert category successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert category not success</span>";
                    return $alert;
                }
            }
        }
        public function show_category(){
            $query = "SELECT * FROM tbl_category ORDER BY catID desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($catName, $id){
             // kiemtra dau gach xeo gach ngang
             $catName = $this->fm->Validation($catName);
            
             // ket noi voi CSDL
             $catName = mysqli_real_escape_string($this->db->link, $catName);
             $id = mysqli_real_escape_string($this->db->link, $id);
             
 
             if(empty($catName)) 
             {
                 // thong bao user and password
                 $alert = "<span class='error'>Category must be not empty!!</span>";
                 return $alert;
             }else {
                 $query = "UPDATE tbl_category SET catName='$catName' WHERE catID='$id'";
                 $result = $this->db->update($query);
                 if($result){
                     $alert = "<span class='success'>Category updated successfully</span>";
                     return $alert;
                 }else{
                     $alert = "<span class='error'> Category can not updated </span>";
                     return $alert;
                 }
             }
        }

        public function del_category($id){
            $query = "DELETE FROM tbl_category WHERE catID = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'> Category deleted successfully!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'> Category can not deleted! </span>";
                return $alert;
            }
            
        }
        public function getcatbyid($id){
            $query = "SELECT * FROM tbl_category WHERE catID = '$id'";
            $result = $this->db->select($query);
            return $result;
        }


        public function show_category_fontend(){
            $query = "SELECT * FROM tbl_category ORDER BY catID desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_by_cat($id){
            $query = "SELECT * FROM tbl_product WHERE catID = '$id' ORDER BY catID desc LIMIT 8";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_name_by_cat($id){
            $query = "SELECT tbl_product.*, tbl_category.catName,tbl_category.catID FROM tbl_product,tbl_category WHERE tbl_product.catID = tbl_category.catID AND tbl_product.catID='$id' LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }



    }
?>