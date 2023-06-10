<div>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($listRole as $role)
    @if($role->id >= Auth::user()->role_id)
    <li class="nav-item" role="presentation">
      <button class="nav-link @if($role->id == $currentRole) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#{{$role->name}}" type="button" role="tab" aria-controls="{{$role->name}}" wire:click="changeRole({{$role->id}})" aria-selected="@if ($role->id == $currentRole) true @elif false @endif">
        {{$role->title}}
      </button>
    </li>
    @endif
    @endforeach
  </ul>
    @foreach($listRole as $index => $role)
    <div class="tab-pane fade @if($role->id == $currentRole) show active @endif" id="{{$role->name}}" role="tabpane{{$index}}" aria-labelledby="{{$role->name}}-tab">
      <!-- display user list -->
      <div class="container-xl">
        <div class="table-responsive">
          <div class="table-wrapper">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Date Created</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listUser as $index => $user)
                @if($user->role_id == $role->id)
                <!-- list user with bootstrap 5 -->
                <tr>
                  <td>{{$index}}</td>
                  <td><a href="#" class="text-center"><img src="{{$user->avatar}}" class="rounded-circle" width="40" height="40" alt="Avatar">{{$user->fullname}}</a></td>
                  <td>{{$user->created_at}}</td>
                  <td>
                    <select class="form-select" aria-label="Default select example" wire:change="updateUserRole({{$user->id}},$event.target.value)">
                      @foreach($listRole as $role2)
                      @if(Auth::user()->role_id <= $role2->id)
                        <option value="{{$role2->id}}" @if($user->role_id == $role2->id) selected @endif>{{$role2->title}}</option>
                        @endif
                        @endforeach
                    </select>
                  </td>
                  <td><span class="status text-success">&bull;</span>Active</td>
                  <td>
                    <button href="#" class="btn btn-outline-primary" title="Settings" data-toggle="tooltip">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                    <button href="#" class="btn btn-outline-danger" title="Delete" data-toggle="tooltip" wire:click="deleteUser({{$user->id}})">
                      <i class="bi bi-x-octagon-fill"></i>
                    </button>
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
            <!-- <div class="clearfix">
              <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
              <ul class="pagination">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
              </ul>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</div>