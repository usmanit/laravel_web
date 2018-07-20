<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https:/maxcdn.bootstrapcnd.com/bootstrap/3.3.7/css/bootstrap/min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https:/fonts.googleapis.com/css?family=Sunflower:300,500,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/boostrap1.css">
</head>
<body>
<div id="header1">
	<div class="container" style="padding-left: 43px;">
		<div class="container-fluid">
			<div class="navbar">
				<ul class="nav navbar-nav"><!-- nav navbar-nav --><br>
					<li><h2>LOGO</h2></li>
				</ul><!-- nav navbar-nav -->
				<div class="panel-body">
					<ul class="list-inline pull-right">
						<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-github"></i></a></li>
					</ul>
				</div><!-- nav navbar-nav navbar-right -->
			</div>
		</div>
	</div>
	<div class="height" style="height: 5px; background: #fff;"></div>
</div>
<div id="header" style="background: #337AB7;">
	<div class="container">
	 	<nav class="navbar-default">
	 	 	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="container-fluid">
		  		<div class="collapse navbar-collapse" id="myNavbar">
				    <ul class="nav navbar-nav"><!-- nav navbar-nav -->
				        <li class="active"><a href="{{ route('blog') }}">Blog</a></li>
				        <li><a href="#">Cumponents</a></li>
				        <li><a href="#"> Javascript </a></li>
				        <li><a href="#"> Customize </a></li>
				    </ul><!-- nav navbar-nav -->
				    <ul class="nav navbar-nav navbar-right"> <!-- nav navbar-nav navbar-right -->
				    	<li><a id="pemicu1" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
				    	<li><a id="pemicu2" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				    </ul><!-- nav navbar-nav navbar-right -->
				</div>
		  	</div>
		</nav>
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    	<!-- Modal content-->
		    	<div class="modal-content">
		        <div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		       		<h4 class="modal-title">Access</h4>
				</div><br>
		        <ul class="nav nav-tabs"><!-- nav nav-tabs -->
				   	<li class="active"><a id="terpicu2" data-toggle="tab" href="#home">Login</a></li>
				   	<li><a id="terpicu1" data-toggle="tab" href="#menu1">registstion</a></li>
				</ul><!-- nav nav-tabs -->
					<div class="modal-body">
						<div class="tab-content">
							<div id="home" class="tab-pane fade in active">
								<form class="form-horizontal" action="/action_page.php">
									<div class="form-group">
								   		<label class="control-label col-sm-2" for="email">Email:</label>
									    <div class="col-sm-10">
									        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
									    </div>
									</div>
								    <div class="form-group">
								      	<label class="control-label col-sm-2" for="pwd">Password:</label>
								      	<div class="col-sm-10">          
								        	<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
								     	</div>
								    </div>
								</form>
					    	</div>
					    	<div id="menu1" class="tab-pane fade">
					     	 	<form class="form-horizontal" action="{{url('/login')}}" method="post">
						      	 {{ csrf_field() }}
								<!--<div class="form-group">
									    <label class="control-label col-sm-2" for="email">Username:</label>
									    <div class="col-sm-10">
									        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
									    </div>
									</div> -->
									<div class="form-group">
										<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
									    	<label class="control-label col-sm-2">Email:</label>
										    <div class="col-sm-10">
										        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
										        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
										    </div>
										     @if ($errors->has('email'))
			         							<span class="help-block">
			               					 	<strong>{{ $errors->first('email') }}</strong></span>
			       							@endif
										</div>
									</div>
								    <div class="form-group">
								    	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
									      	<label class="control-label col-sm-2" for="pwd">Password:</label>
									      	<div class="col-sm-10">          
									        	<input type="password" name="password" class="form-control" placeholder="Password">
		        								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
									      	</div>
									       	@if ($errors->has('password'))
		          								<span class="help-block">
		                						<strong>{{ $errors->first('password') }}</strong>
		          								</span>
		        							@endif
									    </div>
								    </div>
								</form>
							</div>
						</div>
					</div>
		        <div class="modal-footer">
		          	<a href="#">Click here if you forgot your Password!</a>
         			<button data-dismiss="modal" type="submit" style="background-color: blue;" class="btn btn-default">Sign In</button>
        
		           <button type="button" class="btn btn-default" data-dismiss="modal"">Close</button>
		        </div>
		      </div>
		  </div>
		</div>
	</div>
</div> <!-- header -->
<div class="content">
	<!-- data-interval="1000"  untuk mengatur cepat slidenya-->
	  	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="1300">
		    <ol class="carousel-indicators">
		      	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      	<li data-target="#myCarousel" data-slide-to="1"></li>
		      	<li data-target="#myCarousel" data-slide-to="2"></li>
		      	<li data-target="#myCarousel" data-slide-to="3"></li>
		      	<li data-target="#myCarousel" data-slide-to="4"></li>
		    </ol>
		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		    	<div class="item active">
			      	<img src="/img/Post_Image_7.jpg" alt="Chania" width="460" height="345">
			      	<div class="carousel-caption">
			        	<h3>1</h3>
			        	<p>Slideshow satu</p>
			      	</div>
			    </div>
			    <div class="item">
		        	<img src="/img/Post_Image_8.jpg" alt="Chania" width="560" height="445">
		        	<div class="carousel-caption">
		          		<h3>2</h3>
		          		<p>Slideshow dua</p>
		        	</div>
		      	</div>
		      	<div class="item">
		        	<img src="/img/Post_Image_9.jpg" alt="Flower" width="560" height="445">
		        	<div class="carousel-caption">
				        <h3>3</h3>
				        <p>Slideshow tiga</p>
		        	</div>
		      	</div>
		      	<div class="item">
		        	<img src="/img/Post_Image_10.jpg" alt="Flower" width="560" height="445">
		        	<div class="carousel-caption">
		          		<h3>4</h3>
		          		<p>Slideshow empat</p>
		       		</div>
		      	</div>

		       <div class="item">
			        <img src="/img/Post_Image_11.jpg" alt="Flower" width="560" height="445">
			        <div class="carousel-caption">
		          		<h3>5</h3>
		          		<p>Slideshow lima</p>
		        	</div>
		      	</div>


		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      	<span class="glyphicon glyphicon-chevron-left"></span>
		      	<span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      	<span class="glyphicon glyphicon-chevron-right"></span>
		      	<span class="sr-only">Next</span>
		    </a>
		  </div>
		</div>
</div>
@yield('content')
<br><hr>
<footer style="color: #fff; background-color: #1a1c27; margin-bottom: -345px;">
	<div class="col-sm-4" style="background-color: #337AB7; padding-top: 40px;   margin-right: 5%;">
		<h1>ALAMAT BCL</h1>
		<iframe style=" margin-top: 10px;" class="thumbnail" src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d29154.49201845179!2d110.23602615338758!3d-7.773759391435169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d-7.7927788!2d110.2814652!4m3!3m2!1d-7.7791725!2d110.2251603!5e1!3m2!1sid!2sid!4v1531107305513" width="100%" height="100%" frameborder="0" style="border:0"></iframe>

	</div>
    <div class="#" style="background-color: #337AB7; padding-top: 40px; color: #fff;">
	      <h1>Hubungi kami sekarang</h1>
	      <p><span class="glyphicon glyphicon-map-marker"></span>Kontak</p>
	      <p><span class="glyphicon glyphicon-phone"></span> +091355824695</p>
	      <p style="padding-bottom: 10%;"><span class="glyphicon glyphicon-envelope"></span> usmanbcl@gmail.com</p>
	      <div class="height" style="height: 10px; background: #fff;"></div>
	</div>

    <div class="container" style="background: #1a1c27;">
		<div class="panel-body">
			<span class="text-muted pull-left">@usman bcl</span>
			<ul class="list-inline pull-right" style="color: #fff;">
				<li><a style="color: #fff;" href="#"><i class="fa fa-facebook-f"></i>facebook</a></li>
				<li><a style="color: #fff;" href="#"><i class="fa fa-twitter"></i>twitter</a></li>
				<li><a style="color: #fff;" href="#"><i class="fa fa-google-plus"></i>google</a></li>
				<li><a style="color: #fff;" href="#"><i class="fa fa-github"></i>github</a></li>
			</ul>
		</div>
	</div>
</footer>

    <script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	        document.getElementById("myBtn").style.display = "block";
	    } else {
	        document.getElementById("myBtn").style.display = "none";
	    }
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
	    document.body.scrollTop = 0;
	    document.documentElement.scrollTop = 0;
	}
	</script>

<!-- //*https://stackoverflow.com/questions/24949383/bootstrap-3-modal-how-to-check-if-modal-is-open-or-closed-using-jquery-javascri/26259118#26259118*// -->
<script>
	$('document').ready(function(){
		$('#pemicu1').click(function(){
			$('#terpicu1').click();
		});

		$('#pemicu2').click(function(){
			$('#terpicu2').click();
		});

		$('#myModal').mouseenter(function(){
			$('#myCarousel').carousel('pause');
		})
		.mouseleave(function(){
			$('#myCarousel').carousel('cycle');
		});
		$('#myCarousel').carousel('cycle');
	});
</script>
<script>
		window.onscroll = function() {myFunction()};

		var header = document.getElementById("header");
		var sticky = header.offsetTop;

		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    header.classList.add("sticky")
		  } else {
		    header.classList.remove("sticky");
		  }
}
</script>

<script type="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery/min.js"></script>
<script type="https://maxcdn.bootstrapcnd.com/bootstrap/3.3.7/js/bootstrap/min.js"></script>
</body>
</html> 