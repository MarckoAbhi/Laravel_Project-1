@extends('layout.app')
@section('main')
<div class="container">
  <h1>Product</h1>
  <div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="text-right">

    <a class="btn btn-success mt-4 mb-4" style="float:right" href="product/create"> New Products</a>
  </div>
  </div>

  <table class="table table-striped ">
    <thead>
      <tr>
        <th>S.no.</th>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
  </div>
    <tbody>
      @foreach ($product as $product)
      <tr>
        <td>{{ $loop->index+1}}</td>
        <td><a href="product/{{ $product->id}}/show"
           class="text-dark"> {{ $product->name }}</a></td>
        <td>
          <img src="product/{{$product->image}}" class="rounded-circle" width="30" height="30" />
        </td>
        <td>
          <a href="product/{{$product->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
          <form  method='POST' class="d-inline" action="product/{{$product->id}}/delete">
          @csrf
          @method('Delete')
          <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure?')">Delete</button>


          </form>
          
        </td>
      </tr>
      @endforeach
    </tbody>

</div>
  </table>
@endsection