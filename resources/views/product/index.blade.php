<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<h1 class="text-center">List Products</h1>
		<div class="row">
			<a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a>
		</div>
		<hr>
		<div class="row">
			@if( Session::has('data_success') )
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Success!</strong> {{ Session::get('data_success') }}.
			</div>
			@endif
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th class="text-center">CODE</th>
						<th class="text-center">PRODUCT</th>
						<th class="text-center">PRICE</th>
						<th class="text-center">STATE</th>
						<th class="text-center">OPTIONS</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					<tr>
						<td class="text-center">{{ $product->code }}</td>
						<td>{{ $product->product }}</td>
						<td class="text-right">{{ $product->price }}</td>
						<td class="text-center">
							@if($product->state === 1)
							<label class="label label-success">Active</label>
							@else
							<label class="label label-danger">Inactive</label>
							@endif
						</td>
						<td class="text-center">
							<a href="{{ route('products.edit', $product->id) }}" class="btn btn-xs btn-info">Edit</a>
							<form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
								<input name="_method" type="hidden" value="DELETE">{{ csrf_field() }}
								<button type="submit" class="btn btn-xs btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>