var btn = document.getElementById("button");
const toDo = document.getElementById("to-do-tasks");
const inProgress = document.getElementById("in-progress-tasks");
const done = document.getElementById("done-tasks");
const form = document.getElementById("first"); //call our form with the id assigned to it
const addTask = document.getElementById("addTask-div");
addTask.innerHTML = `<button id="addTask" type="submit" class="btn high text-white p-2 rounded-4 " onclick="createTask()"><i class="bi bi-plus" ></i> Add Task</button>
`;
form.addEventListener("submit", saveTask);

function deletement(id){
  if(confirm("Are you sure you want to Delete?")){
       window.location.href='./php/delete.php?id='+id;
  }
} 

function createTask() {
  // initialiser task form
  initTaskForm();
  // Afficher le boutton save
  document.getElementById("hidden").innerHTML=``;
  btn.innerHTML = `<button type="button" class="btn bug shadow-sm" data-dismiss="modal">Close</button>
    <button type="submit" name="save" id="hide" class="btn high shadow-sm " >Save changes</button>`;
  // Ouvrir modal form
  $("#Modal").modal("show");
}

function saveTask() {

  $("#Modal").modal("hide");
  Swal.fire("Good job!", "You clicked the button!", "success");
  // initTaskForm();
}

function editTask(id,title,date,description,priority,type,status) {

  console.log(id+"  "+title+"  "+date+"  "+description+"   "+priority+"   "+type+"   "+status);
  document.getElementById("title").value = title;
  if ( type=== "2") {
    document.getElementById("bug").checked = true;
  } else {
    document.getElementById("feature").checked = true;
  }
  document.getElementById("priority").value = priority;
  document.getElementById("status").value =status;
  document.getElementById("date").value = date;
  document.getElementById("description").value = description;
  document.getElementById("hidden").innerHTML=`<input type="hidden" name="id" value="${id}">`;
  // // Définir l’index en entrée cachée pour l’utiliser en Update et Delete
  // Definir FORM INPUTS
  btn.innerHTML = `<button type="button" class="btn bug shadow-sm" data-dismiss="modal">Close</button>
  <button type="submit" name="update" onClick="updateTask()" id="update" class="btn high shadow-sm " >Update</button>`;
  // Ouvrir Modal form
  $("#Modal").modal("show");
}

function updateTask() {
  // Fermer Modal form
  $("#Modal").modal("hide");
  Swal.fire("Good job!", "You clicked the button!", "success");
  // Refresh tasks
  // afficher();
}

function deleteTask(i) {
  // Get index of task in the array
  alert ("This is an alert dialog box");  
  // Remove task from array by index splice function
  tasks.splice(i, 1);
  Swal.fire(
    'Delete!', 
    'You re task is deleted successfully !',
    'success'
    );
  // refresh tasks
  afficher();
}

function initTaskForm() {
  // Clear task form from data
  document.forms[0].reset();
  // Hide all action buttons
}



  // console.log(event.target);
  // let title = event.target.getAttribute("title") ;
  // let description = event.target.getAttribute("description") ; 
  // let priority = event.target.getAttribute("priority") ; 
  // let type = event.target.getAttribute("type") ; 
  // let status = event.target.getAttribute("status") ; 
  // let date = event.target.getAttribute("date") ; 
  // let id = event.target.getAttribute("task_id") ; 