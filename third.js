
const navLinks = document.getElementById('navlinks');
let firstName = document.getElementById("first-name");
let lastName = document.getElementById("last-name");
let email = document.getElementById("email");
let phone = document.getElementById("phone");
let address = document.getElementById("address");
let password = document.getElementById("password");
let loginEmail = document.getElementById("login-email");
let loginPassword = document.getElementById("login-password");



let users= [];
let registeredUsers = JSON.parse(localStorage.getItem('usersData'));
let loggedInUser =  JSON.parse(localStorage.getItem('loggedInUser'))||"";
if(loggedInUser==""){
  document.getElementById('login-btn').innerHTML="<a href='login.html'>LOGIN</a>"
}else{
  document.getElementById('login-btn').innerHTML=`<span onclick="logOut()">${loggedInUser.firstName + " " + loggedInUser.lastName} (Log Out)</span>`
}


if(registeredUsers==null){
  console.log('registeredUsers null');
}else{
  registeredUsers.forEach(user => {
    users.push(user);
  });
}


const signUp=(event)=>{
  event.preventDefault();
  let signUpData={
    'firstName': firstName.value,
    'lastName':lastName.value,
    'email': email.value,
    'phone': phone.value,
    'address': address.value,
    'password': password.value
  }
  users.push(signUpData);
  localStorage.setItem('usersData',JSON.stringify(users));
  alert('User added successfully');
  window.location.reload();
  return true;
}



const login =(event)=>{
  event.preventDefault();
  let loginInputEmail=loginEmail.value;
  let loginInputPass=loginPassword.value;
  if(users.length > 0){
    users.forEach(user=>{
      if(user.email==loginInputEmail && user.password==loginInputPass){
        alert('logged in successfully');
        localStorage.setItem('loggedInUser',JSON.stringify(user));
        window.location.reload();
      }else{
        
      }
    })
  }else{
    alert('Login failed! USER NOT FOUND');
  }
}



const logOut = () =>{
  localStorage.removeItem('loggedInUser');
  window.location.reload();
}



function showMenu(){
  navLinks.style.right = "0px";
  
}
function hideMenu(){
  navLinks.style.right = "-200px";
}

