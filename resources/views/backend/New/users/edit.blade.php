@extends('layouts.backend.main')

@section('title', 'MyBlog |Edit Category')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories
        <small>Edit Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('categories.index') }}"> categories</a></li>
        <li class="active"><i class="fa fa-plus"></i>Edit category/li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    <div class="row">  
       {!! Form::model($category, [
                      'method'  => 'PUT',
                      'route'   => ['categories.update', $category->id],
                      'files'   => TRUE,
                      'id'      => 'post-form'
                    ]) !!}

               @include('backend.categories.form')     
       {!! Form::close() !!}      
    </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection
@include('backend.categories.script')