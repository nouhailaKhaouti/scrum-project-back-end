<?php
require "./php/connect.php";

include "./php/display.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css"> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script> -->
	<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- ================== END core-css ================== -->
</head>

<body>

	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">

			<div class="d-flex flex-wrap justify-content-between p-4">
				<div>
					<ol class="d-flex list-unstyled">
						<li class="fs-4"><a href="javascript:;">Home</a>/</li>
						<li class="fs-4">Scrum Board </li>
					</ol>
					<!-- BEGIN page-header -->
					<h1 class="page-header">
						<strong>Scrum Board</strong>
					</h1>
					<!-- END page-header -->
				</div>
				<div id="addTask-div">
					<button id="addTask" type="submit" class="btn high text-white p-2 rounded-4 "><i class="bi bi-plus"></i> Add Task</button>
</br>
				</div>
				<div class="modal shadow-sm" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header high">
								<h5 class="modal-title" id="ModalLabel">Add task</h5>
								<button type="button" class="close high" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body modal_body">
								<form action="./php/add.php" method="POST" id="first" class="d-block fw-bold">
									<div id="hidden"></div>
									<label for="titre" class="d-block">titre:</label>
									<input class="form-control input-sm m-1 cart shadow-sm" type="text" name="title" id="title" value="title" required>
                                    </br>
									<p class="text-danger"><?php echo $titleErr;?></p>
									<label for="type" class="d-block">type:</label>
									<?php
									while ($row = $type->fetch_object()) {
										echo '
									<div class="form-check">
										<input class="form-check-input mx-2 cart shadow-sm" type="radio" name="type" id="' . $row->type_label . '" value="' . $row->type_id . '" selected>
										<label class="form-check-label">' . $row->type_label . '</label>
									</div>';
									}
									?>
									<p class="text-danger"><?php echo $typeErr;?></p>
								</br>
									<label for="propriete" class="d-block">propriete:</label>
									<select class="form-select form-select-sm m-1 cart shadow-sm" name="priority" id="priority">
										<?php
										while ($row = $priority->fetch_object()) {
											echo '
										<option value="' . $row->priority_id . '">' . $row->priority_label . '</option>
										';
										}
										?>
									</select>
									</br>
									<label for="status" class="d-block">status:</label>
									<select class="form-select form-select-sm m-1 cart shadow-sm" name="status" id="status" required>
										<?php
										while ($row = $status->fetch_object()) {
											echo '
										<option value="' . $row->status_id . '">' . $row->status_label . '</option>
										';
										}
										?>
									</select>
									<span class="text-danger"><?php echo $statusErr;?></span>
                                    </br>
									<label for="date" class="d-block">date:</label>
									<input class="form-control input-sm m-1 cart shadow-sm" type="date" name="date" id="date">
									</br>
									<label for="description" class="d-block">description:</label>
									<textarea class="form-control m-1 cart shadow-sm" id="description" name="description" rows="5" cols="33">description...</textarea>
									<div class="modal-footer modal_body" id="button">
										<button type="button" class="btn bug shadow-sm" data-dismiss="modal">Close</button>
										<button type="submit" name="save" id="hide" class="btn high shadow-sm ">Save changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-green alert-dismissible fade show">
                        <strong>Success!</strong>
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                    </div>
            <?php endif ?>
			<div class="d-flex flex-wrap justify-content-around  ">
				<div class="container-fluid mt-5 col-lg-4 col-md-6">
					<div class="card-header" style="background-color:#C1CE8E;">
						<h4 class="center"><strong>To do (<span id="to-do-tasks-count"></span>)</strong></h4>
						<!--  -->
					</div>
					<div class="box container list-group list-group-flush p-2 rounded-2 h-90" style="background-color:#E6EEC7;" id="to-do-tasks">
						<!-- TO DO TASKS HERE -->
						<?php
						display("To_Do");
					
						?>
						<!-- data-toggle="modal" data-target="#ModalUp'.$row->a->task_id.'" -->
					</div>
				</div>

				<div class="container-fluid mt-5 col-lg-4 col-md-6 ">
					<div class="card-header" style="background-color:#DBE3B5;">
						<h4 class="center"><strong>In Progress (<span id="in-progress-tasks-count"></span>)</strong></h4>
					</div>
					<div class="box contenaire container list-group list-group-flush p-2 rounded-2 border h-90" id="in-progress-tasks" style="background-color:#E7EADA;">
						<!-- IN PROGRESS TASKS HERE -->
						<?php
						display("In_Progress");
						?>
					</div>
				</div>

				<div class="container-fluid mt-5 col-lg-4 col-md-6">
					<div class="card-header" style="background-color:#DFE8CC;">
						<h4 class="center"> <strong> Done (<span id="done-tasks-count"></span>) </strong></h4>

					</div>
					<div  class="box contenaire container list-group list-group-flush p-2 rounded-2 h-90" id="done-tasks" style="background-color:#E9ECE1;">
						<!-- DONE TASKS HERE -->
						<?php
						display("Done");
						?>
					</div>
				</div>
			</div>
			</br>
			<a href="./php/deleteMulti.php"><button type="submit" class="btn btn-danger text-white p-2 rounded-4 "> Delete All Task</button></a>
		</div>
		<!-- END #content -->
		
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->

	<!-- TASK MODAL -->
	<div class="modal fade" id="modal-task">
		<!-- Modal content goes here -->
	</div>

	<!-- update -->


	<!-- ================== BEGIN core-js ================== -->

	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/data.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- Popper.js, then Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- ================== END core-js ================== -->
</body>

</html>