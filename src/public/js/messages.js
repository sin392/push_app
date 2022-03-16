/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/messages.js ***!
  \**********************************/
window.handleResend = function (event, message) {
  var param = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8"
    },
    body: JSON.stringify({
      title: message.title,
      body: message.body
    })
  };
  fetch("http://localhost:8080/api/push", param).then(function () {
    alert("メッセージを再送しました。");
  })["catch"](function (e) {
    console.log(e);
    alert("メッセージの送信に失敗しました。");
  });
};

window.handleDeleteMessage = function (event, message) {
  fetch("http://localhost:8080/api/messages/".concat(message.id), {
    method: "DELETE"
  }).then(function () {
    alert("メッセージを削除しました。");
  })["catch"](function (e) {
    console.log(e);
    alert("メッセージの削除に失敗しました。");
  });
  location.reload();
};

window.handleSelect = function (event) {
  location.href = "http://localhost:8080/list/".concat(event.target.value);
};
/******/ })()
;