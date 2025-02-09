<x-layout>
    {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}
    <h1 class="page-title">Data Buyers</h1>
    <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="name" class="form-control" value="{{ $buyer->name }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="phone" class="form-control" value="{{ $buyer->phone }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </span>
                                    </div>
                                    <textarea class="form-control" rows="3" name="address" required>{{ $buyer->address }}</textarea>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 float-right">Update</button>
                </div>
            </form>
    </div>
</x-layout>