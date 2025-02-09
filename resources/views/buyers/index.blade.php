<x-layout>
    {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}
    <h1 class="page-title">Data Buyers</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="" class="btn btn-md btn-success mb-3">ADD BUYER</a>
                    <div class="container mt-4">
                        <h2>Data Buyers</h2>
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
                    {{-- {{ $buyers->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</x-layout>