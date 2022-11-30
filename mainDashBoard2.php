<?php
header("content-type:text/html;charset=UTF-8");
include_once "../config/config.php";
$cnf = new Config();
$rootPath = $cnf->path;
?>

<link rel="stylesheet" href="<?= $rootPath ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="<?= $rootPath ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $rootPath ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/mainDashBoard2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt&family=Roboto&display=swap" rel="stylesheet">




<section class="content ">
    <div class="container ">
        <div class="row ">

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua Dglss">
                    <div class="inner">
                        <p style="font-size: 25px;">งานใหม่</p>
                        <h3 style="text-align: center; font-size: 50px;"><span id="obj_newWork"></span></h3>
                    </div>
                    <div class="icon">
                        <i class="ion-leaf"></i>
                    </div>
                    <a href="#" id="btnTaskInit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>



            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow  Dglss">
                    <div class="inner">

                        <p style="font-size: 25px;">กำลังดำเนินการ</p>


                        <h3 style="text-align: center; font-size: 50px;"><span id="obj_progressWork"></span></h3>
                    </div>

                    <div class="icon">
                        <i class="ion-ios-flame"></i>
                    </div>
                    <a href="#" id="btnTaskInprogress" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>




            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green  Dglss">
                    <div class="inner">
                        <p style="font-size: 25px;">งานสำเร็จแล้ว</p>
                        <h3 style="text-align: center; font-size: 50px;"><span id="obj_completeWork"></span></h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" id="btnTaskComplete" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>



        <div class="row">

            <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-5   ">
                <div id="dvRadar" style="background-color:white;  text-align: center;  ">
                </div>
            </div>


            <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-5   ">
                <div id="dvBar" style="background-color:white ; text-align: center;">
                </div>
            </div>

            
        </div>
    </div>


</section>

<div class="modal fade" id="modal-initialize">
    <div class="modal-dialog" style="width:1500px">
        <div class="modal-content">
            <div class="box-header with-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">งานใหม่</h4>
            </div>
            <div class="modal-body" id="dvInit">

            </div>
            <div>
                <!--<div class="modal-footer">
                    <input type="button" id="btnInitialClose" value="ปิด"  >
                  </div>-->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-inprogress">
    <div class="modal-dialog" style="width:1500px">
        <div class="modal-content">
            <div class="box-header with-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">งานที่แจ้ง</h4>
            </div>
            <div class="modal-body" id="dvInprogress">

            </div>
            <div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-complete">
    <div class="modal-dialog" style="width:1500px">
        <div class="modal-content">
            <div class="box-header with-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">งานที่สำเร็จแล้ว</h4>
            </div>
            <div class="modal-body" id="dvComplete">

            </div>
            <div>

            </div>
        </div>
    </div>
</div>



<script>
    function setNewWork() {
        var url = "<?= $rootPath ?>/Dashboard/getNewWorkAll.php";
        var data = queryData(url);
        $("#obj_newWork").text(data.CNT);
    }

    function setProgressWork() {
        var url = "<?= $rootPath ?>/Dashboard/getProgressWorkAll.php";
        var data = queryData(url);
        $("#obj_progressWork").text(data.CNT);
    }

    function setCompleteWork() {
        var url = "<?= $rootPath ?>/Dashboard/getCompleteWorkAll.php";
        var data = queryData(url);
        $("#obj_completeWork").text(data.CNT);
    }

    function setFailWork() {
        var url = "<?= $rootPath ?>/Dashboard/getFailWorkAll.php";
        var data = queryData(url);
        $("#obj_failWork").text(data.CNT);
    }

    function setRadar() {
        var url = "<?= $rootPath ?>/Dashboard/radarSumaryByIssueType.php";

        $("#dvRadar").load(url);
    }

    function setPie() {
        var url = "<?= $rootPath ?>/Dashboard/pieSumaryByIssueType.php";

        $("#dvRadar").load(url);
    }

    function setBar() {
        var url = "<?= $rootPath ?>/Dashboard/barSumaryAsignment.php";
        $("#dvBar").load(url);
    }

    //pieEvaluation.php
    function setPieEva() {
        var url = "<?= $rootPath ?>/Dashboard/pieEvaluation.php";
        $("#dvBar").load(url);
    }




    $(document).ready(function() {
        setNewWork();
        setProgressWork();
        setCompleteWork();
        setFailWork();
        setPie();
        setPieEva();

        $("#btnTaskInit").click(function() {
            $("#modal-initialize").modal("toggle");
            var url = "<?= $rootPath ?>/tissue/popupInitialize.php";
            $("#dvInit").load(url);
        });

        $("#btnTaskInprogress").click(function() {
            $("#modal-inprogress").modal("toggle");
            var url = "<?= $rootPath ?>/tissue/popupInprogress.php";
            $("#dvInprogress").load(url);
        });


        $("#btnTaskComplete").click(function() {
            $("#modal-complete").modal("toggle");
            var url = "<?= $rootPath ?>/tissue/popupComplete.php";
            //var url="<?= $rootPath ?>/tissue/T1.php";
            $("#dvComplete").load(url);
        });


        $(".close").click(function() {
            $("#modal-initialize").modal("hide");
        });



    });
</script>

</div>
<script src="js/bootstrap.min.js"></script>

</section>