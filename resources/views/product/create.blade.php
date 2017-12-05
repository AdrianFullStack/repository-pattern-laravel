<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Products</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">
				@if( isset($data) )
				Edit Product - {{ $data->product }}
				@else
				Create New Product
				@endif
			</h1>
			<div class="row">
				<a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					@if( isset($data) )
					<form class="form" action="{{ route('products.update', $data->id) }}" method="POST">
						<input name="_method" type="hidden" value="PUT">
						<input name="id"      type="hidden" value="{{ $data->id }}">
					@else
					<form class="form" action="{{ route('products.store') }}" method="POST">
					@endif
						{{ csrf_field() }}
						<div class="form-group">
							<label>CODE</label>
							<input type="text" name="code" class="form-control" value="{{ isset($data) ? $data->code : '' }}">
						</div>
						<div class="form-group">
							<label>Product</label>
							<input type="text" name="product" class="form-control" value="{{ isset($data) ? $data->product : '' }}">
						</div>
						<div class="form-group">
							<label>PRICE</label>
							<input type="text" name="price" class="form-control" value="{{ isset($data) ? $data->price : '' }}">
						</div>
						<div class="form-group">
							<label>STATE</label>
							<select name="state" class="form-control">
								<option value="1" {{ isset($data) && $data->state === 1 ? 'selected' : '' }}>Active</option>
								<option value="0" {{ isset($data) && $data->state === 0 ? 'selected' : '' }}>Inactive</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success btn-block btn-lg">SAVE</button>
					</form>
				</div>
			</div>
		</div>	
	</body>
</html>