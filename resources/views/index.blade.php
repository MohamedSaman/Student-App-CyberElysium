<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-secondary">
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joining Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Students as $key =>$Student)
                                    
                               
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$Student->name}}</td>
                                    <td>{{$Student->email}}</td>
                                    <td>{{$Student->joining_date}}</td>
                                    <td><span type="button" class="btn  {{$Student->is_active == 1?'btn-success':'btn-danger'}} btn-xs py-0">{{$Student->is_active == 1?'Active':'Inactive'}}</span></td>
                                    <td>
                                    <div class="btn-group d-flex">    
                                    <a href="{{route('Student.show',$Student->id)}}" class="btn btn-primary btn-xs  py-0 my-0">Show</a>
                                        <a href="{{route('Student.edit',$Student->id)}}" class="btn btn-warning mx-1 btn-xs py-0 my-0">Edit</a> 
                                 
                                           <button type="submit" class="btn btn-danger btn-xs py-0 my-0">Delete</button>
                                        </div>            
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>