@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Paket Kridit
                    <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modalTambahPaket">
                        Tambah
                    </button>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="paketTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Harga Cash</th>
                                    <th>Uang Muka</th>
                                    <th>Jumlah Cicilan</th>
                                    <th>Bunga (%)</th>
                                    <th>Nilai Cicilan</th>
                                </tr>
                            </thead>
                            <tbody id="dataPaket"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.paket.create')
@include('admin.paket.edit')
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        // CSRF
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        // Get Data
        $("#paketTable").DataTable({
            dataType: "json",
            ajax: {
                url: "/api/paket",
                dataType: "json",
                type: "GET",
                stateSave: true,
                serverSide: true,
                processing: true
            },
            responsive: true,
            columns: [{
                    data: "kode",
                    name: "kode"
                },
                {
                    data: "harga_cash",
                    name: "harga_cash"
                },
                {
                    data: "uang_muka",
                    name: "uang_muka"
                },
                {
                    data: "jumlah_cicilan",
                    name: "jumlah_cicilan"
                },
                {
                    data: "bunga",
                    name: "bunga"
                },
                {
                    data: "nilai_cicilan",
                    name: "nilai_cicilan"
                }
            ]
        });

        // Store Data
        $('#createDataPaket').submit(function(e) {
            var formData = new FormData($('#createDataPaket')[0]);
            e.preventDefault();
            $.ajax({
                url: "/api/paket",
                type: 'POST',
                data: formData,
                cache: true,
                contentType: false,
                processData: false,
                async: false,
                dataType: 'json',
                success: function(result) {
                    $('#modalTambahPaket').modal('hide');
                    $('#createDataPaket').trigger("reset");
                    Swal.fire({
                        type: 'success',
                        title: 'Data Berhasil ditambah!',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    DataTable.reload();
                },

                complete: function() {
                    $("#createDataPaket")[0].reset();
                }
            });
        });

        // get Edit data
        $('#modalEditpaket').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var nama_paket = button.data('nama_paket')
            var modal = $(this)
            modal.find('.modal-body input[name="id"]').val(id)
            modal.find('.modal-body input[name="nama_paket"]').val(nama_paket)
        })
        // Update Data paket
        $('#editDatapaket').submit(function(e) {
            var formData = new FormData($('#editDatapaket')[0]);
            var id = formData.get('id');
            e.preventDefault();
            $.ajax({
                url: "/api/paket/" + id,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                async: false,
                dataType: 'json',
                success: function(result) {
                    alert(result.message)
                    location.reload();
                },
            });
        });
        // Hapus Data
        $("#datatable-paket").on('click', '#hapus-datapaket', function() {
            var id = $(this).data("id");
            // alert(id)
            $.ajax({
                url: '/api/paket/' + id,
                method: "DELETE",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(berhasil) {
                    alert(berhasil.message)
                    location.reload();
                },
                error: function(gagal) {
                    console.log(gagal)
                }
            })
        });

    });
</script>
@endpush