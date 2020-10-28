<div class="container">

    <div class="row">

        <div class="col-lg-8 col-md-12">
            <div class="row">
                @if($products->count() > 0)
                    @foreach($products as $product)
                    <div class="col-md-6 col-sm-12">
                        <div class="card h-100">
                            <div class="single-product product-style-1">



                                <div class="product-info">

                                    <h4 class="title"><a href="{{ route('product.details',$product->name) }}"><b>{{ $product->title }}</b></a></h4>

                                  

                                </div><!-- blog-info -->
                            </div><!-- single-product -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforeach
                @else
                    <div class="col-md-6 col-sm-12">
                        <div class="card h-100">
                            <div class="single-product product-style-1">
                                <div class="blog-info">
                                    <h4 class="title">
                                        <strong>Sorry, No product found :(</strong>
                                    </h4>
                                </div><!-- blog-info -->
                            </div><!-- single-product -->
                        </div><!-- card -->
                    </div><!-- col-md-6 col-sm-12 -->
                @endif

            </div><!-- row -->

            {{--<a class="load-more-btn" href="#"><b>LOAD MORE</b></a>--}}

        </div><!-- col-lg-8 col-md-12 -->
