<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style type="text/css">
.success-msg {
  color: #270;
  background-color: #DFF2BF;
}
  </style>
</head>

<body>
  <h1>Products</h1>
  <div class="success-msg">
    <i class="fa fa-check"></i>
@if(session()->has('success'))

<div> 
{{ session('success')}}
</div>

@endif

  </div>
  <div>
    <a href="{{ route("product.create") }}" >Create Product</a>
  </div>
  <div>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
      @foreach($products as $product)
       <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>${{$product->price}}</td>
        <td>{{$product->qty}}</td>
        <td>{{$product->description}}</td>
        <td> <ul>
          <li><a href="{{route('product.edit', ['product' => $product])}}">Edit</a> </li>
         <li> 
          <form  action="{{ route('product.destroy',['product' => $product]) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" />
          </form>
        </li>
       </ul>
        </td>
       </tr>
       @endforeach
    </table>
  </div>
</body>

</html>