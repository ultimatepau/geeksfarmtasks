@include('templates.header')
@include('templates.navbar')
<div class="container">
	<div class="row">
		<div class="col-lg-5 col-lg-offset-3">
			@include('feedback')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5 col-lg-offset-3 well">
		<legend class="text-center">Login Form</legend>
			{!! Form::open(['route'=>'login','class'=>'form-horizontal','role'=>'form']) !!}
			<div class="form-group">
				{!! Form::label('email','Email',array('class'=>'col-lg-2 control-label')) !!}
				<div class="col-lg-10">
					{!! Form::email('email',null,array('class'=>'form-control')) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('password','Password',array('class'=>'col-lg-2 control-label')) !!}
				<div class="col-lg-10">
					{!! Form::password('password',array('class'=>'form-control')) !!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					{!! Form::submit('Login',array('class'=>'btn btn-success')) !!}
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5 col-lg-offset-3 well">
			<a href="{{ asset('signup') }}" class=" btn-block btn btn-info">Dont have account? Sign Up now !</a>
		</div>
	</div>
</div>
@include('templates.footer')