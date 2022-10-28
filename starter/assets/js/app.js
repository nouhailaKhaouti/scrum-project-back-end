var btn = document.getElementById("button");
const toDo = document.getElementById("to-do-tasks");
const inProgress = document.getElementById("in-progress-tasks");
const done = document.getElementById("done-tasks");
const form = document.getElementById("first"); //call our form with the id assigned to it
const addTask = document.getElementById("addTask-div");
addTask.innerHTML = `<button id="addTask" type="submit" class="btn high text-white p-2 rounded-4 " onclick="createTask()"><i class="bi bi-plus" ></i> Add Task</button>
`;
// form.addEventListener("submit", saveTask);
// afficher();

function clear() {
  inProgress.innerHTML = "";
  done.innerHTML = "";
  toDo.innerHTML = "";
}

function afficher() {
  clear();
  let todocount = 0,
    inprogresscount = 0,
    donecount = 0;
  for (let i = 0; i < tasks.length; i++) {
    if (tasks[i].status == "Done") {
      donecount++;
      done.innerHTML += `<button class="card  d-flex flex-row justify-content-around align-items-center border-bottom border-muted p-2 border rounded-2 mb-2 cart shadow-sm" >
    <div class="col-1">
    <i class="bi bi-check2-square fs-3"></i>
    </div>
    <div class="col-11 d-flex justify-content-around align-items-center">
        <div class=" col-9 card-body text-start">
            <div class="card-title fs-5 "><strong> ${
              tasks[i].title
            } </strong></div>
            <div class="card-subtitle mb-2 text-muted">#${i + 1} created in  ${
        tasks[i].date
      }</div>
            <div class="card-text" title=" ${tasks[i].description}"> ${tasks[
        i
      ].description.substring(0, 40)}...</div>
            <div>
            <i class="bi bi-trash text-danger  me-1" onclick="deleteTask(${i})"></i>
            <i class="bi bi-pen text-yelow me-1"  onclick="editTask(${i})"></i>
            </div>
        </div>
        <div class="col-3 d-flex flex-column align-content-center">
            <span class="btn  mb-1 text-white p-2 w-100 high" >${
              tasks[i].priority
            }</span>
            <span class="btn btn-white bg-white p-2 border text-black w-100 bug">${
              tasks[i].type
            }</span>
        </div>
    </div>
    </button>`;
    } else if (tasks[i].status == "In Progress") {
      inprogresscount++;
      inProgress.innerHTML += `<button class="card  d-flex flex-row justify-content-around align-items-center border-bottom border-muted p-2 border rounded-2 mb-2 cart shadow-sm" >
    <div class="col-1">
    <i class="spinner-border spinner-border-sm text-green me-1"></i>
    </div>
    <div class="col-11 d-flex justify-content-around align-items-center">
        <div class="col-9 card-body text-start">
            <div class="card-title fs-5 "><strong> ${
              tasks[i].title
            } </strong></div>
            <div class="card-subtitle mb-2 text-muted">#${i + 1} created in  ${
        tasks[i].date
      }</div>
            <div class="card-text" title=" ${tasks[i].description}" > ${tasks[
        i
      ].description.substring(0, 40)}...</div>
            <div>
            <i class="bi bi-trash text-danger me-1" onclick="deleteTask(${i})"></i>
            <i class="bi bi-pen text-yelow me-1"  onclick="editTask(${i})"></i>
            </div>
        </div>
        <div class="col-3 d-flex flex-column align-content-center">
        <span class="btn  mb-1 text-white p-2 w-100 high" >${
          tasks[i].priority
        }</span>
        <span class="btn btn-white bg-white p-2 border text-black w-100 bug">${
          tasks[i].type
        }</span>
        </div>
    </div>
    </button>`;
    } else if (tasks[i].status == "To Do") {
      todocount++;
      toDo.innerHTML += `<button class="card  d-flex flex-row justify-content-around align-items-center border-bottom border-muted p-2 border rounded-2 mb-2 cart shadow-sm" >
    <div class="col-1">
        <i class="bi bi-question-circle fs-3"></i>
    </div>
    <div class="col-11 d-flex justify-content-around align-items-center">
        <div class="col-9 card-body text-start">
            <div class="card-title fs-5 "><strong> ${
              tasks[i].title
            } </strong></div>
            <div class="card-subtitle mb-2 text-muted">#${i + 1} created in  ${
        tasks[i].date
      }</div>
            <div class="card-text" title=" ${tasks[i].description}" > ${tasks[
        i
      ].description.substring(0, 40)}...</div>
            <div>
            <i class="bi bi-trash text-danger me-1" onclick="deleteTask(${i})"></i>
            <i class="bi bi-pen text-yelow me-1"  onclick="editTask(${i})"></i>
            </div>
        </div>
        <div class="col-3 d-flex flex-column align-content-center">
        <span class="btn  mb-1 text-white p-2 w-100 high" >${
          tasks[i].priority
        }</span>
        <span class="btn btn-white bg-white p-2 border text-black w-100 bug">${
          tasks[i].type
        }</span>
        </div>
    </div>
    </button>`;
    }
  }
  document.getElementById("to-do-tasks-count").innerHTML = `${todocount}`;
  document.getElementById(
    "in-progress-tasks-count"
  ).innerHTML = `${inprogresscount}`;
  document.getElementById("done-tasks-count").innerHTML = `${donecount}`;
}

