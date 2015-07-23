
<h1>Product</h1>
<ul>
    @foreach($product as $product)
        <li>{{ $product->name }} </br>
        {{ $product->description }} </br>
        {{ $product->price }}</li>
    @endforeach
</ul>

