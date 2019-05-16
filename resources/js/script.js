//declare consts
const myDropdown = document.getElementById('myDropdown');
const dropdown = document.getElementById('dropdown');
const admin = document.getElementById('admin');
const home = document.getElementById('home');
const reports = document.getElementById('reports');
const create = document.getElementById('create');
const view = document.getElementById('view');
const edit = document.getElementById('edit');
const deleteMember = document.getElementById('deleteMember');
const links = document.getElementsByTagName('a');
const sidebarToggleOpen = document.getElementById('toggle-open');
const sidebarToggleClose = document.getElementById('toggle-close');
const navItems = document.getElementsByClassName('nav-items');


//toggle mobile burger
sidebarToggleOpen.addEventListener("click", function(e) {
    document.getElementById("nav-container").style.width = "250px";
    document.getElementById("toggle-close").style.display = "block";
    document.getElementById("toggle-open").style.display = "none";

   // loop through nav items
    for (let i = 0; i < navItems.length; i++) {
       navItems[i].style.opacity = 1;
    }
    
});

//toggle close
sidebarToggleClose.addEventListener("click", function(e) {
    document.getElementById("nav-container").style.width = "50px";
    document.getElementById("toggle-open").style.display = "block";
    document.getElementById("toggle-close").style.display = "none";

     // loop through nav items
     for (let i = 0; i < navItems.length; i++) {
        navItems[i].style.opacity = 0;
     }
});
  

dropdown.addEventListener("click", function(_e) {
    //loop through all links and remove any with active
    for(let i = 0; i < links.length; i++)
    {
        links[i].classList.remove('active');
    }
    myDropdown.classList.toggle('show');
    dropdown.classList.toggle('active');
  });

showSideBarActive();

//toggles active class depending on url
function showSideBarActive() {
    if (window.location.href.indexOf("member") > -1) {
        myDropdown.classList.add('show');
        dropdown.classList.add('active');
    }
    else if (window.location.href.indexOf("report") > -1) {
        reports.classList.add('active');
    }
    else if (window.location.pathname == "/") {
        home.classList.add('active');
    }
    else if (window.location.pathname == "/admin") {
        admin.classList.add('active');
    }
}



