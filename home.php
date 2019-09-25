<?php
include("includes/header.php");

$query_user = "SELECT COUNT(*) as num FROM tab_user";
$user_count = mysqli_fetch_array(mysqli_query($mysqli, $query_user));
$user_count = $user_count['num'];

$query_exam = "SELECT COUNT(*) as num FROM tab_paper";
$paper_count = mysqli_fetch_array(mysqli_query($mysqli, $query_exam));
$paper_count = $paper_count['num'];

$query_practical = "SELECT COUNT(*) as num FROM tab_practical";
$practical_count = mysqli_fetch_array(mysqli_query($mysqli, $query_practical));
$practical_count = $practical_count['num'];

?>

<div class="row">

    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_users.php" class="card card-banner card-yellow-light">
            <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
                <div class="content">
                    <div class="title">Users</div>
                    <div class="value"><span class="sign"></span><?php echo $user_count; ?></div>
                </div>
            </div>
        </a> </div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_exams.php" class="card card-banner card-green-light">
            <div class="card-body"> <i class="icon fa fa-sitemap fa-4x"></i>
                <div class="content">
                    <div class="title">Exams</div>
                    <div class="value"><span class="sign"></span><?php echo $paper_count; ?></div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_practical.php" class="card card-banner card-green-light">
            <div class="card-body"> <i class="icon fa fa-sitemap fa-4x"></i>
                <div class="content">
                    <div class="title">Practicals</div>
                    <div class="value"><span class="sign"></span><?php echo $practical_count; ?></div>
                </div>
            </div>
        </a>
    </div>



</div>


<?php include("includes/footer.php"); ?>