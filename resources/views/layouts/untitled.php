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

@foreach ($popularPosts as $post)
<div class="col-sm-6">
@if ($post->image_thumb_url)
<a href="{{ route('blog.post', $post->slug) }}">
<img src="{{ $post->image_thumb_url }}" alt="Fjords" style="width:100%; padding-top: 3%; padding-right: 3%;">
@endif
<div class="caption">
<h2>{{ route('blog.post', $post->slug) }}</h2>
<p>{{ $post->title}}</p>
</div>
</a>  
</div>
@endforeach