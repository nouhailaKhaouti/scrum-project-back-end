
     <div class="modal shadow-sm" id="ModalUp<?php echo $row->task_id?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header high">
								<h5 class="modal-title" id="ModalLabel">Update task</h5>
								<button type="button" class="close high" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body modal_body" id="update">
								<form action="./php/update_task.php" method="POST" id="first" class="d-block fw-bold">
								    <input type="hidden" name="task_id" value="<?=$row->task_id?>"/>
									<label for="titre" class="d-block">titre:</label>
									<input class="form-control input-sm m-1 cart shadow-sm" type="text" name="title" id="title" value="<?=$row->task_title?>" required>
									</br>
									<label for="type" class="d-block">type:</label>
									<?php 
									while($res=$type->fetch_object()){
									  echo '
									  <div class="form-check">
										  <input class="form-check-input mx-2 cart shadow-sm" type="radio" name="type" id="'.$res->type_label.'" value="'.$res->type_id.'" selected>
										  <label class="form-check-label">'.$res->type_label.'</label>
									  </div>
									  </br>';
									  }
									?>	
									
									<label for="propriete" class="d-block">propriete:</label>
									<select class="form-select form-select-sm m-1 cart shadow-sm" name="priority" id="priority">
									<?php
									while($res=$priority->fetch_object()){
									echo '
										<option value="'.$res->priority_id.'">'.$res->priority_label.'</option>
										';
								    }?>
									</select>
									</br>
									<label for="status" class="d-block">status:</label>
									<select class="form-select form-select-sm m-1 cart shadow-sm" name="status" id="status" required>
									<?php
									while($res=$status->fetch_object()){
									echo '
										<option value="'.$res->status_id.'">'.$res->status_label.'</option>
										';
								  }?>
									</select>
									</br>
									<label for="date" class="d-block">date:</label>
									<input class="form-control input-sm m-1 cart shadow-sm" type="date" name="date" id="date" value="<?=$row->task_date?>" >
									</br>
									<label for="description" class="d-block">description:</label>
									<textarea class="form-control m-1 cart shadow-sm" id="description" name="description" rows="5" cols="33" value="<?=$row->task_description?>">description...</textarea>
									<div class="modal-footer modal_body" id="button">
										<button type="button" class="btn bug shadow-sm" data-dismiss="modal">Close</button>
										<button type="submit" id="hide" class="btn high shadow-sm ">Save changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>