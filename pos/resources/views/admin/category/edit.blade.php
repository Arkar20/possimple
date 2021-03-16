@extends('admin.layouts.main')

@section('content')
          <div class="container">

     <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Category Edit 
</h6>

                </div>
                <div class="card-body">
                  <form action="{{route('category.update',[$category->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                   
                    <div class="form-group">
                      <label for="exampleInputPassword1">Category</label>
                      <input type="text" class="form-control" name="category" value="{{$category->name}}"  >
                     @error('category')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror{{-- <datalist id="brand">
                            @foreach (App\Category::all() as $category)
                                    <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach    
                        </datalist>         --}}
                     
                    </div>
                 
                   
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
          </div>
@endsection