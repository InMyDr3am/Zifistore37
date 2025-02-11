<x-layout>
    <h3 class="page-title">Edit Data Marketplace</h3>
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
                            <form action="{{ route('marketplaces.update', $marketplace->id) }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name of marketplace</label>
                                                <div class="input-group">
                                                    {{-- <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa-solid fe-user"></i>
                                                        </span>
                                                    </div> --}}
                                                    <input type="text" name="name" class="form-control" value="{{ $marketplace->name }}" required>
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