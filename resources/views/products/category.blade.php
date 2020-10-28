<div class="row">
    @forelse($products as $product)
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="single-post post-style-1">

                      <h4 class="title"><a href="#"><b>{{ $product->name }}</b></a></h4>

                        

                    </div><!-- blog-info -->
                </div><!-- single-post -->
            </div><!-- card -->
   
    @endforelse