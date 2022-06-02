<?php
$filepath = realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/database.php');
require_once ($filepath.'/../helpers/format.php');
?>

<?php
    class feedback
    {
        private $db;
        public function __construct()
        {
            $this->db = new Database();
        }
        public function insert_feedback($data){
            $feedbackName = mysqli_real_escape_string($this->db->link, $data['feedbackName']);
            $feedbackEmail = mysqli_real_escape_string($this->db->link, $data['feedbackEmail']);
            $feedbackPhone = mysqli_real_escape_string($this->db->link, $data['feedbackPhone']);
            $feedbackContent = mysqli_real_escape_string($this->db->link, $data['feedbackContent']);

            if ($feedbackName=="" || $feedbackEmail=="" || $feedbackPhone=="" || $feedbackContent=="" ){
                $alert = "<span class='error'>Thông tin không được để trống !!</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_feedback (feedbackName,feedbackEmail,feedbackPhone,feedbackContent)
                            VALUES ('$feedbackName','$feedbackEmail','$feedbackPhone','$feedbackContent')";
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

//        public function show_subject(){
//            $query = "SELECT * FROM tbl_subject";
//            $result = $this->db->select($query);
//            return $result;
//        }

    public function del_feedback($id)
    {
        $query = "DELETE FROM tbl_feedback WHERE feedback_id = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'> Feedback deleted successfully!</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Feedback can not deleted! </span>";
            return $alert;
        }
    }

    public function show_feedback()
    {
        $query = "SELECT * FROM tbl_feedback";

        // $query = "SELECT * FROM tbl_product ORDER BY productID desc";
        $result = $this->db->select($query);
        return $result;
    }
    }


?>