<div class="modal fade" id="modalTambahPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kridit Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createDataPaket" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Kode Paket</label>
                        <input type="text" name="kode" id="kode" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Cash</label>
                        <input type="number" name="harga_cash" id="harga_cash" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Muka</label>
                        <input type="number" name="uang_muka" id="uang_muka" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Cicilan</label>
                        <input type="number" name="jumlah_cicilan" id="jumlah_cicilan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Bunga</label>
                        <input type="number" name="bunga" id="bunga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Cicilan</label>
                        <input type="number" name="nilai_cicilan" id="nilai_cicilan" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
