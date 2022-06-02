<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  require '../classes/brand.php'?>
<?php  require '../classes/category.php'?>
<?php  require_once '../helpers/format.php'?>
<?php  require '../classes/feedback.php'?>

<?php
$fb = new feedback();
$fm = new Format();
if(isset($_GET['feedbackID'])){
    $id = $_GET['feedbackID'];
    $del_feedback = $fb->del_feedback($id);
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách feedback</h2>
        <div class="block">
            <?php
            if(isset($del_product)){
                echo $del_product;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>FeedBack Name</th>
                    <th>FeedBack Phone</th>
                    <th>FeedBack Email</th>
                    <th>FeedBack Content</th>
                    <th>Action </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $fblist = $fb->show_feedback();
                if ($fblist) {
                    $i = 0;
                    while ($result = $fblist->fetch_assoc()){
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['feedbackName']?></td>
                            <td><?php echo $result['feedbackPhone']?></td>
                            <td><?php echo $result['feedbackEmail']?></td>
                            <td><?php echo $result['feedbackContent']?></td>
                            <td><a href="?feedbackID=<?php echo $result['feedbackID']?>">Delete</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
