@extends('layouts.app')

@section('content')

<div class="card text-center">
  <div class="card-header">
    Usuarios
    <a href="#!" class="btn btn-dark" id="crear" data-method="post" data-target="#exampleModal">nuevo</a>
    
  
</button>
  </div>
  <div class="card-body">
        <table class="table table-hover" id='users_table'></table>
  </div>
  
</div>
@include('users.users_modal')

<script src="\js\users\users.js"></script>

@endsection