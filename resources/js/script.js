//declare consts
const myDropdown = document.getElementById("myDropdown");
const dropdown = document.getElementById("dropdown");
const admin = document.getElementById("admin");
const home = document.getElementById("home");
const reports = document.getElementById("reports");
const create = document.getElementById("create");
const view = document.getElementById("view");
const edit = document.getElementById("edit");
const deleteMember = document.getElementById("deleteMember");
const links = document.getElementsByTagName("a");
const sidebarToggleOpen = document.getElementById("toggle-open");
const sidebarToggleClose = document.getElementById("toggle-close");
const navItems = document.getElementsByClassName("nav-items");
const navContainer = document.getElementById("nav-container");
const li = document.getElementsByTagName("li");
const ul = document.getElementsByTagName("ul");
const nav = document.getElementsByClassName("nav");

// media query event handler
if (matchMedia) {
    const mq = window.matchMedia("(min-width: 600px)");
    mq.addListener(WidthChange);
    WidthChange(mq);
}

// media query change
function WidthChange(mq) {
    if (mq.matches) {
        // window width is at least 600px
        document.getElementById("nav-container").style.width = "250px";
        document.getElementById("toggle-close").style.display = "none";
        document.getElementById("toggle-open").style.display = "none";
        document.getElementById("")
        // loop through nav items
        var i = fullWidth();
    } else {
        // window width is under 600px
        document.getElementById("nav-container").style.width = "50px";
        document.getElementById("toggle-open").style.display = "block";
        document.getElementById("toggle-close").style.display = "none";
        // loop through nav items
        var i;
        ({ i, i } = minWidth(i));
    }
}
 //toggle open sidebar
 sidebarToggleOpen.addEventListener("click", function(e) {
    document.getElementById("nav-container").style.width = "250px";
    document.getElementById("toggle-close").style.display = "block";
    document.getElementById("toggle-open").style.display = "none";
    // loop through nav items
    var i = fullWidth();

});

    //toggle close
    sidebarToggleClose.addEventListener("click", function(e) {
    document.getElementById("nav-container").style.width = "50px";
    document.getElementById("toggle-open").style.display = "block";
    document.getElementById("toggle-close").style.display = "none";

    var i;
        ({ i, i } = minWidth(i));
    });

//if path is NOT /login

  dropdown.addEventListener("click", function(_e) {
    //loop through all links and remove any with active
    for (var i = 0; i < links.length; i++) {
        links[i].classList.remove("active");
    }
    myDropdown.classList.toggle("show");
    dropdown.classList.toggle("active");
    });


showSideBarActive();

function minWidth(i) {
    for (var i = 0; i < navItems.length; i++) {
        navItems[i].style.opacity = 0;
        navItems[i].style.width = "50px";
    }
    for (var i = 0; i < ul.length; i++) {
        ul[i].style.width = "50px";
    }
    for (var i = 0; i < li.length; i++) {
        li[i].style.width = "50px";
    }
    for (var i = 0; i < nav.length; i++) {
        nav[i].style.width = "50px";
    }
    return { i, i };
}

function fullWidth() {
    for (let i = 0; i < navItems.length; i++) {
        navItems[i].style.opacity = 1;
    }
    for (var i = 0; i < navItems.length; i++) {
        navItems[i].style.opacity = 1;
        navItems[i].style.width = "250px";
    }
    for (var i = 0; i < ul.length; i++) {
        ul[i].style.width = "250px";
    }
    for (var i = 0; i < li.length; i++) {
        li[i].style.width = "250px";
    }
    for (var i = 0; i < nav.length; i++) {
        nav[i].style.width = "250px";
    }
    return i;
}

//toggles active class depending on url
function showSideBarActive() {
    if (window.location.href.indexOf("member") > -1) {
        myDropdown.classList.add("show");
        dropdown.classList.add("active");
    } else if (window.location.href.indexOf("report") > -1) {
        reports.classList.add("active");
    } else if (window.location.pathname == "/") {
        home.classList.add("active");
    } else if (window.location.pathname == "/admin") {
        admin.classList.add("active");
    }
}
