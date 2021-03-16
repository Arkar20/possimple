@extends('admin.layouts.main')

@section('content')
          <div class="container">

     <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Items</h6>
                </div>
                <div class="card-body">
                  <form action="{{route('item.update',[$item->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                   <div class="form-group">
                      <label for="exampleInputEmail1">Item Name</label>
                    <input type="text" class="form-control" name="name" value="{{$item->name}}">
                      @error('name')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Item Image</label>
                      <img src="{{asset('storage/items/img/'.$item->image.' ')}}" width="100px" alt="">
                    {{-- <img src="{{asset('storage/items/img/'.$item->image.' ')}}" alt=""> --}}
                      <input type="file" class="form-control" name="img" value="{{$item->image}}">
                      @error('img')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Item Price</label>
                    <input type="number" class="form-control" name="price" value="{{$item->price}}">
                      @error('price')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Item Description</label>
                    <textarea class="form-control" name="textdesc" id="textdesc">
                      {{$item->desc}}
                    </textarea>
                      @error('textdesc')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Item Addition Information</label>
                    <textarea class="form-control" name="add_info" id="addinfo">
                      {{$item->additional_info}}
                    </textarea>
                      @error('add_info')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Brand</label>
                      <select name="brand_id" class="form-control">
                        <option value="">Select Brand</option>
                      @foreach (App\Brand::all() as $brand)
                          
                          <option value="{{$brand->id}}" >{{$brand->brand}}</option>  

                      @endforeach
                      </select>      
                      @error('brand_id')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Category</label>
                      <select name="category_id" class="form-control">
                     <option value="">SElECT Category</option>
                      </select>      
                      @error('category_id')
                          <small class="text-danger">{{$message}}</small> 
                      @enderror
                    </div>
                 
                   
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
          </div>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
          <script>
            $('documment').ready(function(){
                $('select[name="brand_id"]').on('change',function(){
                   var brand_id=$(this).val();
                   $.ajax({
                     url:'/brand/'+brand_id,
                     method:'GET',
                     datatype:'JSON',
                    success:function(data){

                      
                      $('select[name="category_id"]').empty();
                      $.each(data,function(key,value)
                      {
                        // console.log(key);
                        console.log(value);
                        $('select[name="category_id"]').append('<option value=" '+value["id"]+' ">'+value["name"]+'</option>')
                      })

                    }
                   })
                })
            })
          </script>
@endsection