@include('templates.header')
@include('templates.navbar')

<div class="container">
	@include('feedback')
	@foreach ($result as $item)
	<div class="row well-sm">
		<h1>{{ $item->title }}
		<div class="pull-right">
			<small>
				<a href="{{ asset('export/'.$item->id) }}"><i class="fa fa-download"></i></a>
				<a href="{{ asset('detail/'.$item->id)}}"><i class="fa fa-link"></i></a>
			</small>
		</div>
		</h1>
		<hr>
		<p class="lead">
		{{ $item->content }}
		</p>
		
	</div>
	@endforeach
</div>
@include('templates.footer')