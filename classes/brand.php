<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    ?>


<?php
    class brand
    {
        
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function insert_brand($brandName){
            // kiemtra dau gach xeo gach ngang
            $brandName = $this->fm->Validation($brandName);
            
            // ket noi voi CSDL
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            

            if(empty($brandName)) 
            {
                // thong bao user and password
                $alert = "<span class='error'>Brand must be not empty!!</span>";
                return $alert;
            }else {
                $query = "INSERT INTO tbl_brand(brandName) VALUES ('$brandName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert brand successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert brand not success</span>";
                    return $alert;
                }
            }
        }
        public function show_brand(){
            $query = "SELECT * FROM tbl_brand ORDER BY brandID desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_brand($brandName, $id){
             // kiemtra dau gach xeo gach ngang
             $brandName = $this->fm->Validation($brandName);
            
             // ket noi voi CSDL
             $brandName = mysqli_real_escape_string($this->db->link, $brandName);
             $id = mysqli_real_escape_string($this->db->link, $id);
             
 
             if(empty($brandName)) 
             {
                 // thong bao user and password
                 $alert = "<span class='error'>Brand must be not empty!!</span>";
                 return $alert;
             }else {
                 $query = "UPDATE tbl_brand SET brandName='$brandName' WHERE brandID='$id'";
                 $result = $this->db->update($query);
                 if($result){
                     $alert = "<span class='success'>Brand updated successfully</span>";
                     return $alert;
                 }else{
                     $alert = "<span class='error'> Brand can not updated </span>";
                     return $alert;
                 }
             }
        }

        public function del_brand($id){
            $query = "DELETE FROM tbl_brand WHERE brandID = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'> Brand deleted successfully!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'> Brand can not deleted! </span>";
                return $alert;
            }
            
        }
        public function getbrandbyID($id){
            $query = "SELECT * FROM tbl_brand WHERE brandID = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>