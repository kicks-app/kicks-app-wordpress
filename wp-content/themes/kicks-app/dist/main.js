/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"main": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push([0,"vendor"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./js/main.js":
/*!********************!*\
  !*** ./js/main.js ***!
  \********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"./node_modules/jquery/dist/jquery.js\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var popper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! popper.js */ \"./node_modules/popper.js/dist/esm/popper.js\");\n/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! bootstrap */ \"./node_modules/bootstrap/dist/js/bootstrap.js\");\n/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(bootstrap__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var _scripts_turbolinks__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./scripts/turbolinks */ \"./js/scripts/turbolinks.js\");\n/* harmony import */ var _scripts_header__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./scripts/header */ \"./js/scripts/header.js\");\n/* harmony import */ var _scripts_header__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_scripts_header__WEBPACK_IMPORTED_MODULE_4__);\n/* harmony import */ var _scripts_hamburger__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./scripts/hamburger */ \"./js/scripts/hamburger.js\");\n/* harmony import */ var _scripts_sidebar__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./scripts/sidebar */ \"./js/scripts/sidebar.js\");\n\n\n\n\n\n\n\n\n//# sourceURL=webpack:///./js/main.js?");

/***/ }),

/***/ "./js/scripts/hamburger.js":
/*!*********************************!*\
  !*** ./js/scripts/hamburger.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"./node_modules/jquery/dist/jquery.js\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\n\njquery__WEBPACK_IMPORTED_MODULE_0___default()(window).on('show.bs.collapse hide.bs.collapse', function (event) {\n  return jquery__WEBPACK_IMPORTED_MODULE_0___default()(event.target).parents('.navbar').find('.navbar-toggler').find('.hamburger').toggleClass('is-active', event.type === 'show');\n});\n\n//# sourceURL=webpack:///./js/scripts/hamburger.js?");

/***/ }),

/***/ "./js/scripts/header.js":
/*!******************************!*\
  !*** ./js/scripts/header.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("window.addEventListener('scroll', function (event) {\n  console.log('scroll', window.pageYOffset > 0);\n  document.body.classList.toggle('page-offset', window.pageYOffset > 0);\n});\n\n//# sourceURL=webpack:///./js/scripts/header.js?");

/***/ }),

/***/ "./js/scripts/sidebar.js":
/*!*******************************!*\
  !*** ./js/scripts/sidebar.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"./node_modules/jquery/dist/jquery.js\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var css_element_queries__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! css-element-queries */ \"./node_modules/css-element-queries/index.js\");\n/* harmony import */ var css_element_queries__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(css_element_queries__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var sticky_sidebar__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! sticky-sidebar */ \"./node_modules/sticky-sidebar/src/sticky-sidebar.js\");\n\n\n\nvar sidebar;\nwindow.ResizeSensor = css_element_queries__WEBPACK_IMPORTED_MODULE_1__[\"ResizeSensor\"];\njquery__WEBPACK_IMPORTED_MODULE_0___default()(document).on('ready turbolinks:load', function () {\n  console.log('turbolinks load', window.ResizeSensor, css_element_queries__WEBPACK_IMPORTED_MODULE_1__[\"ResizeSensor\"]);\n\n  if (sidebar) {\n    sidebar.destroy();\n  }\n\n  console.log('height', jquery__WEBPACK_IMPORTED_MODULE_0___default()('.site-header').height());\n  var top = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.site-header').outerHeight(true);\n  console.log('TOP: ', top);\n  sidebar = new sticky_sidebar__WEBPACK_IMPORTED_MODULE_2__[\"default\"]('.sidebar', {\n    resizeSensor: true,\n    topSpacing: top,\n    bottomSpacing: 0,\n    containerSelector: '.site-content .container',\n    innerWrapperSelector: '.sidebar-inner',\n    minWidth: 992 // TODO: Get bootstrap breakpoints dynamically\n\n  });\n});\n\n//# sourceURL=webpack:///./js/scripts/sidebar.js?");

/***/ }),

/***/ "./js/scripts/turbolinks.js":
/*!**********************************!*\
  !*** ./js/scripts/turbolinks.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var turbolinks_dist_turbolinks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! turbolinks/dist/turbolinks */ \"./node_modules/turbolinks/dist/turbolinks.js-exposed\");\n/* harmony import */ var turbolinks_dist_turbolinks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(turbolinks_dist_turbolinks__WEBPACK_IMPORTED_MODULE_0__);\n\n\nif (turbolinks_dist_turbolinks__WEBPACK_IMPORTED_MODULE_0___default.a && (!turbolinks_dist_turbolinks__WEBPACK_IMPORTED_MODULE_0___default.a.controller || !turbolinks_dist_turbolinks__WEBPACK_IMPORTED_MODULE_0___default.a.controller.started)) {\n  turbolinks_dist_turbolinks__WEBPACK_IMPORTED_MODULE_0___default.a.start();\n}\n\n//# sourceURL=webpack:///./js/scripts/turbolinks.js?");

/***/ }),

/***/ "./scss/main.scss":
/*!************************!*\
  !*** ./scss/main.scss ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__.p + \"main.css\";\n\n//# sourceURL=webpack:///./scss/main.scss?");

/***/ }),

/***/ 0:
/*!*******************************************!*\
  !*** multi ./js/main.js ./scss/main.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./js/main.js */\"./js/main.js\");\nmodule.exports = __webpack_require__(/*! ./scss/main.scss */\"./scss/main.scss\");\n\n\n//# sourceURL=webpack:///multi_./js/main.js_./scss/main.scss?");

/***/ })

/******/ });