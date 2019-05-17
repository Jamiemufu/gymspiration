/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

//declare consts
var myDropdown = document.getElementById("myDropdown");
var dropdown = document.getElementById("dropdown");
var admin = document.getElementById("admin");
var home = document.getElementById("home");
var reports = document.getElementById("reports");
var create = document.getElementById("create");
var view = document.getElementById("view");
var edit = document.getElementById("edit");
var deleteMember = document.getElementById("deleteMember");
var links = document.getElementsByTagName("a");
var sidebarToggleOpen = document.getElementById("toggle-open");
var sidebarToggleClose = document.getElementById("toggle-close");
var navItems = document.getElementsByClassName("nav-items"); // media query event handler

if (matchMedia) {
  var mq = window.matchMedia("(min-width: 600px)");
  mq.addListener(WidthChange);
  WidthChange(mq);
} // media query change


function WidthChange(mq) {
  if (mq.matches) {
    // window width is at least 600px
    document.getElementById("nav-container").style.width = "250px";
    document.getElementById("toggle-close").style.display = "none";
    document.getElementById("toggle-open").style.display = "none"; // loop through nav items

    for (var i = 0; i < navItems.length; i++) {
      navItems[i].style.opacity = 1;
    }
  } else {
    document.getElementById("nav-container").style.width = "50px";
    document.getElementById("toggle-open").style.display = "block";
    document.getElementById("toggle-close").style.display = "none"; // loop through nav items

    for (var _i = 0; _i < navItems.length; _i++) {
      navItems[_i].style.opacity = 0;
    }
  }
} //toggle open sidebar


sidebarToggleOpen.addEventListener("click", function (e) {
  document.getElementById("nav-container").style.width = "250px";
  document.getElementById("toggle-close").style.display = "block";
  document.getElementById("toggle-open").style.display = "none"; // loop through nav items to add opacity

  for (var i = 0; i < navItems.length; i++) {
    navItems[i].style.opacity = 1;
  }
}); //toggle close

sidebarToggleClose.addEventListener("click", function (e) {
  document.getElementById("nav-container").style.width = "50px";
  document.getElementById("toggle-open").style.display = "block";
  document.getElementById("toggle-close").style.display = "none"; // loop through nav items

  for (var i = 0; i < navItems.length; i++) {
    navItems[i].style.opacity = 0;
  }
});
dropdown.addEventListener("click", function (_e) {
  //loop through all links and remove any with active
  for (var i = 0; i < links.length; i++) {
    links[i].classList.remove("active");
  }

  myDropdown.classList.toggle("show");
  dropdown.classList.toggle("active");
});
showSideBarActive(); //toggles active class depending on url

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

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/script.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Web_Dev\gym\resources\js\script.js */"./resources/js/script.js");


/***/ })

/******/ });