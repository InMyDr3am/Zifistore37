<div class="modal fade" id="modal-deleteBuyer{{ $employee->id }}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>HAPUS DATA KARYAWAN</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/karyawan/{{ $employee->id }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <div class="row">
                        <div class="col-sm-12">
                            Apakah yakin untuk menghapus data karyawan dengan nama <b> {{ $employee->name }} </b>, 
                            jabatan <b> {{ $employee->role->name }} </b>, dan no hp <b>{{ $employee->no_hp }}</b> ?
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 float-right">Yakin</button>
                    <button type="button" class="btn btn-secondary mt-2 mr-2 float-right" data-dismiss="modal">Tidak</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
      <!-- /.modal-dialog -->
</div>
    
