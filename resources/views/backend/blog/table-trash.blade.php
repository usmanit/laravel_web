 <table class="table table-bordered">
	        	<thead>
	        		<tr>
	        			<td width="100">Action</td>
	        			<td>Title</td>
	        			<td width="120">Author</td>
	        			<td width="150">Category</td>
	        			<td width="150">Date</td>
	        		</tr>
	        	</thead>
	        	<tbody>

	        	<?php $request = request(); ?>

	        	@foreach($posts as $post)
	        	<tr>
    	        	<td>
	    	        	{!! Form::open(['style' => 'display:inline-block;', 'method' => 'PUT', 'route' => ['blog.restore', $post->id]]) !!}
	    	        	@if (check_user_permissions($request, "Blog@restore", $post->id))
		        	        <button title="Restore" class="btn btn-xs btn-default">
		        	        	<i class="fa fa-refresh"></i>
		        	        </button>
		        	    @else
		        	        <button title="Restore" onclick="return false;" class="btn btn-xs btn-default disabled">
		        	        	<i class="fa fa-refresh"></i>
		        	        </button>
		        	    @endif
		        	    {!! Form::close() !!}

	        	        {!! Form::open(['style' => 'display:inline-block;', 'method' => 'DELETE', 'route' => ['blog.force-destroy', $post->id]]) !!}

	        	        @if (check_user_permissions($request, "Blog@forceDestroy", $post->id))

	        	        <button title="Delete Permanent" onclick="return confirm('Yor are about to delete a post Permanently. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
	        	        	<i class="fa fa-times"></i>
	        	        </button>
	        	        @else
	        	        <button title="Delete Permanent" onclick="return false;" type="submit" class="btn btn-xs btn-danger disabled">
	        	        	<i class="fa fa-times"></i>
	        	        </button>
	        	        @endif
                      {!! Form::close() !!}

    	        			</td>
	        			<td>{{ $post->title }}</td>
	        			<td>{{ $post->author->name }}</td>
	        			<td>{{ $post->category->title }}</td>
	        			<td>
	        				<abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
	        				
	        		</td>
	        	</tr>
	        		@endforeach
	        	</tbody>
            </table>