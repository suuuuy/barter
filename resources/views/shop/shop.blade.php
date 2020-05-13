@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <span class="h2">My Shop</span>
                    <add-product-component class="float-right" :user-auth="{{Auth::user()}}"></add-product-component>
                </div>
                <div class="card-body">
                    <!-- <shop-component></shop-component> -->
                    <market-component :user-auth="{{Auth::user()}}"></market-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
