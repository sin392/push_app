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
        body: form.body.value,
        url1: form.url1.value,
        url2: form.url2.value
      })
    };
    console.log(param.body);
    fetch("http://localhost:8080/api/push", param).then(function () {
      form.reset();
    })["catch"](function (e) {
      console.log(e);
      alert("メッセージの送信に失敗しました。");
    });
    return false;
  };
  /******/
})()
  ;