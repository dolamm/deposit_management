<div class="container">
    <div>
        <!-- user profile -->
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{$user->avatar}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{$user->fullname}}</h5>
                                <p class="text-muted mb-1">{{$user->birthday}}</p>
                                <p class="text-muted mb-4">{{$user->address}}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-profile">Chỉnh sửa profile</button>
                                    <button type="button" class="btn btn-outline-primary ms-1" data-bs-toggle="modal" data-bs-target="#account-bank-history">Lịch sử tài khoản</button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fas fa-globe fa-lg text-warning"></i>
                                        <p class="mb-0">supberbank.com</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                        <p class="mb-0">{{$user->fullname}}</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                        <p class="mb-0">@ {{$user->fullname}}</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <p class="mb-0">{{$user->fullname}}</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                        <p class="mb-0">{{$user->fullname}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->fullname}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->email}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->phone}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">CMND/CCCD</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->cmnd_cccd}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->address}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <!-- chart -->
                                        <canvas id="chart-bien-dong-so-du"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <!-- chart -->
                                        <canvas id="chart-tai-san"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit profile popup-->
            <div wire:ignore.self class="modal fade" id="edit-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- edit profile -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-vcard-fill"></i></span>
                                <input wire:model="edituser.fullname" name="fullname" type="text" class="form-control" aria-label="Fullname" aria-describedby="basic-addon1" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-phone-fill"></i></span>
                                <input wire:model="edituser.phone" type="text" class="form-control" placeholder="số điện thoại" aria-label="phone" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-bounding-box"></i></span>
                                <input wire:model="edituser.cmnd_cccd" type="text" class="form-control" placeholder="cmnd/cccd" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-house-gear-fill"></i></span>
                                <input wire:model="edituser.address" type="text" class="form-control" placeholder="địa chỉ" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar2-day-fill"></i></span>
                                <input wire:model="edituser.birthday" type="date" class="form-control" placeholder="sinh ngày" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                                <input wire:model="edituser.avatar" type="text" class="form-control" placeholder="avatar url" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" wire:click="updateUser" data-bs-dismiss="modal">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!-- Account History Modal -->
            <div class="modal fade" id="account-bank-history" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div wire:ignore>
                                <livewire:bank-history :user="$user" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </section>
    </div>
    <!-- <div class="row justify-content-center">
        <div class="col-8">
            <div class="w-80 h-80">
                <canvas id="chart-bien-dong-so-du"></canvas>
            </div>
        </div>
        <div class="col-4">
            <div class="w-80 h-80">
                <canvas id="chart-tai-san"></canvas>
            </div>
        </div>
    </div> -->
    <script type="module" src="{{Vite::asset('resources/js/chart/AccountHistory.js')}}"></script>
    <script type="module" src="{{Vite::asset('resources/js/chart/TotalTaiSan.js')}}"></script>
</div>