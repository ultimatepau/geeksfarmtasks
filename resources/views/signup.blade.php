@include('templates.header')
@include('templates.navbar')
<div class="container">
@include('feedback')
<h1 class="text-center">
  Signup Form
</h1>
<hr />
{!! Form::open(['route'=>'signup.store','method'=>'post','class'=>'form-horizontal','role'=>'form']) !!}    
      <div class="form-group">
        {!! Form::label('first_name','First Name',array('class'=>'col-lg-3 control-label')) !!}
        <div class="col-lg-5">
        {!! Form::text('first_name',null,array('class'=>'form-control')) !!}
          <div class="text-danger">{{ $errors->first('first.name')}}</div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('last_name','Last Name',array('class'=>'col-lg-3 control-label')) !!}
        <div class="col-lg-5">
        {!! Form::text('last_name',null,array('class'=>'form-control')) !!}
          <div class="text-danger">{{ $errors->first('last.name')}}</div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('email','Email',array('class'=>'col-lg-3 control-label')) !!}
        <div class="col-lg-5">
        {!! Form::text('email',null,array('class'=>'form-control')) !!}
          <div class="text-danger">{{ $errors->first('email')}}</div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('password','Password',array('class'=>'col-lg-3 control-label')) !!}
        <div class="col-lg-5">
        {!! Form::password('password',array('class'=>'form-control')) !!}
          <div class="text-danger">{{ $errors->first('password')}}</div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('password_confirmation','Password Confirm',array('class'=>'col-lg-3 control-label')) !!}
        <div class="col-lg-5">
        {!! Form::password('password_confirmation',array('class'=>'form-control')) !!}
          <div class="text-danger">{{ $errors->first('password')}}</div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-5 col-lg-offset-3">
        {!! Form::submit('Signup',array('class'=>'btn btn-primary')) !!}
        </div>
      </div>
    {!! Form::close() !!}
    </div>
    @include('templates.footer')