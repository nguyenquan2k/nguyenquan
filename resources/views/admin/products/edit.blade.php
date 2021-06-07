@extends('admin.layouts.app')
{{-- @yield('title','create') --}}
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Edit product</h1>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
  </div>
  <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
    <span data-feather="calendar"></span>
    This week
  </button>
</div>
</div>

{{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

{{-- 'title' => $this->faker->text(100),
'slug' => Str::slug($this->faker->unique()->text(100)),
'price' => $this->faker->numerify(),
'quantity' => $this->faker->numberBetween(1, 1000),
'sale_off' => $this->faker->numerify(),
'user_id' => 1,
'category_id' => rand(1, 7), --}}
{{-- {{route('admin.products.create')}} --}}
<h2>Section title</h2>
<form action="{{route('admin.products.update',$pro->id)}}" method="POST">
  {{-- @method('store') --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <p>There is an errors of submit form, please see bellow!</p>
        </div>
    @endif
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" value="{{$pro->title}}" required="required" class="form-control @error('title') is-invalid @enderror" id="title">
    @error('title')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Category</label>
   
    <input type="text" name="category_id" value="{{$pro->category_id}}" class="form-control @error('category_id') is-invalid @enderror" id="category">
    @error('category_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    
    <input type="text" name="price" value="{{$pro->price}}" class="form-control @error('price') is-invalid @enderror" id="price">
    @error('price')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    
    <input type="text" name="quantity" value="{{$pro->quantity}}" class="form-control @error('quantity') is-invalid @enderror" id="quantity">
    @error('quantity')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="sale_off" class="form-label">Sale off</label>
    
    <input type="text" name="sale_off" value="{{$pro->sale_off}}" class="form-control @error('sale_off') is-invalid @enderror" id="sale_off">
    @error('sale_off')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
   
    <textarea type="text" name="description" class="form-control" id="description">{{$pro->description}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection