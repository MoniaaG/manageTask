/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/delete/user.js ***!
  \*************************************/
$(document).ready(function () {
  $(document).on('click', "[data-delete-href]", function () {
    var url = $(this).data("delete-href");
    bootbox.confirm({
      title: 'Delete user permanently!',
      message: "<div class=\"modal-icon\"><i class=\"far fa-trash-alt mr-1\"></i><span> Do you want to delete this user?</span></div>",
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
          axios["delete"](url).then(function (response) {
            bootbox.alert({
              title: 'User was deleted',
              message: "<div class=\"modal-icon\"><i class=\"fa fa-check text-success mr-1\"></i><span>Deleted</span></div>",
              callback: function callback(confirm) {
                $(location).attr("href", "/projects");
              }
            });
          }, function (error) {
            bootbox.alert({
              title: 'Can not delete user',
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