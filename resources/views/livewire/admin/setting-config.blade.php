@extends('layouts.admin')
@section('content')
    <div>
        <h3>Thiet lap cac gia tri bien</h3>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Ten Bien</th>
                <th scope="col">Mo Ta</th>
                <th scope="col">Gia Tri</th>
                <th scope="col">Chinh Sua</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($config as $index => $item)
                <tr>
                <th scope="row">{{$index}}</th>
                <td>{{$item->tengiatri}}</td>
                <td>{{$item->mota}}</td>
                <td>{{$item->giatri}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection