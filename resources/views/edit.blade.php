<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ProductDesk</title>
</head>
<body>
   
<nav class="nav bg-dark">
  <a class="nav-link active text-light" style="font-size:30px;" href="/">Product_Desk</a>
</nav>
@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong>{{$message}}</strong>
</div>
@endif
<div class="container">
    <div class="my-5 mx-3 text-center">
        <h3>Update Product:</h1>
    </div>
    <h3 class="text-center my-3">Product Edit# {{$product->id}}</h3>
    <div class="row justify-content-center">
        <div class="column col-8">
            <form method="POST" action="/update/{{$product->id}}" enctype="multipart/form-data" >
                @csrf
                
                <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" class="form-control" id="title" name="name" placeholder="abc" value="{{old('name', $product->name)}}"
                    >
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1"  name="description" rows="3">{{old('description', $product->description)}}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" value="{{old('image')}}">
                    @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
   
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>