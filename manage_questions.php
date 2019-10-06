<?php

include("includes/header.php");
require("includes/db_functions.php");
require("language/language.php");

if(isset($_GET['subject']) and isset($_GET['chapid']))
{ 

    $subject = $_GET['subject'];
    $title = $_GET['chapid'];
    $category = $_GET['cat'];

    $query = "SELECT * FROM `tab_paper` WHERE `subject`='".$subject."' and `paperTitle`='".$title."' and `paperCategory`='".$category."'";
    $result = mysqli_query($mysqli,$query);
    $result = mysqli_fetch_array($result);

    $paperId = $result['pid'];

    $paper_query = "SELECT * FROM `tbl_question` WHERE `pid` = '".$paperId."'";
    $paper_result = mysqli_query($mysqli,$paper_query);
    
  }

if ((isset($_GET['question_id'])) and (isset($_GET['paper_id']))){
    delete('tbl_question', 'pid=' . $_GET['paper_id'] . ' and  qid='.$_GET['question_id'].'');
    $_SESSION['msg'] = "12";
    header("Location:manage_questions.php");
    exit;
}

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {

        $("#subject").bind("change", function() {
            $.ajax({
                type: "GET",
                url: "changes1.php",
                data: "subject=" + $("#subject").val(),
                success: function(response) {
                    $("#chapid").html(response);
                }
            });
        });


    });
</script>

<script type="text/javascript">
    $(function() {

        $("#subject").bind("change", function() {
            $.ajax({
                type: "GET",
                url: "changes2.php",
                data: "subject=" + $("#subject").val(),
                success: function(response) {
                    $("#cat").html(response);
                }
            });
        });


    });
</script>

<div class="row">
    <div class="col-xs-12">
        <div class="card mrg_bottom">
            <div class="page_title_block">

                <div style=" font-family: 'Open Sans'; font-size: 1.2em;  font-weight: 500; color: #666666;  padding: 20px 10px 10px 30px;">
                    <form action="" name="add_form" method="GET" class="form form-horizontal" enctype="multipart/form-data">


                        <div class="form-group">
                            <label class="col-md-3 control-label">Subject :-</label>
                            <div class="col-md-6 ">
                                <select name="subject" id="subject" class="select2" required>
                                    <option value="">--Select Subject--</option>
                                    <?php
                                    foreach($subjects as $value) {
                                        ?>
                                        <option value="<?php echo $value; ?>">

                                            <?php echo $value; ?>

                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Category :-</label>
                            <div class="col-md-6 ">
                                <select name="cat" id="cat" class="select2" required>
                                    <option value="">--Select Category--</option>
                                    <?php
                                    foreach($paperCat as $value) {
                                        ?>
                                        <option value="<?php echo $value; ?>">

                                            <?php echo $value; ?>

                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Exam Title :-</label>
                            <div class="col-md-6 ">
                                <select name="chapid" id="chapid" class="select2" required>

                                    <option value="">--Select title--</option>

                                </select>
                            </div>
                        </div>


                        <button type="submit" name="submit" class="btn btn-primary">submit</button>


                    </form>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div style=" font-family: 'Open Sans'; font-size: 1.2em;  font-weight: 500; color: #666666;  padding: 20px 20px 20px 5px;">
                      
                    <?php if(isset($_GET['subject']) and isset($_GET['chapid'])){ ?>
                        <div class="page_title"><strong>Add Question</strong> <?php echo str_repeat("&nbsp;",10).$subject.str_repeat("&nbsp;",5)."  >  ".str_repeat("&nbsp;",5).
                    $category.str_repeat("&nbsp;",5)."  >  ".str_repeat("&nbsp;",5).$title; ?>  </div> <?php } ?>
                       
                    </div>

                </div>

                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Questions</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">

                        <div class="add_btn_primary"> <a href="add_question.php?paper_id=<?php echo $paperId;?>&thisPaper=yes">Add Questions</a> </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row mrg-top">
                <div class="col-md-12">

                    <div class="col-md-12 col-sm-12">
                        <?php if (isset($_SESSION['msg'])) { ?>
                            <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <?php echo $client_lang[$_SESSION['msg']]; ?></a> </div>
                        <?php unset($_SESSION['msg']);
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mrg-top" style="width:100%; overflow-x:scroll">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>question</th>
                            <th>ans 1</th>
                            <th>ans 2</th>
                            <th>ans 3</th>
                            <th>ans 4</th>
                            <th>ans 5</th>

                            <th>Answer</th>
                            <th class="cat_action_list">Action</th>
                        </tr>
                    </thead>
                    <tbody id="maintable">
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($paper_result)) {
                            ?>
                            <tr>
                                <!-- <td><?php echo $i + 1; ?></td> -->

                                <td><?php echo $row['qid']; ?></td>
                                <td><?php echo $row['question']; ?></td>
                                <td><?php echo $row['ans1']; ?></td>
                                <td><?php echo $row['and2']; ?></td>
                                <td><?php echo $row['ans3']; ?></td>
                                <td><?php echo $row['ans4']; ?></td>
                                <td><?php echo $row['ans5']; ?></td>

                                <td><?php echo $row['correctAanswer']; ?></td>

                                <td>
                                    <a href="edit_question.php?question_id=<?php echo $row['qid']; ?>&paper_id=<?php echo $paperId;?>" class="btn btn-primary">Edit</a>
                                    <a href="manage_questions.php?question_id=<?php echo $row['qid']; ?>&paper_id=<?php echo $paperId;?>" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this Queation?');">Delete</a></td>
                            </tr>
                        <?php

                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="pagination_item_block">
                    <nav>
                        <?php include("pagination.php"); ?>
                    </nav>
                </div>
            </div>
            <div class="clearfix"></div> 
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>