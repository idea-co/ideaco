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

/***/ "./resources/js/elements/faq.js":
/*!**************************************!*\
  !*** ./resources/js/elements/faq.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  //listens to the click event of the question tabs then close and open the tabs 
  $(document).on("click", ".block__section2__cont__question", function () {
    if ($(this).hasClass("block__section2__cont__question--active")) {
      $(".block__section2__cont__question--active .block__section2__cont__question__header .block__section2__cont__question__header__btn").toggleClass("block__section2__cont__question__header__btn--active");
      $(this).toggleClass("block__section2__cont__question--active");
    } else {
      $(".block__section2__cont__question--active .block__section2__cont__question__header .block__section2__cont__question__header__btn").toggleClass("block__section2__cont__question__header__btn--active");
      $(".block__section2__cont__question--active").toggleClass("block__section2__cont__question--active");
      $(this).toggleClass("block__section2__cont__question--active");
      $(".block__section2__cont__question--active .block__section2__cont__question__header .block__section2__cont__question__header__btn").toggleClass("block__section2__cont__question__header__btn--active");
    }
  });
});

/***/ }),

/***/ "./resources/js/elements/home.js":
/*!***************************************!*\
  !*** ./resources/js/elements/home.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

current_slide = 1; //initial slide position
//listen to click events on slide arrow and trigger the next slide

$(document).on("click", ".block__section4__cont__slider .left_arrow .fa-arrow-left", function () {
  minusSlides();
}); //listen to click events on slide arrow and trigger the next slide

$(document).on("click", ".block__section4__cont__slider .right_arrow .fa-arrow-right", function () {
  plusSlides();
}); //calls the next slide 

var plusSlides = function plusSlides() {
  if (current_slide < 5 && current_slide > 0) {
    document.querySelector(".slider".concat(current_slide)).style.right = "100%";
    document.querySelector(".slider".concat(current_slide + 1)).style.right = "0%";
    var present_slide = document.querySelector(".slide_icon".concat(current_slide));
    var prev_slide = document.querySelector(".slide_icon".concat(current_slide - 1));
    var next_slide = document.querySelector(".slide_icon".concat(current_slide + 1));
    document.querySelector('.block__section4 ul').style.textAlign = 'left';
    next_slide.style.display = 'none';
    present_slide.style.background = '#6626EE';
    present_slide.style.display = 'inline-block';
    present_slide.style.width = '32px';
    prev_slide.style.background = '#fff';
    setTimeout(function () {
      document.querySelector('.block__section4 ul').style.textAlign = 'right';
      present_slide.style.width = '10px';
    }, 200);
    setTimeout(function () {
      prev_slide.style.display = 'inline-block';
      present_slide.style.display = 'none';
      next_slide.style.display = 'inline-block';
      next_slide.style.background = '#6626EE';
    }, 300);
    current_slide += 1;
  }
}; //calls the previous slide


var minusSlides = function minusSlides() {
  if (current_slide <= 5 && current_slide > 1) {
    document.querySelector(".slider".concat(current_slide)).style.right = "-100%";
    document.querySelector(".slider".concat(current_slide - 1)).style.right = "0%";
    var present_slide = document.querySelector(".slide_icon".concat(current_slide));
    var prev_slide = document.querySelector(".slide_icon".concat(current_slide - 1));
    var next_slide = document.querySelector(".slide_icon".concat(current_slide + 1));
    var x_prev_slide = document.querySelector(".slide_icon".concat(current_slide - 2));
    document.querySelector('.block__section4 ul').style.textAlign = 'right';
    document.querySelector(".slide_icon".concat(current_slide - 2)).style.display = 'none';
    present_slide.style.width = '32px';
    setTimeout(function () {
      document.querySelector('.block__section4 ul').style.textAlign = 'left';
      present_slide.style.width = '10px';
      prev_slide.style.background = '#6626EE';
      x_prev_slide.style.background = '#6626EE';
    }, 200);
    setTimeout(function () {
      x_prev_slide.style.display = 'none';
      prev_slide.style.display = 'inline-block';
      present_slide.style.background = '#fff';
    }, 300);
    current_slide -= 1;
  }
};

function swipedetect(el, callback) {
  var touchsurface = el,
      swipedir,
      startX,
      startY,
      distX,
      distY,
      threshold = 50,
      //required min distance traveled to be considered swipe
  restraint = 50,
      // maximum distance allowed at the same time in perpendicular direction
  allowedTime = 500,
      // maximum time allowed to travel that distance
  elapsedTime,
      startTime,
      handleswipe = callback || function (swipedir) {};

  touchsurface.addEventListener('touchstart', function (e) {
    var touchobj = e.changedTouches[0];
    swipedir = 'none';
    dist = 0;
    startX = touchobj.pageX;
    startY = touchobj.pageY;
    startTime = new Date().getTime(); // record time when finger first makes contact with surface

    e.preventDefault();
  }, false);
  touchsurface.addEventListener('touchmove', function (e) {// prevent scrolling when inside DIV
  }, false);
  touchsurface.addEventListener('touchend', function (e) {
    var touchobj = e.changedTouches[0];
    distX = touchobj.pageX - startX; // get horizontal dist traveled by finger while in contact with surface

    distY = touchobj.pageY - startY; // get vertical dist traveled by finger while in contact with surface

    elapsedTime = new Date().getTime() - startTime; // get time elapsed

    if (elapsedTime <= allowedTime) {
      // first condition for awipe met
      if (Math.abs(distX) >= threshold && Math.abs(distY) <= restraint) {
        // 2nd condition for horizontal swipe met
        swipedir = distX < 0 ? 'left' : 'right'; // if dist traveled is negative, it indicates left swipe
      }
    }

    handleswipe(swipedir);
    e.preventDefault();
  }, false);
} //USAGE:


var el = document.querySelector('.block__section4__cont__slider .slider_cont');
swipedetect(el, function (swipedir) {
  if (swipedir == 'left') {
    plusSlides();
  } else if (swipedir == 'right') {
    minusSlides();
  }
});

/***/ }),

/***/ "./resources/js/elements/nav.js":
/*!**************************************!*\
  !*** ./resources/js/elements/nav.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).on("click", ".ideaco_header__menu", function () {
  $('.ideaco_header').toggleClass('ideaco_header--mobile--active');
});

/***/ }),

/***/ "./resources/js/landing.js":
/*!*********************************!*\
  !*** ./resources/js/landing.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Import page Javascript
 */
__webpack_require__(/*! ./elements/nav */ "./resources/js/elements/nav.js");

__webpack_require__(/*! ./elements/faq */ "./resources/js/elements/faq.js");

__webpack_require__(/*! ./elements/home */ "./resources/js/elements/home.js");

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/landing.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/boluwatife/Documents/HNG_intern/ideaco/resources/js/landing.js */"./resources/js/landing.js");


/***/ })

/******/ });