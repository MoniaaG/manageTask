$(document).ready(function() {
    $('.update-task').click((e) => {
        e.preventDefault();
        const json = getFormData($('#update-task-form'));
        json["task_id"] = $(e.target).attr('data-task');
        json["project_id"] = $('.task-list').data('project');
        let users;
        users = getMultiple($('#update-task-form select[name="users[]"]'));
        if(users.length > 0) {
            json["users"] = users;
        }
        axios.put('/task/update', json)
        .then((response) => {
            let updateElement = $(`.drag-el[data-task="${$(e.target).attr('data-task')}"]`);
            updateElement.html(json["title"]);
            toastr.success("Task updated!");
        }, (error) => {
            toastr.error("Task was not updated!");
        });
    });

    $('.add-task').click((e) => {
        e.preventDefault();
        const json = getFormData($('#add-task-form'));
        json["status"] = $(e.target).attr('data-status');
        json["project_id"] = $('.task-list').data('project');
        let users;
        users = getMultiple($('#modalCreateTask select[name="users[]"]'));
        if(users.length > 0) {
            json["users"] = users;
        }
        axios.post('/task/store', json)
        .then((response) => {
            toastr.success("Task stored!");
            $(location).attr("href", `/tasks/${$('.task-list').data('project')}`);
        }, (error) => {
            toastr.error("Task was not stored!");
        });
    });

    $('.drag-el').click((e) => {
        $('#exampleModalCenter').modal('show');
        $("#select-users").val('').trigger('change');;
        axios.post('/api/task/show', {id: $(e.target).data('task')})
        .then((response) => {
            $('#update-task-form #title').val(response.data.task['title']);
            $('#update-task-form #description').html(response.data.task['description']);
            $(`#update-task-form #priority option[value="${response.data.task['priority']}"]`).attr('selected', 'selected');
            $('#update-task-form .update-task').attr('data-task', response.data.task['id']);
            $('#update-task-form .delete-task').attr('data-delete-href', response.data.task['id']);
            let users = response.data.users;
            let array = [];
            users.forEach((user) => {
                array.push(`${user}`)
            })
            if(users.length > 0)
            $("#select-users").val(users).trigger('change');
        });
    });

    $('.close').click(() => {
        $('#exampleModalCenter').modal('hide');
        $('#modalCreateTask').modal('hide');
    });

    $('.show-add-task').click((e) => {
        $('#modalCreateTask').modal('show');
        $('#modalCreateTask #title').val('');
        let status = $(e.target).attr('data-status');
        $('.add-task').attr('data-status', status);
    });

    function getFormData(form) { 
        const array = form.serializeArray();
        const json = {};
        $.each(array, function () {
            json[this.name] = this.value || "";
        });
        return json;
    }

    function getMultiple(select) {
        let users = select.serializeArray();
        let array = [];
        if(users.length > 0) {
            users.forEach((user) => {
                array.push(user.value);
            })
        }
        return array;
    }
});