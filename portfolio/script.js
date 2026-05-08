document.addEventListener("DOMContentLoaded", function(){

// Dynamic Projects
const projects = [
{
title:"Food Delivery",
desc:"C# food ordering system",
img:"FoodDelivery.jpg"
},
{
title:"Graphics Project",
desc:"Marine Drive simulation",
img:"Graphics.jpg"
},
{
title:"Hotel Management",
desc:"Java system",
img:"Hotelmanagment.png"
}
];

const container = document.getElementById("projectsContainer");

if(container){
projects.forEach(p=>{
const card = `
<div class="project-card">
<img src="${p.img}" alt="${p.title}">
<h3>${p.title}</h3>
<p>${p.desc}</p>
<a href="#">View</a>
</div>
`;
container.innerHTML += card;
});
}


// Form Validation
const form = document.getElementById("contactForm");

if(form){
form.addEventListener("submit", function(e){
e.preventDefault();

let name = document.getElementById("name").value.trim();
let email = document.getElementById("email").value.trim();
let subject = document.getElementById("subject").value.trim();
let message = document.getElementById("message").value.trim();

let error = "";

if(!name || !email || !subject || !message){
error = "All fields are required!";
}
else if(!email.includes("@")){
error = "Enter a valid email!";
}

document.getElementById("errorMsg").innerText = error;

if(error===""){
alert("Message sent successfully!");
form.reset();
}
});
}


// Dark Mode
const toggle = document.getElementById("themeToggle");

if(toggle){
toggle.onclick = ()=>{
document.body.classList.toggle("dark-mode");

localStorage.setItem("theme",
document.body.classList.contains("dark-mode"));
};
}

// Load saved theme
if(localStorage.getItem("theme")==="true"){
document.body.classList.add("dark-mode");
}


// Scroll to top
const topBtn = document.getElementById("topBtn");

if(topBtn){
window.addEventListener("scroll", ()=>{
topBtn.style.display = window.scrollY > 200 ? "block" : "none";
});

topBtn.onclick = ()=>{
window.scrollTo({top:0, behavior:"smooth"});
};
}

});