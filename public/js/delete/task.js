/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/delete/task.js ***!
  \*************************************/
$(document).ready(function () {
  $(document).on('click', "[data-delete-href]", function () {
    var id = $(this).data("delete-href");
    bootbox.confirm({
      title: 'Delete task',
      message: "<div class=\"modal-icon\"><i class=\"far fa-trash-alt mr-1\"></i><span> Do you want to delete this task?</span></div>",
      buttons: {
        confirm: {
          label: "<i class=\"fa fa-check mr-1\"></i> Delete",
          className: 'btn-danger'
        },
        cancel: {
          label: "<i class=\"fa fa-times mr-1\"></i> Close",
          className: 'btn-success'
        }
      },
      callback: function callback(confirm) {
        if (confirm) {
          axios["delete"]('/task/delete', {
            data: {
              id: id
            }
          }).then(function (response) {
            bootbox.alert({
              title: 'Task was deleted',
              message: "<div class=\"modal-icon\"><i class=\"fa fa-check text-success mr-1\"></i><span>Deleted</span></div>",
              callback: function callback(confirm) {
                $(location).attr("href", '/tasks');
              }
            });
          }).error(function (response) {
            bootbox.alert({
              title: 'Can not delete task',
              message: "<div class=\"modal-icon mr-1\"><i class=\"fa fa-times text-danger\"></i><span></span></div>"
            });
          });
        }
      }
    });
  });
});
/******/ })()
;