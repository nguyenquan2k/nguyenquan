@extends('admin.layouts.app')
{{-- @yield('title','create') --}}
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Create new a product</h1>
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

<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

{{-- 'title' => $this->faker->text(100),
'slug' => Str::slug($this->faker->unique()->text(100)),
'price' => $this->faker->numerify(),
'quantity' => $this->faker->numberBetween(1, 1000),
'sale_off' => $this->faker->numerify(),
'user_id' => 1,
'category_id' => rand(1, 7), --}}

<h2>Section title</h2>
<form action="{{route('admin.store')}}" method="POST">
  {{-- @method('store') --}}
  @csrf
  <div class="input-group input-group-sm mb-3">
    <span class="input-group-text" id="inputGroup-sizing-sm">title</span>
    <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
  </div>
  <div class="input-group input-group-sm mb-3">
    <span class="input-group-text" id="inputGroup-sizing-sm">slug</span>
    <input type="text" name="slug" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
  </div>
  <div class="input-group input-group-sm mb-3">
    <span class="input-group-text" id="inputGroup-sizing-sm">price</span>
    <input type="number" name="price" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
  </div>
  <div class="input-group input-group-sm mb-3">
    <span class="input-group-text" id="inputGroup-sizing-sm">quantity</span>
    <input type="number" name="quantity" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
  </div>
  <div class="input-group input-group-sm mb-3">
    <span class="input-group-text" id="inputGroup-sizing-sm">sale_off</span>
    <input type="number" name="sale_off" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
  </div>
  <div class="input-group input-group-sm mb-3">
    <span class="input-group-text" id="inputGroup-sizing-sm">user_id</span>
    <input type="number" name="user_id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
  </div>
  <div class="input-group input-group-sm mb-3">
    <span class="input-group-text" id="inputGroup-sizing-sm">category_id</span>
    <input type="number" name="category_id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Slug</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->title}}</td>
              <td>{{$product->slug}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->quantity}}</td>
              <td>
                {{-- {{route('admin.remove')}} --}}
                <form action="{{route('admin.destroy',$product->id)}}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{$product->id}}">
                  <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
                {{-- <a href="{{route('admin.remove')/{$product->id}}}" class="btn">Xóa</a> --}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection