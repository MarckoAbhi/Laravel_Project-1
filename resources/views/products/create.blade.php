@extends('layout.app')
@section('main')
<div class="container">
<div class="text-right">
    <a class="btn btn-primary mt-2" href="/">Back</a>
  </div>
    <div class='container'>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form method="POST" action="/product/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"
                            value="{{old('name')}}" />
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="4" name="description">{{
                               old('description')}} </textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif

                        </div>
                        <div class="form-group" method='post'>
                            <label>Image</label>
                            <input type="file" name="image" class="form-control"
                            value="{{old('image')}}" />
                            @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}
                            </span>
                            @endif


                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </form>

                </div>


            </div>
        </div>
    </div>

@endsection