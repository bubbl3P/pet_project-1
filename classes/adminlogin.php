<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../lib/session.php');
    Session::checkLogin();
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
    ?>


<?php
    class adminLogin {
        
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function login_admin($adminUser,$adminPass){
            // kiemtra dau gach xeo gach ngang
            $adminUser = $this->fm->Validation($adminUser);
            $adminPass = $this->fm->Validation($adminPass);
            // ket noi voi CSDL
            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if(empty($adminUser) || empty($adminPass))
            {
                // thong bao user and password
                $alert = " User and Pass must be not empty!!";
                return $alert;
            }else {
                $query = "SELECT * FROM tbl_admin WHERE adminUser ='$adminUser' AND adminPass ='$adminPass'";
                $result = $this->db->select($query);

                if($result !== false){
                    $value = $result->fetch_assoc();
                    Session::set('adminLogin',true);
                    Session::set('adminID',$value['adminID']);
                    Session::set('adminUser',$value['adminUser']);
                    Session::set('adminName',$value['adminName']);
                    header('Location:index.php');

                }else {
                    $alert = "User and Pass not match";
                    return $alert;
                }

            
            }
        }
    }
?>