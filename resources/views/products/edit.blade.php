@extends('layout.app')
@section('main')
<div class="text-right">
    <a class="btn btn-primary mt-2" href="/">Back</a>
  </div>
    <div class='container'>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h3>Product Edit #{{$product->name}}</h3>
                    <form method="POST" action="/product/{{$product->id}}/update" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"
                            value="{{old('name',$product->name)}}" />
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="4" name="description">{{
                               old('description',$product->description)}} </textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif

                        </div>
                        <div class="form-group" method='post'>
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" 
                            value="{{old( 'image',$product->image )}}"/>
                            @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}
                            </span>
                            @endif


                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>


            </div>
        </div>
    </div>

@endsection