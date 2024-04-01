<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-secondary mt-2">
    <div class="container">
    <!-- @if ($errors->any() )
        @foreach ($errors->all() as $error )
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif -->
    <div class="card">
            <div class="card-body">
                <p style="font-size:20px; font-weight:bold;">Create New Student</p>
                <form action="{{ route('Student.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group has-validation mt-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{old('name')}}">
                        @if($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                        
                    </div>
                    <div class="form-group has-validation">
                     <label for="image">Image</label>
                     <input type="file" name="image" id="image" class="form-control" required>
                       @error('image')
                      <span class="invalid-feedback">
                      <strong>{{ $errors->first('image') }}</strong>
                     </span>
                        @enderror
                    </div>

                    <div class="form-group has-validation">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control" value="{{old('age')}}" required>
                        @if($errors->has('age'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                        @endif
                    </div>
                   
                    <div class="form-group has-validation">
                      <label for="is_active">Active</label><br>
                      <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') == '1' ? 'checked' : '' }}>
                     @if($errors->has('is_active'))
                     <span class="invalid-feedback">
                     <strong>{{ $errors->first('is_active') }}</strong>
                        </span>  
                       @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Create Student</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


