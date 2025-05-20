<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Projects – CRUD Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-light" href="/">Projects</a>
    </li>
  </ul>

</nav>
    <div class="container ">
        <div class="text-right"> 
            <a href="products/create" class="btn btn-dark mt-2">New Projct</a>
        </div>
      <table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Description</th>
            <th>Project URL</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->{'Project Title'} }}</td>
            <td>{{ $product->{'Description'} }}</td>
            <td><a href="{{ $product->{'Project URL'} }}" target="_blank">{{ $product->{'Project URL'} }}</a></td>
            <td>
                <img src="{{ asset('products/' . $product->{'Image'}) }}" class="rounded-circle" width="50" height="50"/>
            </td>
            <td>{{ $product->{'Status'} }}</td>
            <td>
                <div class="d-flex flex-row gap-2" style="width: 150px;">
  <a href="products/{{$product->id}}/edit" class="btn btn-dark btn-sm flex-fill">Edit</a>
  <a href="products/{{$product->id}}/delete" class="btn btn-dark btn-sm flex-fill">Delete</a>
</div
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</body>
</html>