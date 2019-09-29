<?php
include('includes/header.php');
include('includes/db_functions.php');
include('language/language.php');

if (isset($_POST['practical_search'])) {//not cmplte
    $paper_qry = "SELECT * FROM tab_practical WHERE tab_practical.name like '%" . addslashes($_POST['search_value']) . "%' or
    tab_practical.practicalCategory like '%" . addslashes($_POST['search_value']) . "%' or
    tab_practical.subject like '%" . addslashes($_POST['search_value']) . "%' ORDER BY tab_practical.paid DESC";
    $practical_result = mysqli_query($mysqli, $paper_qry);}

 else {
    $tableName = "tab_practical";
    $targetpage = "manage_practicals.php";
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
    $users_qry = "SELECT * FROM tab_practical ORDER BY tab_practical.paid DESC LIMIT $start, $limit";
    $practical_result = mysqli_query($mysqli, $users_qry);
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
                    <div class="page_title">Manage Practicals</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        <div class="search_block">
                            <form method="post" action=""><input class="form-control input-sm" placeholder="Search..."
                                                                 aria-controls="DataTables_Table_0" type="search"
                                                                 name="search_value" required>
                                <button type="submit" name="practical_search" class="btn-search"><i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="add_btn_primary"><a href="add_practical.php?add=yes">Add Practical</a></div>
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
                        <th>Practical Name</th>
                        <th>Catagory</th>
                        <th>Subject</th>
                        <th>URL</th>
                        
                        <th class="cat_action_list">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    while ($prac_row = mysqli_fetch_array($practical_result)) { ?>
                        <tr>
          				<td><?php echo $i+1 ;?></td>
                            <td><?php echo $prac_row['name']; ?></td>
                            <td><?php echo $prac_row['practicalCategory']; ?></td>
                            <td><?php echo $prac_row['subject']; ?></td>
                            <td><?php echo $prac_row['link']; ?></td>
                            
           
                            <td>
                                <!-- <div class="row"> -->
                                    <a href="add_practical.php?practical_id=<?php echo $prac_row['paid']; ?>&addThis=yes" class="btn btn-primary">Edit</a>
                                    <a href="manage_practicals.php?practical_id=<?php echo $prac_row['paid']; ?>&delete=yes"
                                    onclick="return confirm('Are you sure you want to delete this user?');"
                                    class="btn btn-default">Delete</a>
                                
                                <!-- </div> -->
                                <!-- <div class="row"> -->
                                    <!-- <a href="#" class="btn btn-primary">Add Question</a> -->

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
?>F