@extends ('layouts.main')

@section('content')
<div class="container"> 
	<div class="row">
		<br><br>
		<div class="col-md-8"> <!-- =========articla text =========-->
		    <div class="thumbnail">
		    @if ($post ->image_url)
		      <a href="Post_Image_6.jpg">
		        <img src="{{ $post->image_url}}" alt="{{ $post->title}}" style="width:100%">
		    </a>
		    @endif
		        <div class="caption">
		        <h1>{{ $post->title}}</h1>
		         <span>
		      	 <ul class="list-inline">
				        <li style="padding-left: 20px;"><i class="fa fa-user"></i><a href="{{ route('author', $post->author->slug)}}"> {{ $post->author->name}}</a></li>
				        <li style="padding-left: 40px;"><i class="fa fa-clock-o"></i><a href="#"> {{ $post->date}}</a></li>
				        <li style="padding-left: 40px;"><i class="fa fa-folder"></i><a href="{{ route('category', $post->category->slug) }}"> {{ $post->category->title }} </a></li>
				        
				        <li style="padding-left: 40px;"><i class="fa fa-tag"></i> {!! $post->tags_html !!}</li>
				       
				        <li style="padding-left: 40px;"><i class="fa fa-comments"></i><a href="#post-comments">{{ $post->commentsNumber('comment') }}</a></li>
				        
				  </ul>
				</span>
		          {!! $post->body_html !!}
		          <br><br>
					<div class="thumbnail">
						<!-- Nested media object -->    
					    <div class="media">
					      <div class="media-left">
					      	<?php $author = $post->author; ?>
					      	<a href="{{ route('author', $author->slug) }}">
					       		 <img alt="{{ $author->name }}" src="{{ $author->gravatar() }}" class="media-object">
					       	</a>
					      </div>
					      <div class="media-body">
					        <h3 class="media-heading"><a href="{{ route('author', $author->slug)}}"> {{ $author->name }}</a> </h3>
					        <small><a href="{{ route('author', $author->slug)}}"><i><i class="fa fa-clone"></i>
					        	<?php $postCount = $author->posts()->published()->count() ?>
					          {{ $postCount }} {{ str_plural('post', $postCount)}}
					      </i></a></small>
					        {!! $author->bio_html !!}
					      </div>
					    </div>
					</div>
					<div class="thumbnail">
					  @include('blog.comments')
<!-- 
					     <button>
							<a href="http://pondokinformatika.com/">Submit </a>
						</button> -->
					</div>
		        </div>

		    </div>

	  </div> <!-- =========articla text left=========-->
	  @include('layouts.sidebar')
	</div><!-- =====Sedbar gambar====-->


</div>

@endsection