@extends('admin.layouts.main')


@section('content')
     <div class="table-responsive p-3">
     <table class="table align-items-center table-flush table-hover" id='itemtable'>
                    <thead class="thead-light">
                      <tr>
                        <th>Item Name</th>
                        <th>Image</th>
                        <th>Desc</th>
                        <th>Price($)</th>
                        <th>Additional Info</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Modified At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $index=>$item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td><img src="{{asset('storage/items/img/'.$item->image.' ')}}" alt=""></td>
                               <td>{!!$item->desc!!}</td>
                               <td>{{$item->price}}</td>
                               <td>{!!$item->additional_info!!}</td>
                               <td>{{$item->brands->brand}}</td>
                               <td>{{$item->categories->name}}</td>

                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <a href="">something</a>
                                    <a href="{{route('item.edit',[$item->id])}}" class="btn btn-primary"> Update</a>
                         <form id="brandsubmit"
                         action="{{route('item.destroy',[$item->id])}}"
                             method="POST"
                             onsubmit="return confirmation()"
                             >
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-danger"> Delete</button>
                                                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr class="text-center" aria-colspan="5">
                                <p>Empty</p>
                            </tr>
                        @endforelse

                     
                    </tbody>
                  </table>
                  <script>
function confirmation(){
    return confirm("Are you sure you want to delete?");
}
                  </script>
@endsection
