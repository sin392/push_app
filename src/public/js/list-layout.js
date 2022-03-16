/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/list-layout.js ***!
  \*************************************/
window.handleSelect = function (event) {
  console.log(event);
  location.href = "http://localhost:8080/list/".concat(event.target.value);
};
/******/ })()
;