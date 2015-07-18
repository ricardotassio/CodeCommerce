@extends('./app')
@section('content')
    <div class="container">
        <h1>Product Create</h1>
        @if ($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>['products.update',$products->id],'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',$products->name,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category_id',$categories, $products->category->id,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description',$products->description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price',$products->price,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('featured', 'Featured:') !!}
            {!! Form::checkbox('featured',1,($products->featured?true:false)) !!}
        </div>
        <div class="form-group">
            {!! Form::label('recommend', 'Recommend?') !!}<br/>
            {!! Form::radio('recommend',1,($products->featured?true:false),['class'=>'field']) !!} Yes
            {!! Form::radio('recommend',0,($products->featured?true:false),['class'=>'field']) !!} No
        </div>
        <div class="form-group">
            {!! Form::submit('Add Category',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection