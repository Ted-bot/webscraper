<x-app>

    @section('content')

        <section class="container">

            <h1 class="text-center">Scraped AH Products</h1>

            <section class="row">

                @if($ah_products->hasPages())
                    @foreach($ah_products as $item)

                        @if(isset($item->product_name))

                            <div class="card flex" style="width: 18rem;">
                                <img class="card-img-top" src="{{ $item->product_image }}" alt="Card image cap">
                                <span class="pl-4 font-weight-light text-secondary">{{ $item->product_size }}</span>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->product_name }}</h5>
                                    <p class="card-text">€ {{ $item->product_price }}</p>
                                    <span class="card-text fw-lighter badge badge-info">{{ !($item->product_promotion === 'no Promotion') ? $item->product_promotion : '' }}</span>
                                    <a href="{{ $item->product_link }}" class="btn btn-primary">view Details</a>
                                </div>
                            </div>

                        @endif
                    @endforeach

                    <div class="pagination-wrapper">
                        {{ $ah_products->links() }}
                    </div>
                @endif
        @endsection
    </section>
</x-app>
