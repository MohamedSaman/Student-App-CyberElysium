<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="container">
        @if (session()->has( 'message' ))
            <div class="alert alert-success">
               {{ session()->get('message') }} 
            </div>
        @endif
       
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <strong>Student List</strong>
                        <a href="{{route('Student.create')}}" class="btn btn-primary btn-xs float-end py-0">Create Student</a>
                        <table class="table table-responsive table-bordered table-stripped" style="margin-top:10px;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Age</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Students as $key =>$Student)
                                    
                               
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$Student->name}}</td>
                                    <td><img src="/images/{{$Student->image}}" alt="image" width="50" srcset=""></td>
                                    <td>{{$Student->age}}</td>
                                    <td><span type="button" class="btn  {{$Student->is_active == 1?'btn-success':'btn-danger'}} btn-xs py-0">{{$Student->is_active == 1?'Active':'Inactive'}}</span></td>
                                    <td>
                                    <div class="btn-group d-flex">    
                                    <a href="{{route('Student.show',$Student->id)}}" class="btn btn-primary btn-xs  py-0 my-0" style="border-radius: 5px;">Show</a>
                                        <a href="{{route('Student.edit',$Student->id)}}" class="btn btn-warning mx-1 btn-xs py-0 my-0" style="border-radius: 5px;">Edit</a> 
                                 
                                        <form action="{{ route('Student.destroy', $Student->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-xs py-0 my-0">Delete</button>
    </form>                                        </div>            
                                </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    {{ $Students->links( "pagination::bootstrap-5") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</x-app-layout>