function createTask() {
  // initialiser task form
  initTaskForm();
  // Afficher le boutton save
  btn.innerHTML = `<button type="button" class="btn bug shadow-sm" data-dismiss="modal">Close</button>
    <button type="submit" id="hide" class="btn high shadow-sm " >Save changes</button>`;
  // Ouvrir modal form
  $("#Modal").modal("show");
}

function saveTask(event) {
  event.preventDefault();
  // prevent reloading the page
  // Recuperer task attributes a partir les champs input
  // Créez task object
  let formDataObj = {
    // id            :   tasks.length+1,
    title: document.getElementById("title").value,
    type: radiocheck().value,
    priority: document.getElementById("priority").value,
    status: document.getElementById("status").value,
    date: document.getElementById("date").value,
    description: document.getElementById("description").value,
  };
  // Ajoutez object au Array
  tasks.push(formDataObj); //add the new formData to array tasks
  // refresh tasks
  $("#Modal").modal("hide");
  Swal.fire("Good job!", "You clicked the button!", "success");
  initTaskForm();
  afficher();
}

function editTask(i) {
  // // Initialisez task form
  // // Affichez updates
  // document.getElementById("title").value = tasks[i].title;
  // if (tasks[i].type === "Bug") {
  //   document.getElementById("bug").checked = true;
  // } else {
  //   document.getElementById("feature").checked = true;
  // }
  // document.getElementById("priority").value = tasks[i].priority;
  // document.getElementById("status").value = tasks[i].status;
  // document.getElementById("date").value = tasks[i].date;
  // document.getElementById("description").value = tasks[i].description;
  // // Définir l’index en entrée cachée pour l’utiliser en Update et Delete
  // let btn = document.getElementById("button");
  document.getElementById('update').innerHTML = `<input type="hidden" name='id' id='id' value="${i}"/>`;
  // Definir FORM INPUTS
  // Ouvrir Modal form
  $("#Modal").modal("show");
}

function updateTask(i) {
  console.log("update" + i);
  // GET TASK ATTRIBUTES FROM INPUTS
  // Créez task object
  let formDataObj = {
    title: document.getElementById("title").value,
    type: radiocheck().value,
    priority: document.getElementById("priority").value,
    status: document.getElementById("status").value,
    date: document.getElementById("date").value,
    description: document.getElementById("description").value,
  };
  // Remplacer ancienne task par nouvelle task

  tasks[i] = formDataObj;
  // Fermer Modal form
  $("#Modal").modal("hide");
  Swal.fire("Good job!", "You clicked the button!", "success");
  // Refresh tasks
  afficher();
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

function radiocheck() {
  var ele = document.getElementsByName("type");
  var result;
  for (i = 0; i < ele.length; i++) {
    if (ele[i].checked) {
      result = ele[i];
      break;
    }
  }
  return result;
}
