<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <p style="font-size:20px; font-weight:bold;">Update Student</p>
                <form action="{{ route('Student.update', $Student->id) }}" method="POST" enctype="multipart/form-data"> 
                    @csrf  
                  @method('put') 
                    
                <div class="form-group has-validation">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$Student->name}}" required> 
                        <span class="invalid-feedback">
                            <strong>Error</strong>
                        </span>
                    </div>
                    <div class="form-group has-validation">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                        <img src="/images/{{$Student->image}}" alt="image" width="100" srcset="">
                        <span class="invalid-feedback">
                            <strong>Error</strong>
                        </span>
                    </div>
                    <div class="form-group has-validation   ">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control" value="{{$Student->age}}" required>
                        <span class="invalid-feedback">
                            <strong>Error</strong>
                        </span>
                    </div>

                    <div class="form-group has-validation">
                        <label for="is_active">Active</label><br>
                         <input type="checkbox" name="is_active" id="is_active" value="1" {{ $Student->is_active == '1' ? 'checked' : '' }}>
                          <span class="invalid-feedback">
                             <!-- Error message if needed -->
                          </span>
                    </div>

                    <button type="submit" class="btn btn-primary">Student Student</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>