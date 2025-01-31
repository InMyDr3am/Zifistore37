<x-layout>
    {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}
    <h1 class="page-title">Let's start bro!</h1>
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Tutorial Laravel 11 untuk Pemula</h3>
                <h5 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h5>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('buyers.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">phone</th>
                                <th scope="col">address</th>
                               
                                <th scope="col" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($buyers as $buyer)
                                <tr>
                                    {{-- <td class="text-center">
                                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                                    </td> --}}
                                    <td>{{ $buyer->name }}</td>
                                    <td>{{ $buyer->phone }}</td>
                                    <td>{{ $buyer->address }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('buyers.destroy', $buyer->id) }}" method="POST">
                                            <a href="{{ route('buyers.show', $buyer->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('buyers.edit', $buyer->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Products belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $buyers->links() }} --}}
                </div>
            </div>
        </div>
    </div>
  </x-layout>