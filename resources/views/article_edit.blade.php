@include('templates.header')
<h1 class="text-center">Task 3 Laravel</h1>
<h2 class="text-center">Update Data {{ $result->title }}</h2>
<div class="container well wel-sm">
			<div class="row">
				<div class="col-md-12 ">
				{!! Form::open(['route'=>array('article.update',$result->id),'method'=>'patch','role'=>'form','class'=>'form-inline','enctype'=>'multipart/form-data']) !!}
				
					<div class="form-group">
						<label class="sr-only" for="">Title</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Input Title">
					</div>	
					
					<div class="form-group">
						<label class="sr-only" for="">File</label>
						<input type="file" id="foto" name="foto">
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				{!! Form::close() !!}
				</div>
			</div>
		</div>
		@include('templates.footer')