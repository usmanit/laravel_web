<div class="col-sm-4">  <!-- =====Sedbar gambar====-->
	<aside><!-- ====searchsear=========-->
		<form action="{{ route('blog') }}">
			
			<div class="input-group">
				<input type="text" class="form-control" value="{{ request('term') }}" name="term" placeholder="Search For..">
				<span class="input-group-btn">
					<button class="btn btn btn-default" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
	</aside>
	<!-- ====searchsear=============chsearch============searchsearch =====--> <br>
	<ul class="list-group"><!-- Sedbar kategori right-->
		<li class="list-group-item" style="background:  #337AB7; color: #fff;   border: none;"> 
			<h4>Categories</h4>
		</li>
		@foreach ($categories as $category)
		<li class="list-group-item">
			<a href="{{ route('category', $category->slug)}}"> 
				<i class="fa fa-angle-right"></i>{{ $category->title}}
			</a>
			<span class="badge">{{ $category->posts->count()}}</span>
		</li>
		@endforeach
	</ul> 	<!-- Sedbar kategori -->
	<div class="owl-item"><!-- Sidebar Post -->
		<ul class="list-group"><!-- Sedbar kategori right-->
			<li class="list-group-item" style="background:  #337AB7; color: #fff;   border: none;"> <h5>gambar</h5>
			</li>
			<div class="thumbnail">
				<div class="side_post"><br>
					@foreach ($popularPosts as $post)
					<div class="media">
						@if ($post->image_thumb_url)
						 	<div class="media-left">
						 		<a href="{{ route('blog.post', $post->slug) }}">
						 			<img src="{{ $post->image_thumb_url }}" class="media-object" style="width:400px">
						 		</a>
						 	</div>
						 	@endif
						<div class="media-body">
						 		<h5 class="media-heading">
						 		<a href="{{ route('blog.post', $post->slug) }}"> {{ $post->title}}</a>
						 	</h5>
						 	<p>{{ $post->date}}</p>
						</div>
					</div>
					<br>
					@endforeach
				</div>
			</div>
				</ul>
				<div class="owl-item">
					<li class="list-group-item" style="background: #337AB7; color: #fff; border: none;">
						<h4>Tags</h4>
					</li>
					<div class="thumbnail">
						<div class="widget-body">
							<ul class="tags">
								@foreach($tags as $tag)
								<li style="background: #337AB7; color: #fff;  display: inline-block; padding: 5px 10px 5px 10px; margin-top: 5%; border: 5px; margin-left: 2%; margin-right: 2%;">
									<a style="color: #fff;" href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				 <ul class="list-group"><!-- Sedbar kategori right-->
					<li class="list-group-item" style="background: #337AB7; color: #fff; border: none;">
						 <h4>Archives</h4>
					</li>
					<div class="widger-body">
						<div class="thumbnail">
							@foreach($archives as $archive)
							<ul class="categiries">
								<li style="padding-top: 10px;">
									<a href="{{ route('blog', ['month' => $archive->month, 'year' => $archive->year]) }}">{{ $archive->month . "" . $archive->year }}</a>
									<span class="badge full-right">{{ $archive->post_count }}</span>
								</li><hr>
								<br style="padding-top: 15px;">
							</ul>
							@endforeach
						</div>
					</div>
				</ul> 	<!-- Sedbar kategori -->
			</div><!-- Sidebar Post -->
</div>