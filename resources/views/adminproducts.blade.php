
<h1>Products</h1>
<ul>
    @foreach($products as $product)
        <li>{{ $product->name }} </br>
        {{ $product->description }} </br>
        {{ $product->price }}</li>
    @endforeach
</ul>

