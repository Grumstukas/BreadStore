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

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*************************functions****************************/

/**************************actions*****************************/
$(document).on("click", ".good", function (e) {
  //e-event
  e.preventDefault(); //draudžia defoltinę elgsena ejimas i linką

  var link = $(this).attr("href"); //susikuriam kintamajį su visa link info

  axios.post(link, {
    //axiosą siunčiam pagal tą linką
    id: $(this).data('id') //iš linko pasiima id (data-id..)

  }) //veksmas serveryje, kai serveris duoda atsakymą:
  .then(function (response) {
    $("#bun_pop").empty().html(response.data.html);
  })["catch"](function (error) {
    console.log(error);
  });
});
$(document).on("click", ".clear", function (e) {
  //e-event
  e.preventDefault(); //draudžia defoltinę elgsena ejimas i linką

  $("#bun_pop").empty();
}); //*********************antras psl************************

$(document).on("click", "#buy", function () {
  var link = $(this).data("url");
  axios.post(link, {
    id: $(this).data('id'),
    count: $('.count').val()
  }).then(function (response) {
    $(".goodsCount").empty().append(response.data.html);
  })["catch"](function (error) {
    console.log(error);
  });
}); //*********************pirmas psl******************
// $(document).on("click", "#buy", function(){
//     var link = $(this).data("url");
//     axios.post(link, {
//         id:$(this).data('id'),
//         count:$(this).closest('.amount_to_buy').find('.count').val()
//     })
//         .then(function (response) {
//             $(".goodsCount").empty().append(response.data.html);
//         })
//         .catch(function (error) {
//             console.log(error);
//         });
// });
//***************************************

$(document).ready(function () {
  var link = $(".goodsCount").data("url");
  axios.post(link, {}).then(function (response) {
    $(".goodsCount").empty().append(response.data.html);
  })["catch"](function (error) {
    console.log(error);
  });
});
$(document).on("click", ".amount", function (e) {
  e.preventDefault();
  var link = $(this).attr("href");
  axios.post(link, {
    key: $(this).data('key'),
    id: $(this).data('id')
  }) //veksmas serveryje, kai serveris duoda atsakymą:
  .then(function (response) {
    $(".goodsCount").empty().html(response.data.html);
    $("#kashikas").empty().html(response.data.html2);
  })["catch"](function (error) {
    console.log(error);
  });
});
$(document).on("click", ".deliveryMethod", function () {
  var link = $(".deliveryMethod").data("url");
  axios.post(link, {
    way: $(this).data('way')
  }).then(function (response) {
    $(".totalPrice").empty().append(response.data.html);
  })["catch"](function (error) {
    console.log(error);
  });
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/toma/bakery/resources/js/main.js */"./resources/js/main.js");


/***/ })

/******/ });