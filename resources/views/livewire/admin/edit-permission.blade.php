    <div class="content">
        <div class="container">
            <h2 class="mb-5">Chỉnh sửa quyền</h2>
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="align-self-center">Quyen</th>
                            @foreach($role as $r)
                            <th scope="col">{{$r->title}}
                                <small class="d-block align-self-center">{{$r->description}}</small>
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permission as $index => $p)
                        <tr>
                            <!-- <th scope="row">
                                <label class="control control--checkbox">
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                            </th> -->
                            <td>
                                {{$index}}
                            </td>
                            <td>
                                {{$p->title}}
                                <small class="d-block">{{$p->description}}</small>
                            </td>
                            <!-- check box -->
                            @foreach($role as $r)
                            <td>
                                <label class="control control--checkbox">
                                    <input type="checkbox" 
                                    @if($r->hasPermission($p->name)) checked @endif
                                    wire:click="updatePermission({{$r->id}}, {{$p->id}})"
                                    />
                                    <div class="control__indicator"></div>
                                </label>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
