@extends('layouts.admin')
@section('content')
<div>
    <!-- 403 -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template text-center">
                    <h1>Oops!</h1>
                    <h2>403 Not Permission</h2>
                    <div class="error-details">
                        Sorry, an error has occured, Not Permission!
                    </div>
                    <div class="error-actions mt-4">
                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Take Me Home </a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection