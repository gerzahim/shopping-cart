﻿@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Create a New Attribute </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="{{ route('attributes.store') }}" method="post" id="create-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name Attribute</label>
                <input type="text" id="name" class="form-control" required name="name">
              </div>              
            </div>            
          </div>          
          </div>
          {{ csrf_field() }}
          <button type="submit" class="btn btn-success">Create New Attribute</button>
        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
