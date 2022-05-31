<?php
$filepath = realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/database.php');
require_once ($filepath.'/../helpers/format.php');
?>

<?php
    class subject{
        private $db;
        public function __construct()
        {
            $this->db = new Database();
        }
        public function insert_subject($data){
            $subjectName = mysqli_real_escape_string($this->db->link, $data['subjectName']);
            $subjectEmail = mysqli_real_escape_string($this->db->link, $data['subjectMail']);
            $subjectPhone = mysqli_real_escape_string($this->db->link, $data['subjectPhone']);
            $subjectContent = mysqli_real_escape_string($this->db->link, $data['subjectContent']);

            if ($subjectName=="" || $subjectEmail=="" || $subjectPhone=="" || $subjectContent=="" ){
                $alert = "<span class='error'>Thông tin không được để trống !!</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_subject (subjectName,subjectEmail,subjectPhone,subjectContent)
                            VALUES ('$subjectName','$subjectEmail','$subjectPhone','$subjectContent')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'>Phản hồi của bạn đã được gửi !</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Phản hồi của bạn gửi không thành công !</span>";
                    return $alert;
                }
            }
        }

        public function show_subject(){
            $query = "SELECT * FROM tbl_subject";
            $result = $this->db->select($query);
            return $result;
        }
    }


?>