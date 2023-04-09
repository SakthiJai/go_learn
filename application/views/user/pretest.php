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
								Pre Test
							</button>
						</div>
						<?php $i=1; $program_id =0;foreach($pre_test_list->result() as $row) { $program_id= $row->program_id;?>
						<input type="hidden" name="program_id" value="<?php echo $row->program_id;?>">
						<?php } ?>

						<div class="col-12 grid-margin">
							<div class="card card-statistics">
							   <?php if ($test_sub->count2 > 0 && $test_sub->test_type1 == 1) { ?>
							     
								  <div class="ssss">
									<table class="gdtdnd">
										<tr class="qawss">
											<th>Test</th>
											<th>Points</th>
											<th>Percentage</th>
											<th>Read more</th>
										</tr>
										<?php
										//s print_r($test_result);exit();
										foreach ($test_result->result() as $row) { ?>
											<?php if ($row->test_id && $row->test_type1 == 1) { ?>
												<tr class="ynvxmx">
													<td><?php echo $row->course_title; ?></td>
													<td><?php echo $row->points; ?>/<?php echo $row->total ?></td>
													<td><?php $p1 = $row->points;
														$t1 = $row->total;
														echo  round($p1 * 100 / $t1, 2) . "%"; ?></td>
													<td><a href="<?php echo base_url(); ?>index.php/welcome/result/<?php echo $row->test_id; ?>/<?php echo $row->course_id; ?>/<?php echo $row->prgram_id; ?>/<?php echo $row->test_type1; ?>" class="btn btn-success">Answer</a></td>
												</tr><?php } ?>
										<?php  } ?>
									</table>
								</div>
							  <?php } else {  ?>
								<form action="<?php echo base_url("index.php/Test/exam");?>" method="POST"
									class="form-horizontal">
									<?php $i=1; foreach($test_detail->result() as $row) { ?>

									<div class="row">
										<input type="hidden" name="test_type" id="test_type" value="1">
										<input type="hidden" name="program_id" value="<?php echo $program_id;?>">
										<input name="t<?php echo $i;?>" type="hidden" value="<?php echo $row->test_id;?>"> 
										<input name="q<?php echo $i;?>" type="hidden"	value="<?php echo $row->id;?>">	 					
										 <label for="name" class="col-sm-12 col-form-label">
											<?php echo $row->quations; ?><br>
										 </label>

										<?php if(!empty($row->option1)) {?>
										<div class="col-sm-3 col-md-3">
											<label class="custom-control custom-radio">
												<input id="radioStacked1" name="o<?php echo $i;?>"
													type="radio" value="<?php echo $row->option1; ?>"
													class="custom-control-input">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description">
													<?php echo $row->option1; ?>
												</span>
											</label>
										</div>
										<?php } ?>
										<?php if(!empty($row->option2)) {?>
										<div class="col-sm-3 col-md-3">
											<label class="custom-control custom-radio">
												<input id="radioStacked2" name="o<?php echo $i; ?>"
													type="radio" value="<?php echo $row->option2; ?>"
													class="custom-control-input">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description">
													<?php echo $row->option2; ?>
												</span>
											</label>
										</div>
										<?php } ?>
										<?php if(!empty($row->option3)) {?>
										<div class="col-sm-3 col-md-3">
											<label class="custom-control custom-radio">
												<input id="radioStacked2" name="o<?php echo $i; ?>"
													type="radio" value="<?php echo $row->option3; ?>"
													class="custom-control-input">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description">
													<?php echo $row->option3; ?>
												</span>
											</label>
										</div>
										<?php } ?>
										<?php if(!empty($row->option4)) {?>
										<div class="col-sm-3 col-md-3">
											<label class="custom-control custom-radio">
												<input id="radioStacked2" name="o<?php echo $i; ?>"
													type="radio" value="<?php echo $row->option4; ?>"
													class="custom-control-input">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description">
													<?php echo $row->option4; ?>
												</span>
											</label>
										</div>
										<?php } ?>

										<hr>
										<?php  $i++; } ?>
										<div class="form-group row">
											<div class="col-sm-8 offset-sm-3">
												<div class="media">
													<div class="media-left">
														<!--<a href="#" class="btn btn-success">Submit</a>-->

														<button type="submit"
															class="btn btn-success">Submit</button>

													</div>
												</div>
											</div>
										</div>
								</form>
								<?php } ?>
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
</div>
	</div>
	</div>

</body>

</html>