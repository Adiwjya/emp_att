@extends('layouts.main')

@section('tittle')
    Assign Shift
@endsection

@section('page_name')
    Assign Shift
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Wellcome {{ auth()->user()->name }}</h1>
      <p class="lead">Aplikasi Employeee Attendance</p>
    </div>
</div>
@endsection