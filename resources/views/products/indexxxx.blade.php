<x-layout>
    <h1 class="page-title">Data Produk</h1>
    <div class="mb-2 align-items-center">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row mt-1 align-items-center">
                    <div class="col-12 text-left pl-4">
                        <div class="card-body">
                            <a href="{{ route('products.create') }}" class="btn btn-success">Tambah Produk</a>
                            <hr>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pruk</th>
                                        <th>Kategori</th>
                                        <th>Merek</th>
                                        <th>Stok</th>
                                        <th>Harga Offline</th>
                                        <th>Harga Marketplace</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category ? $product->category->name : '-' }}</td>
                                        <td>{{ $product->brand ? $product->brand->name : '-' }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->offline_price }}</td>
                                        <td>{{ $product->marketplace_price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
