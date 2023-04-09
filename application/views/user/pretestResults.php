<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>

<body>
    <script src="<?php echo base_url(); ?>/assets/js/preloader.js"></script>
    <div class="body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include('sidebar.php');?>
        <!-- partial -->
        <div class="main-wrapper mdc-drawer-app-content">
            <!-- partial:partials/_navbar.html -->
            <?php include('nav.php');?>
            <!-- partial -->
            <div class="page-wrapper mdc-toolbar-fixed-adjust">
                <main class="content-wrapper">
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                <div class="mdc-card">
                                    <div class="d-flex justify-content-between">
                                        <button
                                            class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded"
                                            style="--mdc-ripple-fg-size:65px; --mdc-ripple-fg-scale:1.92333; --mdc-ripple-fg-translate-start:-21.6875px, -3.5px; --mdc-ripple-fg-translate-end:22.1188px, -14.5px;">
                                            Pre Test Results
                                        </button>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center !important;">Test</th>
                                                                    <th>Points</th>
                                                                    <th>Percentage</th>

                                                                </tr>
                                                            </thead>
                                                            <?php
															//s print_r($test_result);exit();
															foreach ($test_result->result() as $row) { ?>
                                                            <?php if ($row->test_id && $row->test_type1 == 1) { ?>
                                                            <tr class="ynvxmx">
                                                                <td style="text-align:center !important;">
                                                                    <?php echo $row->course_title; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row->points; ?>/
                                                                    <?php echo $row->total ?>
                                                                </td>
                                                                <td>
                                                                    <?php $p1 = $row->points;
														$t1 = $row->total;
														echo  round($p1 * 100 / $t1, 2) . "%"; ?>
                                                                </td>

                                                            </tr>
                                                            <?php } ?>
                                                            <?php  } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="mdk-drawer-layout__content mdk-drawer-layout__content--scrollable">
                                        <div class="container"> 
 										   <div class="d-flex justify-content-between">
                                                <button
                                                    class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded"
                                                    style="--mdc-ripple-fg-size:65px; --mdc-ripple-fg-scale:1.92333; --mdc-ripple-fg-translate-start:-21.6875px, -3.5px; --mdc-ripple-fg-translate-end:22.1188px, -14.5px;">
                                                    Attempt Results
                                                </button>
                                            </div><br>

                                            <div class="card"> 
     											<div class="tab-content card-body">
                                                    <div class="tab-pane active" id="first">
													 
                                                        <?php $i=1; foreach($test->result() as $row) { ?>
                                                        <div class="form-group row banm">
														    <p class="col-sm-12"><span id="van"><?php echo $i;?>.</span>
															       
															</p>
                                                            <p class="col-sm-12"><span id="van">Question :</span>
                                                                <?php echo $row->quations; ?>
                                                            </p>
                                                            <p class="col-sm-12"><span id="van">Your Answer :</span>
                                                                <?php echo $row->answer2; ?>
                                                            </p>
                                                            <p class="col-sm-12"><span id="vam">Correct Answer :</span>
                                                                <b><?php echo $row->answer; ?></b>
                                                            </p>
                                                        </div>
                                                        <hr>
                                                        <?php $i++;   }  ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- partial:partials/_footer.html -->
                        <?php include('footer.php');?>
                        <!-- partial -->
                    </div>
            </div>
        </div>
    </div>

</body>

</html>