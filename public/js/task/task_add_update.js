/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************!*\
  !*** ./resources/js/task/task_add_update.js ***!
  \**********************************************/
$(document).ready(function () {
  $('.update-task').click(function (e) {
    e.preventDefault();
    var json = getFormData($('#update-task-form'));
    json["task_id"] = $(e.target).attr('data-task');
    axios.put('./task/update', json).then(function (response) {
      var updateElement = $(".drag-el[data-task=\"".concat($(e.target).attr('data-task'), "\"]"));
      updateElement.html(json["title"]);
    });
  });
  $('.close').click(function () {
    $('#exampleModalCenter').modal('hide');
    $('#modalCreateTask').modal('hide');
  });

  function getFormData(form) {
    var array = form.serializeArray();
    var json = {};
    $.each(array, function () {
      json[this.name] = this.value || "";
    });
    return json;
  }

  $('.add-task').click(function (e) {
    e.preventDefault();
    var json = getFormData($('#add-task-form'));
    json["status"] = $(e.target).attr('data-status');
    axios.post('./task/store', json).then(function (response) {
      console.log('add tgask');
      $(location).attr("href", '/tasks');
    });
  });
});
/******/ })()
;