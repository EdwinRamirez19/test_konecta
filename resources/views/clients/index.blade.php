@extends('layouts.app')

@section('content')

<div class="card text-center">
  <div class="card-header">
    Clients
    <a href="#!" class="btn btn-dark" id="crear" data-method="post" data-target="#exampleModal">nuevo</a>
    
  Launch demo modal
</button>
  </div>
  <div class="card-body">
        <table class="table table-hover" id='clients_table'></table>
  </div>
  
</div>
@include('clients.client_modal')

<script src="\js\clients\clients.js"></script>

@endsection