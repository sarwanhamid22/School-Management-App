@extends('layouts.master')
@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
  $(function() {
    $("#data-table").DataTable();
  });

  function confirmDelete(event, form) {
    event.preventDefault();
    swal({
        title: 'Konfirmasi Hapus',
        content: {
            element: "span",
            attributes: {
                innerHTML: 'Apakah kamu yakin ingin menghapus data laporan keuangan?'
            },
        },
        icon: 'warning',
        dangerMode: true,
        buttons: true
    }).then(function(value) {
        if (value) {
            form.submit();
        }
    });
}
</script>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Keuangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan Keuangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-12 text-right">
                    <a href="{{ route('financial-reports.create') }}" class="btn btn-primary">Tambah Laporan</a>
                    <!-- Tombol untuk menuju halaman cetak -->
                    <a href="{{ route('financial-reports.print') }}" class="btn btn-secondary">Cetak</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Pengeluaran</th>
                                <th>Pendapatan</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $index => $report)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $report->title }}</td>
                                <td>Rp {{ number_format($report->expense, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($report->income, 0, ',', '.') }}</td>
                                <td>{{ $report->description ?? '' }}</td>
                                <td>{{ $report->report_date->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('financial-reports.edit', $report->id) }}" class="btn btn-warning btn-sm me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('financial-reports.show', $report->id) }}" class="btn btn-info btn-sm me-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form onsubmit="confirmDelete(event, this)" method="POST" action="{{ route('financial-reports.destroy', $report->id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm me-1">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
