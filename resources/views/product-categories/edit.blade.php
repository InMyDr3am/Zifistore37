<x-layout>
    <h3 class="page-title">Edit Data Buyer</h3>
    <div class="mb-2 align-items-center">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row mt-1 align-items-center">
                    <div class="col-12 text-left pl-4">
                        <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif  
                            <form action="{{ route('buyers.update', $buyer->id) }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <div class="input-group">
                                                    {{-- <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fe-user"></i>
                                                        </span>
                                                    </div> --}}
                                                    <input type="text" name="name" class="form-control" value="{{ $buyer->name }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <div class="input-group">
                                                    {{-- <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-phone"></i>
                                                        </span>
                                                    </div> --}}
                                                    <input type="text" name="phone" class="form-control" value="{{ $buyer->phone }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <div class="input-group mb-3">
                                                    {{-- <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fa-location-dot"></i>
                                                        </span>
                                                    </div> --}}
                                                    <textarea class="form-control" rows="3" name="address" required>{{ $buyer->address }}</textarea>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-primary mt-2 float-right">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>