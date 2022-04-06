<div class="modal fade show" id="modalCreateTask"  role="dialog" aria-labelledby="modalCreateTask" aria-hidden="true">
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
                    @foreach($priorities as $priority)
                    <option value="{{$priority}}">{{$priority}}</option>
                    @endforeach
                </select>
              </div>
            </div> 
            <div class="mb-3 col-12">
              <label for="users" class="form-label text-warning col-12">Assign users to task</label>
              <select id="users" class="form-control bg-dark text-white border-warning border-2 bg-secondary m-0" name="users[]" multiple="multiple">
                  @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
              </select>
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