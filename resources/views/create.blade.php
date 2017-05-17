		@include('templates.header')

		@include('templates.navbar')
		<div class="container well">
			{!! Form::open(['route'=>'Article.uploadexcel','method='=>'post','role'=>'form','class'=>'form-inline','enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
				{!! Form::file('excel',array('id'=>'excel')) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Upload',array("class"=>"btn btn-success")) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class="container well">
		@include('feedback')
			{!! Form::open(['route'=>'Article.store','method'=>'post','role'=>'form','class'=>'form-horizontal']) !!}
			<div class="form-group">
				{!! Form::label('title','Insert Title',array('class'=>'control-label col-sm-2')) !!}
				<div class="col-sm-10">
					{!! Form::text('title','', array('class'=>'form-control','placeholder'=>'Max 30 Character')) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('content','Insert Content',array('class'=>'control-label col-sm-2')) !!}
				<div class="col-sm-10">
					{!! Form::textarea('content','',array('class'=>'form-control')) !!}
				</div>
			</div>
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			{!! Form::submit('Create',array('class'=>'btn btn-block btn-success'))!!}
			</div>
			</div>
			{!! Form::close() !!}
		</div>
		@include('templates.footer')