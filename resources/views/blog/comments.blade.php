
  
<div class="post-comments" id="post-comments">
			<div class="thumbnail">
				<h3><i class="fa fa-comments"></i>{{ $post->commentsNumber() }}</h3>
			</div>
		<div class="thumbnail">	
			@foreach($postComments as $comment)

			<div class="comment-body padding-10">
				<div class="comment-author-meta">
					<h4>{{ $comment->author_name}}<small>{{ $comment->date }}</small></h4>
				</div>
			</div>
			<div class="comment-content">
				{!! $comment->body_html !!}
			</div>
			@endforeach
		</div>
		<nav>
			{!! $postComments->links() !!}
		</nav>

	</div>
  <h3>Leave a comment</h3>
  	@if(session('message'))
  		<div class="alert alert-info">
  			{{ session('message') }}
  		</div>
  	@endif
		{!! Form::open(['route' => ['blog.comments', $post->slug]]) !!}
	    <div class="form-group required {{ $errors->has('author_name') ? 'has-error' : ''}}">
	      	<label for="usr">Name:</label>
	     	 {!! Form::text('author_name', null, ['class' => 'form-control']) !!}
	     	 @if($errors->has('author_name'))
	     	 <span class="help-block">
	     	 	<strong>{{ $errors->first('author_name')}}</strong>
	     	 </span>
	     	 @endif
	    </div>
	    <div class="form-group required {{ $errors->has('author_email') ? 'has-error' : ''}}">
	      	<label for="pwd">Email:</label>
	      	{!! Form::text('author_email', null, ['class' => 'form-control']) !!}
	      	@if($errors->has('author_email'))
	      	<span class="help-block">
	      		<strong>{{ $errors->first('author_email')}}</strong>
	      	</span>
	      	@endif
	    </div> 
	    <div class="form-group required">
	      	<label for="pwd">Website:</label>
	      	{!! Form::text('author_url', null, ['class' => 'form-control']) !!}
	    </div>
	     <div class="form-group required {{ $errors->has('body') ? 'has-error' : ''}}">
	  		<label for="comment">Comment:</label>
	  		{!! form::textarea('body', null, ['row' => 6, 'class' => 'form-control']) !!}
	  		@if($errors->has('body'))
 		<span class="help-block">
				<strong>{{ $errors->first('body') }}</strong>
			</span>
			@endif
		</div>  
		
	<button type="submit" class="news_button" style="border: none; background-color: #ffa800;padding: 10px; width: 100px; margin-left: 20px; text-align: center;position: relative;bottom: -25px;">
		Submit
	</button>

	{!! Form::close() !!}

