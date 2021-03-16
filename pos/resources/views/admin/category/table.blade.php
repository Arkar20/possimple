@extends('admin.layouts.main')


@section('content')
     <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id='brandtable'>
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>Category</th>
                        
                        <th>Created At</th>
                        <th>Modified At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index=>$category)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$category->name}}</td>
                                
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                                <td>
                                    <a href="{{route('category.edit',[$category->id])}}" class="btn btn-primary"> Update</a>
                         <form id="brandsubmit"
                         action="{{route('category.destroy',[$category->id])}}"
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
