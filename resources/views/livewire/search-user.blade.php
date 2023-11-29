<div>
    <!-- search user -->
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search-heart-fill"></i></span>
        <input wire:model="searchTerm" type="text" class="form-control" placeholder="tên kh, số điện thoại" aria-label="Username" aria-describedby="addon-wrapping" wire:keydown.enter="searchUser">
    </div>
    <!-- end search user -->
    <!-- list user -->
    <div class="form-group">
        <!-- display listusre -->
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                @foreach ($user as $index => $item)
                <!-- <section class="vh-100" style="background-color: #9de2ff;"> -->
                <div class="col col-md-9 col-lg-6 col-xl-6 my-md-1 my-lg-2 my-xl-3">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="{{$item->avatar}}" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">{{$item->fullname}}</h5>
                                    <!-- <p class="mb-2 pb-1" style="color: #2b2a2a;">{{$item->role->title}}</p> -->
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Ngày sinh: {{$item->birthday}}</p>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">CMND/CCCD: {{$item->cmnd_cccd}}</p>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Địa chỉ: {{$item->address}}</p>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Số điện thoại: {{$item->phone}}</p>
                                    <!-- <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                            <div>
                                                <p class="small text-muted mb-1">Articles</p>
                                                <p class="mb-0">41</p>
                                            </div>
                                            <div class="px-3">
                                                <p class="small text-muted mb-1">Followers</p>
                                                <p class="mb-0">976</p>
                                            </div>
                                            <div>
                                                <p class="small text-muted mb-1">Rating</p>
                                                <p class="mb-0">8.5</p>
                                            </div>
                                        </div> -->
                                    <div class="d-flex pt-1">
                                        <a type="button" class="btn btn-outline-primary me-1 flex-grow-1" href="{{route('add-passbook', $item->id)}}">Mở Sổ tiết kiệm</a>
                                        <a type="button" class="btn btn-primary flex-grow-1" href="{{route('user-passbook', $item->id)}}">Xem Danh Sách Sổ</a>
                                        <!-- <button type="button" class="btn btn-primary flex-grow-1"><a href="/test/{{$item->id}}">Xem chi tiết</a></button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </section> -->
                @endforeach
            </div>
        </div>
    </div>
</div>