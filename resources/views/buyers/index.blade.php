<x-layout>
    {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}
    <h1 class="page-title">Data Buyers</h1>
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
                            <table id="buyers-table" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data akan dimuat lewat DataTables -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    {{-- {{ $buyers->links() }} --}}
            </div>
        </div>
    </div>
</x-layout>