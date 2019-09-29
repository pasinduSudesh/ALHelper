<?php
include('includes/header.php');
include('includes/db_functions.php');
include('language/language.php');

if (isset($_POST['user_search'])) {//not cmplte
    $paper_qry = "SELECT * FROM tab_user WHERE tab_user.fullName like '%" . addslashes($_POST['search_value']) . "%' or
    tab_user.phone like '%" . addslashes($_POST['search_value']) . "%' or
    tab_user.school like '%" . addslashes($_POST['search_value']) . "%' or 
    tab_user.district like '%" . addslashes($_POST['search_value']) . "%' or
    tab_user.email like '%" . addslashes($_POST['search_value']) . "%' ORDER BY tab_user.uid DESC";
    $paper_result = mysqli_query($mysqli, $paper_qry);}

 else {
    $tableName = "tab_paper";
    $targetpage = "manage_exams.php";
    $limit = 15;
    $query = "SELECT COUNT(*) as num FROM $tableName";
    $total_pages = mysqli_fetch_array(mysqli_query($mysqli, $query));
    $total_pages = $total_pages['num'];
    $stages = 3;
    $page = 0;
    if (isset($_GET['page'])) {
        $page = mysqli_real_escape_string($mysqli, $_GET['page']);
    }
    if ($page) {
        $start = ($page - 1) * $limit;
    } else {
        $start = 0;
    }
    $users_qry = "SELECT * FROM tab_paper ORDER BY tab_paper.pid DESC LIMIT $start, $limit";
    $users_result = mysqli_query($mysqli, $users_qry);
}
if (isset($_GET['delete'])) {
    delete('tab_paper', 'pid=' . $_GET['paper_id'] . '');
    $_SESSION['msg'] = "12";
    header("Location:manage_exams.php");
    exit;
}//Active and Deactive status
if (isset($_GET['postExam'])){
    $data = array('postState' => '1');
    update('tab_paper',$data,"WHERE pid = '".$_GET['paper_id']."'");
    $_SESSION['msg'] = "17";
    header("Location:manage_exams.php");
    exit;;

}

if (isset($_GET['status_deactive_id'])) {
    $data = array('status' => '0');
    $edit_status = Update('tbl_users', $data, "WHERE id = '" . $_GET['status_deactive_id'] . "'");
    $_SESSION['msg'] = "14";    header("Location:manage_users.php");
    exit;
}if (isset($_GET['status_active_id'])) {
    $data = array('status' => '1');
    $edit_status = Update('tbl_users', $data, "WHERE id = '" . $_GET['status_active_id'] . "'");
    $_SESSION['msg'] = "13";    header("Location:manage_users.php");
    exit;
}
?>

    <div class="row">
    <div class="col-xs-12">
        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Manage Exams</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        <div class="search_block">
                            <form method="post" action=""><input class="form-control input-sm" placeholder="Search..."
                                                                 aria-controls="DataTables_Table_0" type="search"
                                                                 name="search_value" required>
                                <button type="submit" name="user_search" class="btn-search"><i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="add_btn_primary"><a href="add_exam.php?add=yes">Add Exam</a></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row mrg-top">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12">
                        <?php if (isset($_SESSION['msg'])) { ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                <?php echo $client_lang[$_SESSION['msg']]; ?></a>
                            </div>
                            <?php unset($_SESSION['msg']);
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mrg-top">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Paper Catagory</th>
                        <th>Paper Title</th>
                        <th>Date</th>
                        
                        <th class="cat_action_list">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    while ($users_row = mysqli_fetch_array($users_result)) { ?>
                        <tr>
          				<td><?php echo $i+1 ;?></td>
                            <td><?php echo $users_row['subject']; ?></td>
                            <td><?php echo $users_row['paperCategory']; ?></td>
                            <td><?php echo $users_row['paperTitle']; ?></td>
                            <td><?php echo $users_row['date']; ?></td>
                            
           
                            <td>
                                <!-- <div class="row"> -->
                                    <a href="add_exam.php?paper_id=<?php echo $users_row['pid']; ?>&delete=yes" class="btn btn-primary">Edit</a>
                                    <a href="manage_exams.php?paper_id=<?php echo $users_row['pid']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this user?');"
                                    class="btn btn-default">Delete</a>
                                    <?php if($users_row['postState'] == "0"){?><a href="manage_exams.php?paper_id=<?php echo $users_row['pid']; ?>&postExam=yes" 
                                    class="btn btn-primary">Publish</a><?php } ?>
                                <!-- </div> -->
                                <!-- <div class="row"> -->
                                    <a href="#" class="btn btn-primary">Add Question</a>

                                <!-- </div> -->
                            </td>
                        </tr>
                        <?php $i++;
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="pagination_item_block">
                    <nav>
                        <?php if (!isset($_POST["search"])) {
                            include("pagination.php");
                        } ?>
                    </nav>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
<?php
include('includes/footer.php');
?>