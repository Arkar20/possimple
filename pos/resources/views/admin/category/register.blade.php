@extends('admin.layouts.main')

@section('content')
          <div class="container">

     <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Category Registration</h6>
                </div>
                <div class="card-body">
                  <form action="{{route('category.store')}}" method="POST">
                    @csrf
                   <div class="form-group">
                      <label for="exampleInputEmail1">Brand Name</label>
                     <select name="brand" class="form-control" id="">
                         <option value="">Select A Brand</option>
                         @foreach (App\Brand::all() as $brand)
                            <option value="{{$brand->id}}">{{$brand->brand}}</option>
                         @endforeach
                     </select>
                      @error('brand')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Category</label>
                      <input type="text" list="brand" class="form-control" name="name" value="{{old('category')}}" id="exampleInputPassword1" placeholder="company">
                        <datalist id="brand">
                            @foreach (App\Category::all() as $category)
                                    <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach    
                        </datalist>        
                      @error('name')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                 
                   
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
          </div>
@endsection