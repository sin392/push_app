/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/form.js ***!
  \******************************/
window.handleSubmit = function (event, form) {
  event.preventDefault();
  var param = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8"
    },
    body: JSON.stringify({
      title: form.title.value,
      body: form.body.value
    })
  };
  fetch("http://localhost:8080/api/push", param).then(function () {
    form.reset();
  })["catch"](function (e) {
    console.log(e);
    alert("メッセージの送信に失敗しました。");
  });
  return false;
};
/******/ })()
;