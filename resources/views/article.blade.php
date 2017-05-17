@include('templates.header')
	<body>
		<h1 class="text-center">Task 3 Laravel</h1>
		<div class="container">
		@include('feedback')
		</div>
		<div class="container well wel-sm">
			<div class="row">
				<div class="col-md-12 ">
				{!! Form::open(['route'=>'article.store','method'=>'post','role'=>'form','class'=>'form-inline','enctype'=>'multipart/form-data']) !!}
				
					<div class="form-group">
						<label class="sr-only" for="">Title</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Input Title">
					</div>	
					
					<div class="form-group">
						<label class="sr-only" for="">File</label>
						<input type="file" class="form-control" id="foto" name="foto">
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="container well well-sm">
				<div class="grid">
				<?php $i = 0;?>
				@foreach($result as $item)
					
					<div class="grid-item">
						<img src="{{ asset('/uploads/thumb/'.$item->path) }}" alt="" style="margin-top:10px;width: 200px;" onclick="document.getElementById('modal0{{$i}}').style.display='block'">
						<br>
						<p class="lead" style="padding-left: 10px;padding-top: 5px;">
							{{ $item->title }}
						</p>
						<div class="col-lg-12 ">
						{!! Form::open(['route' => array('article.edit',$item->id),'method' => 'get','role' => 'form','class' => 'frm']) !!}
						{!! Form::submit('Update',array('class' => 'btn col-lg-6 btn-info')) !!}
						{!! Form::close() !!}

						{!! Form::open(['route' => array('article.destroy',$item->id),'method' => 'delete','role' => 'form']) !!}
						{!! Form::submit('Delete',array('class' => 'btn col-lg-6 btn-danger')) !!}
						{!! Form::close() !!}
						</div>
					</div>
					<div id="modal0{{$i}}" class="w3-modal" onclick="this.style.display='none'">
					    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
					    <div class="w3-modal-content w3-animate-zoom" style="width:300px;">
					      	<img src="{{ asset('/uploads/cropped/'.$item->path) }}" style="width:100%;">
					    </div>
					</div>
					<?php $i++;?>
				@endforeach
				</div>
			
		</div>
		@include('templates.footer')