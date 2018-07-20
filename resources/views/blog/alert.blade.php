			@if (isset($categoryName))
				<div class="alert alert-warning">
					<p>Category: <strong>{{$categoryName }}</strong></p>
				</div>
			@endif

			@if (isset($tagName))
				<div class="alert alert-warning">
					<p>Tagged: <strong>{{$tagName }}</strong></p>
				</div>
			@endif

			@if (isset($authorName))
				<div class="alert alert-warning">
					<p>Author: <strong>{{$authorName }}</strong></p>
				</div>
			@endif

			@if ($term = request('term'))
				<div class="alert alert-warning">
					<p>Search Results for: <strong>{{$term }}</strong></p>
				</div>
			@endif