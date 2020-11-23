@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <p>Selamat Datang {{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
