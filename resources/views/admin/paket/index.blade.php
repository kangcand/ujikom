@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Paket Kridit
                    <button
                        class="btn btn-sm btn-primary float-right"
                        data-toggle="modal"
                        data-target="#modalTambahPaket"
                    >
                        Tambah
                    </button>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table
                            id="paketTable"
                            class="display"
                            style="width:100%"
                        >
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
            columns: [
                { data: "kode",name: "kode"},
                { data: "harga_cash",name: "harga_cash"},
                { data: "uang_muka", name: "uang_muka" },
                { data: "jumlah_cicilan",name: "jumlah_cicilan" },
                { data: "bunga", name: "bunga"},
                { data: "nilai_cicilan", name: "nilai_cicilan"}
            ]
        });
    });
</script>
@endpush
