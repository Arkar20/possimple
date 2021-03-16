@extends('admin.layouts.main')


@section('content')
     <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id='brandtable'>
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>Size</th>
                        
                        <th>Created At</th>
                        <th>Modified At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($sizes as $index=>$size)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$size->size}}</td>
                                
                                <td>{{$size->created_at}}</td>
                                <td>{{$size->updated_at}}</td>
                                <td>
                                    <a href="{{route('size.edit',[$size->id])}}" class="btn btn-primary"> Update</a>
                         <form id="brandsubmit"
                         action="{{route('size.destroy',[$size->id])}}"
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
                  
@endsection
