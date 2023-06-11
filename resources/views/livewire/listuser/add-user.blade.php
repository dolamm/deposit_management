<div>
    <!-- from input user data -->
    <!-- fullname -->
    <div class="form-group">
        <label for="fullname">Fullname</label>
        <input type="text" class="form-control" id="fullname" wire:model="user.fullname">
        @error('user.fullname') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" wire:model="user.email">
        @error('user.email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" wire:model="user.password">
        @error('user.password') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-select" aria-label="Default select example" wire:model="user.role_id">
            @foreach($listRole as $role)
            @if(Auth::user()->role_id <= $role->id)
                <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif>{{$role->title}}</option>
                @endif
                @endforeach
        </select>
        @error('user.role_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="text" class="form-control" id="avatar" wire:model="user.avatar">
        @error('user.avatar') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" wire:model="user.phone">
        @error('user.phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" wire:model="user.address">
        @error('user.address') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="birthday">Birthday</label>
        <input type="text" class="form-control" id="birthday" wire:model="user.birthday">
        @error('user.birthday') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <!-- button submit -->
    <button type="submit" class="btn btn-primary" wire:click="addUser">Submit</button>
</div>
</div>