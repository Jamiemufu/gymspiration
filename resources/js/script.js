//declare consts
const myDropdown = document.getElementById('myDropdown');
const dropdown = document.getElementById('dropdown');
const admin = document.getElementById('admin');
const home = document.getElementById('home');
const reports = document.getElementById('reports');
const create = document.getElementById('create');
const edit = document.getElementById('edit');
const deleteUser = document.getElementById('delete');


dropdown.addEventListener("click", function(_e){
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

