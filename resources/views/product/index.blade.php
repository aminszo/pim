<x-app-layout title="لیست محصولات">
    <div class="container px-lg-5 mt-4">

        <div class="row row-cols-1 row-cols-lg-2 gx-3">

            @foreach ($products as $product)
            <div class="col">
                <div class="row mx-0 product-item">
                    <div class="col-7 py-2">
                        <!-- Right Area -->

                        <div class="d-flex flex-column h-100">

                            <h4 class="product-title">
                                <a href="{{ route('products.show', ['id' => $product->id]) }}" class="no-link">
                                    {{ $product->name }}
                                </a>
                            </h4>

                            <div class="product-description"></div>

                            <div class="mt-auto d-flex flex-row justify-content-between">
                                <div
                                    class="stock-badge {{ $product->stock_status == 'in-stock' ? 'in-stock' : 'out-of-stock' }}">
                                    {{ $product->stock_status == 'in-stock' ? 'موجود' : 'ناموجود' }}
                                </div>
                                <div class="">{{ number_format($product->price, 0, '.', '،') }} تومن
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-5 p-0 product-image position-relative">
                        <!-- Left Area -->

                        <!-- Product Code Text -->
                        <div class="position-absolute product-code top-0 end-0 rounded-circle">
                            <span class="text-muted">{{ $product->code }}</span>
                        </div>

                        <!-- Main Image -->
                        @if ($product->image_path)
                        <img src="{{ asset('/images/products/' . $product->image_path) }}" class="img-fluid"
                            alt="Product Image">
                        @else
                        <!-- Placeholder Image -->
                        <img src="https://placehold.co/400" class="img-fluid" alt="Placeholder Image">
                        @endif
                    </div>

                </div>
            </div>
            @endforeach

        </div>

        {{ $products->links()}}

        <script>
        // keep scroll position of the page
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
        </script>

    </div>
</x-app-layout>