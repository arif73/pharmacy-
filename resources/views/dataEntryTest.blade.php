
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 100px;">
     <form action="{{route('store')}}" enctype="multipart/form-data" method="post">
          {{csrf_field()}}
          @if(session()->has('successfull'))
                    <div class="alert alert-success">
                       {{ session('successfull') }}
                    </div>
                    @endif
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="Name" name="name">
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="role">Role:</label>
          <select class="form-control" id="role" name="role">
              <option>admin</option>
              <option>manager</option>
              <option>salesman</option>
          </select>
        </div>
        <div class="form-group">
          <label for="file">Photo:</label>
          <input type="file" class="form-control" id="file" name="file">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" name="password">
        </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

</body>
</html>
