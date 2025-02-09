<x-layout>
    {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}
    <h1 class="page-title">Data Buyers</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('buyers.create') }}" class="btn btn-md btn-success mb-3">ADD BUYER</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($buyers as $buyer)
                                @include('buyers.m-edit')
                                @include('buyers.m-delete')
                                <tr>
                                    {{-- <td class="text-center">
                                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                                    </td> --}}
                                    <td>{{ $buyer->name }}</td>
                                    <td>{{ $buyer->phone }}</td>
                                    <td>{{ $buyer->address }}</td>
                                    <td class="text-center">
                                        {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('buyers.destroy', $buyer->id) }}" method="POST">
                                            <a href="{{ route('buyers.show', $buyer->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('buyers.edit', $buyer->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                        </form> --}}
                                        <button class="btn btn-danger btn-sm" title="Hapus Data" 
                                            data-toggle="modal" data-target="#modal-deleteBuyer{{ $buyer->id }}"> 
                                            <i class="fas fa-regular fa-trash"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm" title="Edit Data"
                                            data-toggle="modal" data-target="#modal-editBuyer{{ $buyer->id }}">
                                            <i class="fas fa-duotone fa-pen"></i>
                                        </button>
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