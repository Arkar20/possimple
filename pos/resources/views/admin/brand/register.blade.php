@extends('admin.layouts.main')

@section('content')
          <div class="container">

     <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Brand Registration</h6>
                </div>
                <div class="card-body">
                  <form action="{{route('brand.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Brand Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="brand" aria-describedby="emailHelp"
                        placeholder="Enter brand" value="{{old('brand')}}">
                      @error('brand')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Company</label>
                      <input type="text" class="form-control" name="company" value="{{old('brand')}}" id="exampleInputPassword1" placeholder="company">
                     @error('company')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea type="text" class="form-control" name="desc" id="exampleInputPassword1" >

                      </textarea>
                       @error('desc')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                   
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
          </div>
@endsection