@extends('layouts.backend.main')

@section('title', 'MyBlog | Blog index')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-heade r">
      <h1>
        Blog
        <small>Display All Blog Post</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('blog.index') }}"> Blog</a></li>
        <li class="active">All Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header clearfix">
          <div class="pull-left">
            <a href="{{ route('blog.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>Add New</a>
          </div>
          <div class="pull-right" style="padding: 7px 0;">
            <?php $links = [] ?>
              @foreach($statusList as $key => $value)
                  @if($value)          
                      <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                      <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?> 
                  @endif
              @endforeach
              {!! implode(' | ', $links) !!}
            
          </div>
        </div>
        <div class="box-header with-border">
          <h3 class="box-title">Welcome to MyBlog</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         @include('backend.blog.message')

          @if (! $posts->count())
          <div class="alert alert-danger">
            <strong>No record found</strong>
          </div>
          @else
               @if($onlyTrashed)
                  @include('backend.blog.table-trash')
               @else
                  @include('backend.blog.table')
               @endif
           @endif
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <div class="pull-left"> 
            {{ $posts->appends( Request::query() )->render() }}
          </div>
          <div class="pull-right">
          
            <small>{{ $postCount }} {{ str_plural('Item', $postCount) }}</small>
          </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $('ul.pagination').addClass('no-margin pagination-sm');
  </script>
@endsection