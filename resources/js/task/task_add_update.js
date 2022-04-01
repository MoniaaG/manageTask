$(document).ready(function() {
    $('.update-task').click((e) => {
        e.preventDefault();
        const json = getFormData($('#update-task-form'));
        json["task_id"] = $(e.target).attr('data-task');
        axios.put('/task/update', json)
        .then((response) => {
            let updateElement = $(`.drag-el[data-task="${$(e.target).attr('data-task')}"]`);
            updateElement.html(json["title"]);
        });
    });
    $('.close').click(() => {
        $('#exampleModalCenter').modal('hide');
        $('#modalCreateTask').modal('hide');
    });
    
    function getFormData(form) { 
        const array = form.serializeArray();
        const json = {};
        $.each(array, function () {
            json[this.name] = this.value || "";
        });
        return json;
    }

    $('.add-task').click((e) => {
        e.preventDefault();
        const json = getFormData($('#add-task-form'));
        json["status"] = $(e.target).attr('data-status');
        axios.post('/task/store', json)
        .then((response) => {
            //$(location).attr("href", '/tasks');
        });
    });
});