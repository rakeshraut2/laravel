<!DOCTYPE html>
<html>
<head>
	<title>addproduct</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<h1 class="mb-2">Add Product Form</h1>
		@if(Session::has('msg'))
		<div class="alert alert-success">
			{{Session::get('msg')}}
		</div>
		@endif
		<form method="post" enctype="multipart/form-data" action="{{route('storeproduct')}}">@csrf
			<div class="col-md-6">
				<label for="product name">Product name</label><br>
				<input type="text" class="form control" name="pname" placeholder="enter productname" id="inputproductname">
			</div>
		</div>

		<div class="col-md-6">
				<label for="price name">Product price</label><br>
				<input type="number" class="form control" name="price">
			</div>
		</div>

		<div class="col-md-6">
				<label for="Quantity">Product Quantity</label><br>
				<input type="number" class="form control" name="quantity">
			</div>
		</div>

		<div class="col-md-6">
				<label for="description">Description</label><br>
				<textarea  name="description" class="form control"></textarea>
			</div>
		</div>

		<div class="col-md-6">
				<label for="image">Product image</label><br>
				<input type="file" name="image" class="form control">
			</div>
		</div>
        
        <div class="col-md-6">
				<button type="submit" class="btn btn-primary">add Product</button>
				
			</div>
		</div>		
	</div>

</body>
</html>
<!-- post vaneko security high hunxa
image ko file read garna ko lagi -->
<!-- action = to insert data -->