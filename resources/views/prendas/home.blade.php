@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="mb-4 text-center">🛍️ Tienda</h1>

    <!-- 🔍 FILTROS -->
    <div class="row mb-4">

        <!-- BUSCADOR -->
        <div class="col-md-4">
            <input type="text" id="search" class="form-control" placeholder="Buscar producto...">
        </div>

        <!-- CATEGORÍAS -->
        <div class="col-md-4">
            <select id="categoryFilter" class="form-control">
                <option value="">Todas las categorías</option>
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">
                        {{ $category['name'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- PRECIO -->
        <div class="col-md-4">
            <select id="priceFilter" class="form-control">
                <option value="">Todos los precios</option>
                <option value="low">Menor a $50</option>
                <option value="mid">$50 - $100</option>
                <option value="high">Mayor a $100</option>
            </select>
        </div>

    </div>

    <!-- 🧱 PRODUCTOS -->
    <div class="row" id="productsContainer">
        @foreach($products as $product)
            <div class="col-md-3 mb-4 product-card"
                 data-title="{{ strtolower($product['title']) }}"
                 data-category="{{ $product['category']['id'] }}"
                 data-price="{{ $product['price'] }}">

                <div class="card h-100 shadow-sm">

                    <img src="{{ $product['images'][0] ?? 'https://via.placeholder.com/200' }}"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;">

                    <div class="card-body">
                        <h6>{{ $product['title'] }}</h6>
                        <p class="text-success fw-bold">${{ $product['price'] }}</p>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>

<!-- ⚡ SCRIPT FILTROS -->
<script>
    const searchInput = document.getElementById('search');
    const categoryFilter = document.getElementById('categoryFilter');
    const priceFilter = document.getElementById('priceFilter');
    const products = document.querySelectorAll('.product-card');

    function filterProducts() {
        let search = searchInput.value.toLowerCase();
        let category = categoryFilter.value;
        let price = priceFilter.value;

        products.forEach(product => {
            let title = product.dataset.title;
            let productCategory = product.dataset.category;
            let productPrice = parseFloat(product.dataset.price);

            let show = true;

            // 🔍 FILTRO BUSCADOR
            if (search && !title.includes(search)) {
                show = false;
            }

            // 📂 FILTRO CATEGORÍA
            if (category && category != productCategory) {
                show = false;
            }

            // 💰 FILTRO PRECIO
            if (price === 'low' && productPrice >= 50) show = false;
            if (price === 'mid' && (productPrice < 50 || productPrice > 100)) show = false;
            if (price === 'high' && productPrice <= 100) show = false;

            product.style.display = show ? 'block' : 'none';
        });
    }

    searchInput.addEventListener('keyup', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);
    priceFilter.addEventListener('change', filterProducts);
</script>

@endsection