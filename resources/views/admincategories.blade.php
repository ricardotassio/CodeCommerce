<h1>Category List</h1>
@foreach($categories as $category)
    <li>{{ $category->name }}</li>
@endforeach