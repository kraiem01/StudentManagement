@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Courses Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $batches->name }}</h5>
        <p class="card-text">course_id : {{ $batches->course->name }}</p>
        <p class="card-text">start_date : {{ $batches->start_date }}</p>
  </div>
       
    </hr>
  
  </div>
</div>
@endsection