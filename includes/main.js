var modal = document.getElementById("modal")

var img_Modify = document.getElementById("img_Modify")
var acc_Modify = document.getElementById("acc_Modify")
var Name_Modify = document.getElementById("Name_Modify")
var Lastname_modify = document.getElementById("Lastname_modify")
var Age_modify = document.getElementById("Age_modify")
var Email_modify = document.getElementById("Email_modify")
var City_modify = document.getElementById("City_modify")
var City_modify = document.getElementById("Pwd_modify")
var City_modify = document.getElementById("City_modify")
var Tel_modify = document.getElementById("Tel_modify")


function openModal(){
  modal.style.top = "0px";
}

function openimg_Modify(){
  img_Modify.style.top = "0px";
}

function openacc_Modify(){
  acc_Modify.style.top = "0px";
}

function openName_modify(){
  Name_modify.style.top = "0px";
}

function openLastname_modify(){
  Lastname_modify.style.top = "0px";
}

function openAge_modify(){
  Age_modify.style.top = "0px";
}

function openEmail_modify(){
  Email_modify.style.top = "0px";
}

function openPwd_modify(){
  Pwd_modify.style.top = "0px";
}

function openCity_modify(){
  City_modify.style.top = "0px";
}

function openTel_modify(){
  Tel_modify.style.top = "0px";
}

var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function register(){
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px";
}
function login(){
  x.style.left = "50px";
  y.style.left = "450px";
  z.style.left = "0px";
}

function modify(){
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px";
}

var exampleDropdown = new Dropdown('#example-dropdown');

// With options
var exampleDropdown = new Dropdown('#example-dropdown', {
  animationType: 'fade'
});

var exampleSidenav = new Sidenav('#example-sidenav');

// With options
var exampleSidenav = new Sidenav('#example-sidenav', {
  bodyScrolling: true,
  animationDelay: 500
});

var collapsible = new Collapsible('#example-collapsible', {
  animationDelay: 400,
  sidenav: {
    activeWhenOpen: false
  }
});