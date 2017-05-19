@include('templates.header')
@include('templates.navbar')

<div class="container"> 
	<div class="row well-sm">
		<h1>
			{{ $result->title }}
			
				
					<a href="{{ url('detail/'.$result->id.'/export') }}"><i class="fa fa-download pull-right"></i></a>
				
			
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
				{!! Form::hidden('id_users',Sentinel::check()->id) !!}
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
			<?php $nama = \App\User::select('email')->where('id',$item->id_users)->get(); ?>
			{{date('Y-m-d H:i:s')}}
				<b>{{ $nama[0]->email }}</b><br>
				<i>{{ $item->comments}}</i> <br>
				{{ $item->created_at }}
			</div>
			@endforeach
		</div>

	</div>
</div>

@include('templates.footer')