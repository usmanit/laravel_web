@extends ('layouts.main')

@section('content')
<div class="container"> 
	<div class="row">
		<br><br>
		
		<div class="col-md-8"> <!-- =========articla text =========-->
			@if (! $posts->count())
				<div class="alert alert-info">
					<p>Nothng Found</p>
				</div>
			@else

				@include('blog.alert')

				@foreach($posts as $post)
				
				    <div class="thumbnail" style="margin-bottom: 55px;">
				    	@if ($post->image_url)
					      <a href="{{$post->image_url }}">
					        <img src="{{$post->image_url }}" alt="Fjords" style="width:100% padding-top 2%; padding-right: 2%;">
					      </a>
					      @endif
				        <div class="caption">
				        <h2><a href="{{ route('blog.post', $post->slug) }}"> {{ $post->title }}</a></h2>
				          {!! $post->excerpt_html !!}
				        </div>
				     
				      <hr><br>
				      <span>
				      	 <ul class="list-inline">
						        <li style="padding-left: 2px;"><i class="fa fa-user"></i><a href="{{ route('author', $post->author->slug)}}"> {{ $post->author->name }}</a></li>
						        <li style="padding-left: 15px;"><i class="fa fa-clock-o"></i><a href="#"> {{$post->date }}</a>
						        </li>
						        <li style="padding-left: 15px;"><i class="fa fa-folder"></i><a href="{{ route('category', $post->category->slug)}}"> {{ $post->category->title }}</a>
						        </li>
						        <li style="padding-left: 15px;">
						        	<i class="fa fa-tags"></i>
						        	{!! $post->tags_html !!}
						        </li>
						        <li style="padding-left: 10px;">
						        	<i class="fa fa-comments"></i>
						        	<a href="{{ route('blog.show', $post->slug) }}#post-comments">{{ $post->commentsNumber() }}</a>
						        </li> 

						        <li style="padding-left: 10px; width: 210px; background: #fff;">
						        	<p style="color: #fff;"></p>
						        	
						        </li>
						        <div class="Reading" style="font: bold; margin-top: 2%; float: right; width: 25%; background: #fba400; padding-top:10px; padding-bottom: 2%; padding-left: 4%; ">
						        	<li>
						        	<a href="{{ route('blog.show', $post->slug) }}">Continue Reading <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>
						        	</a>
						        	</li>
						        </div>
						  </ul>
						</span>
				  </div>
			 @endforeach
			@endif
			<div class="thumbnail">
				@if ($post->image_thumb_url)
				 <div class="media-left">
					<a href="{{ route('blog.post', $post->slug) }}">
						<img src="{{ $post->image_thumb_url }}" class="media-object" style="width:400px">
					</a>
				 </div>
			@endif
			</div>	
		<nav> 
	 		{{ $posts->appends(request()->only(['term', 'month', 'year']))->links() }}
	 	</nav>

	  </div>
	
	   <!-- =========articla text left=========-->
	  @include('layouts.sidebar')
	</div><!-- =====Sedbar gambar====-->
</div>

@endsection