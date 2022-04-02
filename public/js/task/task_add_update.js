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
    json["project_id"] = $('.task-list').data('project');
    var users;
    users = getMultiple($('#update-task-form select[name="users[]"]'));

    if (users.length > 0) {
      json["users"] = users;
    }

    axios.put('/task/update', json).then(function (response) {
      var updateElement = $(".drag-el[data-task=\"".concat($(e.target).attr('data-task'), "\"]"));
      updateElement.html(json["title"]);
      toastr.success("Task updated!");
    }, function (error) {
      toastr.error("Task was not updated!");
    });
  });
  $('.add-task').click(function (e) {
    e.preventDefault();
    var json = getFormData($('#add-task-form'));
    json["status"] = $(e.target).attr('data-status');
    json["project_id"] = $('.task-list').data('project');
    var users;
    users = getMultiple($('#modalCreateTask select[name="users[]"]'));

    if (users.length > 0) {
      json["users"] = users;
    }

    axios.post('/task/store', json).then(function (response) {
      toastr.success("Task stored!");
      $(location).attr("href", "/tasks/".concat($('.task-list').data('project')));
    }, function (error) {
      toastr.error("Task was not stored!");
    });
  });
  $('.drag-el').click(function (e) {
    $('#exampleModalCenter').modal('show');
    $("#select-users").val('').trigger('change');
    ;
    axios.post('/api/task/show', {
      id: $(e.target).data('task')
    }).then(function (response) {
      $('#update-task-form #title').val(response.data.task['title']);
      $('#update-task-form #description').html(response.data.task['description']);
      $("#update-task-form #priority option[value=\"".concat(response.data.task['priority'], "\"]")).attr('selected', 'selected');
      $('#update-task-form .update-task').attr('data-task', response.data.task['id']);
      $('#update-task-form .delete-task').attr('data-delete-href', response.data.task['id']);
      var users = response.data.users;
      var array = [];
      users.forEach(function (user) {
        array.push("".concat(user));
      });
      if (users.length > 0) $("#select-users").val(users).trigger('change');
    });
  });
  $('.close').click(function () {
    $('#exampleModalCenter').modal('hide');
    $('#modalCreateTask').modal('hide');
  });
  $('.show-add-task').click(function (e) {
    $('#modalCreateTask').modal('show');
    $('#modalCreateTask #title').val('');
    var status = $(e.target).attr('data-status');
    $('.add-task').attr('data-status', status);
  });

  function getFormData(form) {
    var array = form.serializeArray();
    var json = {};
    $.each(array, function () {
      json[this.name] = this.value || "";
    });
    return json;
  }

  function getMultiple(select) {
    var users = select.serializeArray();
    var array = [];

    if (users.length > 0) {
      users.forEach(function (user) {
        array.push(user.value);
      });
    }

    return array;
  }
});
/******/ })()
;