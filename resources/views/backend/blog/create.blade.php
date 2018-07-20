@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new post')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Add new post</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('blog.index') }}"> Blog</a></li>
        <li class="active"><i class="fa fa-plus"></i>Add new</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    <div class="row">  
       {!! Form::model($post, [
                      'method'  => 'POST',
                      'route'   => 'blog.store',
                      'files'   => TRUE,
                      'id'      => 'post-form'
                    ]) !!}

               @include('backend.blog.form')     
       {!! Form::close() !!}      
    </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection
@include('backend.blog.script')