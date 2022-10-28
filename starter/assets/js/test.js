// import {tasks} from './data.js';
console.log(tasks);

// console.log("hii") ;
// for(let i = 0; i < tasks.length; i++){
// console.log(tasks[i].title);
// console.log(tasks[i].type);
// console.log(tasks[i].status);
// console.log(tasks[i].priority);
// console.log(tasks[i].date);
// console.log(tasks[i].description);
// }
let title = document.getElementById("title");
let priority = document.getElementById("priority");
let description = document.getElementById("description");
let taskstatus = document.getElementById("status");
let date = document.getElementById("date");

const toDo = document.getElementById("to-do-tasks");

console.log(toDo);

const inProgress = document.getElementById("in-progress-tasks");

console.log(inProgress);

const done = document.getElementById("done-tasks");

console.log(done);

function afficher() {
  inProgress.innerHTML = "";
  done.innerHTML = "";
  toDo.innerHTML = "";
  for (let i = 0; i < tasks.length; i++) {
    if (tasks[i].status == "Done") {
      done.innerHTML += `<button class="card  d-flex flex-row justify-content-around align-items-center border-bottom border-muted p-2 border rounded-2 mb-2 cart shadow-sm" >
    <div class="">
    <i class="bi bi-check2-square fs-3"></i>
    </div>
    <div class="d-flex justify-content-around align-items-center">
        <div class="card-body text-start">
            <div class="card-title fs-5 "><strong> ${
              tasks[i].title
            } </strong></div>
            <div class="card-subtitle mb-2 text-muted">#1 created in  ${
              tasks[i].date
            }</div>
            <div class="card-text" title=" ${tasks[i].description}"> ${tasks[
        i
      ].description.substring(0, 40)}...</div>
        </div>
        <div class="d-flex flex-column align-content-center">
            <span class="btn  mb-1 text-white p-2 w-100 high" >High</span>
            <span class="btn btn-white bg-white p-2 border text-black w-100 bug">Feature</span>
        </div>
    </div>
    </button>`;
    } else if (tasks[i].status == "In Progress") {
      inProgress.innerHTML += `<button class="card  d-flex flex-row justify-content-around align-items-center border-bottom border-muted p-2 border rounded-2 mb-2 cart shadow-sm" >
    <div class="">
    <i class="spinner-border spinner-border-sm text-green me-1"></i>
    </div>
    <div class="d-flex justify-content-around align-items-center">
        <div class="card-body text-start">
            <div class="card-title fs-5 "><strong> ${
              tasks[i].title
            } </strong></div>
            <div class="card-subtitle mb-2 text-muted">#1 created in  ${
              tasks[i].date
            }</div>
            <div class="card-text" title=" ${tasks[i].description}" > ${tasks[
        i
      ].description.substring(0, 40)}...</div>
        </div>
        <div class="d-flex flex-column align-content-center">
            <span class="btn  mb-1 text-white p-2 w-100 high" >High</span>
            <span class="btn btn-white bg-white p-2 border text-black w-100 bug">Feature</span>
        </div>
    </div>
    </button>`;
    } else if (tasks[i].status == "To Do") {
      toDo.innerHTML += `<button class="card  d-flex flex-row justify-content-around align-items-center border-bottom border-muted p-2 border rounded-2 mb-2 cart shadow-sm" >
    <div class="">
        <i class="bi bi-question-circle fs-3"></i>
    </div>
    <div class="d-flex justify-content-around align-items-center">
        <div class="card-body text-start">
            <div class="card-title fs-5 "><strong> ${
              tasks[i].title
            } </strong></div>
            <div class="card-subtitle mb-2 text-muted">#1 created in  ${
              tasks[i].date
            }</div>
            <div class="card-text" title=" ${tasks[i].description}" > ${tasks[
        i
      ].description.substring(0, 40)}...</div>
        </div>
        <div class="d-flex flex-column align-content-center">
            <span class="btn  mb-1 text-white p-2 w-100 high" >High</span>
            <span class="btn btn-white bg-white p-2 border text-black w-100 bug">Feature</span>
        </div>
    </div>
    </button>`;
    }
  }
}

afficher();

const form = document.getElementById("first"); //call our form with the id assigned to it
form.addEventListener("submit", saveTask);

function createTask() {
  // initialiser task form
  // Afficher le boutton save
  // Ouvrir modal form
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
function saveTask(event) {
  event.preventDefault();
  // prevent reloading the page
  // Recuperer task attributes a partir les champs input
  //call callbackFunction when submit button is clicked
  //  const myFormData = new FormData(event.target);//
  //  const formDataObj = {};//data objet
  //  myFormData.forEach((value, key) => (formDataObj[key] = value));     //loop to fill the object formData with the right values
  // Créez task object
  let formDataObj = {
    id: tasks.length + 1,
    title: title.value,
    type: radiocheck().value,
    priority: priority.value,
    status: taskstatus.value,
    date: date.value,
    description: description.value,
  };
  // Ajoutez object au Array
  tasks.push(formDataObj); //add the new formData to array tasks
  // refresh tasks
  //  document.forms[0].reset();//to clean the form for the next entries
  //   // backtext
  $("#Modal").modal("hide");
  Swal.fire("Good job!", "You clicked the button!", "success");
  console.log(tasks);
  afficher();
}

function editTask(index) {
  // Initialisez task form
  // Affichez updates
  // Delete Button
  // Définir l’index en entrée cachée pour l’utiliser en Update et Delete
  // Definir FORM INPUTS
  // Ouvrir Modal form
}

function updateTask() {
  // GET TASK ATTRIBUTES FROM INPUTS
  // Créez task object
  // Remplacer ancienne task par nouvelle task
  // Fermer Modal form
  // Refresh tasks
}

function deleteTask() {
  // Get index of task in the array
  // Remove task from array by index splice function
  // close modal form
  // refresh tasks
}

function initTaskForm() {
  // Clear task form from data
  // Hide all action buttons
}

function reloadTasks() {
  // Remove tasks elements
  // Set Task count
}

// let only work in a specifique scop not like var that's the difference between this two.
// array is an object.
// object has no index so we can't acces it data with a loop. 
// querySelector fetch the first element that has the same name or id or class.
// document.createlement()/classname.classList.add/.append(classname)/classname.style.backgroundColor=""/.setAttribute('','')


function dragitem(){
  let items=document.querySelectorAll('.card');
  items.forEach(item=>{
        item.addEventListener('dragstart',function(){
          drag=item;
          item.style.opacity='0.5';
        })
        item.addEventListener('dragend', function(){
          drag=null;
          item.style.opacity='0.5';
        })
  })
}
