<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>

            </h2>
            <div class="text-center mt-3">
                <form action="{{ route('product.search') }}" method="get">
                    @csrf
                    <input type="text" name="search" class="text-black w-900px text-center" placeholder="Search Product">
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
            </div>

        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product.details',$product->id) }}" class="option1">
                                    Details
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{asset($product->image)}}" class="img-fluid" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$product->product_name}}
                            </h5>
                        </div>
                        <div class="detail-box">
                            @if($product->discount!=null)
                                <h5 class="text-success">
                                    Price:<h6 style="text-decoration: line-through;">${{$product->price}}</h6>
                                </h5>
                                <h5 class="text-warning">
                                    Discount:<h6>${{$product->discount}}</h6>
                                </h5>
                            @else
                                <h5 class="text-success">
                                    Price:<h6>S{{$product->price}}</h6>
                                </h5>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <span class="pt-4">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
        </div>
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
<!-- end product section -->
