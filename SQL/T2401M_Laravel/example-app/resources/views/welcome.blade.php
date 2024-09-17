@extends("layout")
@section("main")
<div class="container">
    <h1>Home page</h1>
    <div class="row">
        <aside class="col-3">
            <ul class="list-group">
                @foreach($categories as $item)
                <li class="list-group-item"><a href="#">{{$item["name"]}}</a></li>     
                @endforeach     
            </ul>
        </aside>
        <div class="col">
            <div class="row">
                @foreach ($products as $item)
                <div class="col-4">
                    <div class="card mt-3 mb-3">
                        <img src="{{$item->thumbnail}}" class="w-100 card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">{{$item->price}}</p>
                            <a href="#" class="btn btn-primary">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {!! $products->links("pagination::bootstrap-4") !!}
        </div>
    </div>
</div>
@endsection