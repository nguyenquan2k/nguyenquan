@extends('admin.layouts.app')
{{-- @yield('title','create') --}}
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List product</h1>
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

    {{-- <h2>Section title</h2> --}}
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sale off</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->sale_off }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('admin.products.edit', $product->id)}}">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Preview</a></li>
                                    <li><a class="dropdown-item" href="{{route('product.show', [$product->id])}}">Publish</a></li>
                                    <li>
                                        <a class="dropdown-item delete" attr_id="{{$product->id}}" href="#">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $products->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection

@section('modal')
<div class="modal fade" id="deleleItem" aria-hidden="true" aria-labelledby="deleleItemToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="{{route('admin.products.delete')}}" method="post">
      @csrf
      @method('DELETE')
      <input type="hidden" id="del_id" name="item" value="0" />
      <div class="modal-header">
        <h5 class="modal-title" id="deleleItemToggleLabel">Product Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to want to deleted this product!
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" >Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('js')
<script type="text/javascript">
  var myModal = new bootstrap.Modal(document.getElementById('deleleItem'), {
    keyboard: false
  })
  $('.delete').click(function(){
      $id = $(this).attr('attr_id');
      $('#del_id').val($id);
      myModal.show();
  });
</script>
@stop
