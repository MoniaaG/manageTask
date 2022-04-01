<template>
    <div class="modal fade show" id="modalCreateTask" tabindex="-1" role="dialog" aria-labelledby="modalCreateTask" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header h4 text-warning">
          Add new task
          <button type="button" class="close btn text-white circle" data-dismiss="modal" aria-label="Close">
            <span class="h4" aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="add-task-form" method="post">
        <div class="modal-body">
            <div class="form-group">
              <div class="form-group mt-2">
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text bg-warning text-white border-warning" for="title">Title</label>
              </div>
              <input type="text" class="form-control bg-secondary text-white border-warning" id="title" name="title">
            </div>
          </div>
              <label for="description" class="col-form-label text-warning">Description:</label>
              <textarea class="form-control bg-secondary text-white border-warning" id="description" name="description"></textarea>
            </div>
            <div class="form-group mt-4">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-warning text-white border-warning" for="priority">Priority</label>
                </div>
                <select class="custom-select form-control bg-secondary text-white border-warning" id="priority" name="priority">
                    <option v-for="priority in priorities" :key="priority" v-bind:value="priority">{{priority}}</option>
                </select>
              </div>
            </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning text-dark add-task" id="add-task">Add task</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: "ModalCreateTask",
        props: {
            priorities: {
                type: [],
                default: () => this.priorities,
            },
        },
        data() {
            return {
                priorities: [],
            };
        },
        methods: {}
    }
</script>

<style>

</style>
