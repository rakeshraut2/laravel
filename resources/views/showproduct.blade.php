<!DOCTYPE html>
<html>
<head>
	<title>show product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- icon link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>
<body>
	<div class="container">
		<h1 class="text-info">show product</h1>
    @if(Session::has('msg'))
    <div class="alert alert-success">{{Session::get('msg')}}
    </div>
    @endif
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($showdata as $s)
    <tr>
        <td>{{$s->Product_name}}</td>
        <td>{{$s->Product_price}}</td>
        <td>{{$s->Product_Quantity}}</td>
        <td>{{$s->Product_description}}</td>
        <td><img src="{{asset('uploads/products')}}/{{$s->Product_image}}" width="150"></td>
        <td><a href="{{route('editproduct',$s->id)}}"><button class="btn btn-primary"><i class="bi bi-pencil-square text-white"></i></button></a>
        <a href="{{route('delete',$s->id)}}" onclick="return confirm('are you sure?')"><button class="btn btn-danger"><i class="bi bi-trash-fill text-white"></i></button></a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>	
	</div>

</body>
</html>