@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3 class="h3">Dashboard | <span style="font-size: smaller; font-style: italic ;color: #5c5c5c;";>selamat datang ,  {{ Auth::user()->name }}</span></h3>
  <div class="btn-toolbar mb-2 mb-md-0">
   

  </div>
</div>



@endsection