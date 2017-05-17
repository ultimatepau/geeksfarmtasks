@include('templates.header')
@include('templates.navbar')

<div class="container"> 
	<div class="row well-sm">
		<h1>
			{{ $result->title }}
		</h1>
		<hr>
		<p>
			{{ $result->content }}
		</p>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-12">
			{!! Form::open(['route'=>'Comments.store','method'=>'post','class="form-horizontal'])!!}
			<div class="form-group">
				{!! Form::hidden('id_article',$result->id) !!}
				{!! Form::textarea('comments','',array('class'=>'form-control','rows'=>'5') )!!}
				
			</div>
			<div class="form-group">
			{!! Form::submit('Send Comment') !!}
			</div>
			{!! Form::close() !!}
			<h3>Comments</h3>
			</div>
			@foreach ($comments as $item)
			<div class="col-lg-12 well">
				<b>Anonim</b><br>
				<i>{{ $item->comments}}</i> <br>
				{{ $item->created_at }}
			</div>
			@endforeach
		</div>

	</div>
</div>

@include('templates.footer')