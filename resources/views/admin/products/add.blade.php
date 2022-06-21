@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>

                <div class="card-body">
                    <form action="{{route('store-Product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
                      </div>

                      <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="number" class="form-control" placeholder="Enter price" id="price" name="price">
                      </div>
                      
                       <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea class="form-control" name="description"></textarea>
                       </div>

                       <div class="form-group">
                        <label for="image">Image :</label>
                        <input type="file" class="form-control" id="image" name="image">
                      </div>
                     
                      
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
