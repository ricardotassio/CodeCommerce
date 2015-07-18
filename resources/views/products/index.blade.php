@extends('./app')
@section('content')
    <div class="container">
    <h1>Products</h1>
    <br/><br/>
    <a href="{{route('products.create')}}" class="btn btn-primary">New Product</a>
    <br/><br/>
    <table class="table">
        <tr>

            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Featured</th>
            <th>Recommended</th>
            <th>Action</th>
        </tr>
    @foreach($products as $product)

            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ ($product->featured?'Yes':'No') }}</td>
                <td>{{ ($product->recommend?'Yes':'No') }}</td>
                <td>
                    <a href="{{route('products.edit',['id'=>$product->id])}}">Edit</a> |
                    <a href="{{route('products.destroy',['id'=>$product->id])}}">Delete</a>
                </td>
            </tr>
    @endforeach
    </table>
        {!! $products->render() !!}
</div>
@endsection