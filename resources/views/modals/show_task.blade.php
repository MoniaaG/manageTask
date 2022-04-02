<div class="modal fade show" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg-dark text-white">
        <form id="update-task-form" method="post">
        <div class="modal-header">
          <div class="form-group mt-4">
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text bg-warning text-white border-warning" for="title">Title</label>
              </div>
              <input type="text" class="form-control bg-secondary text-white border-warning" id="title" name="title">
            </div>
          </div>
          <button type="button" class="close btn text-white circle" data-dismiss="modal" aria-label="Close">
            <span class="h4" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
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
              <label for="select-users" class="form-label text-warning col-12">Assign users to task</label>
              <select id="select-users" class="form-control bg-dark text-white border-warning border-2 bg-secondary m-0" name="users[]" multiple="multiple">
                  @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger delete-task" data-delete-href="">Delete</button>
          <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary update-task" id="save-changes">Save changes</button>
          <button type="button" class="btn btn-warning text-white add-user"><i class="fa-solid fa-user-plus"></i> Add user</button>
        </div>
        </form>
      </div>
    </div>
  </div>