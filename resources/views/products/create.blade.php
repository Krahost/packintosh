<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>create products</title>
</head>

<body>
  <h1>Create</h1>
    <div>
    @if ($errors ->any() )
      
  <ul> 
    @foreach ($errors -> all() as $error)

    <li>{{$error}} </li>
        
    @endforeach
  </ul>
    @endif
    </div>
  <form   action="{{ route('product.store') }}" method="post">
    @csrf
    @method('post')

    <div>
      <label>Name</label>
      <input type="text" name="name" placeholder="Name" value="" />
    </div>
    <div>
      <label>Quantity</label>
      <input type="text" name="qty" placeholder="Quantity" value="" />
    </div>
    <div>
      <label>Price</label>
      <input type="text" name="price" placeholder="Price" value="" />
    </div>
    <div>
      <label>Description</label>
      <input type="text" name="description" placeholder="Description" value="" />
    </div>
    <div>
      <input type="submit" value='submit'/>
    </div>
  </form>
</body>

</html>