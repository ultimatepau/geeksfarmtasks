<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Task 4 Rizaldi</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
					@if(Request::segment(2) == "create")
						<li><a href="{{ asset('') }}">Home</a></li>
						<li class="active"><a href="{{ route('Article.create') }}">Create Article</a></li>
					@elseif (Request::segment(1) == "detail")
						<li><a href="{{ asset('') }}">Home</a></li>
						@if(Sentinel::check()) 
						<li><a href="{{ route('Article.create') }}">Create Article</a></li>
						@endif
					@elseif(Request::segment(1) == "login" || !Request::segment(1) || Request::segment(1) == "signup")
						<li><a href="{{ asset('') }}">Home</a></li>
						@if(Sentinel::check()) 
						<li><a href="{{ route('Article.create') }}">Create Article</a></li>
						@endif
					@endif
					</ul>
					<ul class="nav navbar-nav navbar-right">
					@if(Sentinel::check()) 
					<li><a href="{{ asset('logout') }}">Logout</a>
					@else
					<li><a href="{{ asset('login') }}">Login <sup><span class="label label-warning">Beta</span></sup></a>
					@endif
					
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>