
$(document).ready(function() {
    $(document).on('click', "[data-delete-href]", function () {
        var url = $(this).data("delete-href");
        bootbox.confirm({
            title: 'Delete project',
            message: `<div class="modal-icon"><i class="far fa-trash-alt mr-1"></i><span> Do you want to delete this project?</span></div>`,
            buttons: {
                confirm: {
                    label: `<i class="fa fa-check mr-1"></i> Delete`,
                    className: 'btn-danger',
                },
                cancel: {
                    label: `<i class="fa fa-times mr-1"></i> Close`,
                    className: 'btn-success',
                },
            },
            callback: function(confirm) {
                if( confirm ) {
                        axios.delete(url)
                        .then((response) => {
                            bootbox.alert({
                                title: 'Project was deleted',
                                message: `<div class="modal-icon"><i class="fa fa-check text-success mr-1"></i><span>Deleted</span></div>`,
                                callback: function(confirm) {
                                    $(location).attr("href", `/projects`);
                                },
                            });
                        }, (error) => {
                            bootbox.alert({
                                title: 'Can not delete project',
                                message: `<div class="modal-icon mr-1"><i class="fa fa-times text-danger"></i><span></span></div>`,
                            });
                        })
                    }
                }
        });
    })
});