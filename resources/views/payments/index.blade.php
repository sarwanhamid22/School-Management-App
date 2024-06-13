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
    var studentName = $(form).data('student-name');
    swal({
        title: 'Konfirmasi Hapus',
        content: {
            element: "span",
            attributes: {
                innerHTML: 'Apakah kamu yakin ingin menghapus data pembayaran siswa <strong>' + studentName + '</strong>?'
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
            <h1 class="m-0">Daftar Tracking Pembayaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Daftar Pembayaran</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
          <div class="row mb-3">
            <div class="col-md-3">
                <div class="form-group">
                </div>
            </div>
            <div class="col-md-9">
              <div class="text-right">
                  <a href="{{ route('payments.create') }}" class="btn btn-primary">Tambah Pembayaran</a>
                  <a href="{{ route('payments.trashed') }}" class="btn btn-secondary">Data Terhapus</a>
              </div>
            </div>
          </div>

          <div class="card">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered table-striped" id="data-table">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Siswa</th>
                                  <th>Kelas</th>
                                  <th>Tahun Akademik</th>
                                  <th>Jenis Pembayaran</th>
                                  <th>Jumlah</th>
                                  <th>Tanggal</th>
                                  <th>Deskripsi</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($payments as $index => $payment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $payment->student->name }}</td>
                                <td>{{ $payment->student->class }}</td>
                                <td>{{ $payment->academic_year }}</td>
                                <td>{{ implode(', ', $payment->payment_type) }}</td>
                                <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                <td>{{ $payment->payment_date->format('d-m-Y') }}</td>
                                <td>{{ $payment->description ?? '' }}</td> <!-- Menampilkan deskripsi, jika kosong maka nilai kosong akan ditampilkan -->
                                <td>{{ $payment->status ? 'Lunas' : 'Belum Lunas' }}</td>
                                <td>
                                  <div class="d-flex justify-content-around">
                                      <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info btn-sm mx-1">
                                          <i class="fas fa-eye"></i>
                                      </a>
                                      <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning btn-sm mx-1">
                                          <i class="fas fa-edit"></i>
                                      </a>
                                      <form onsubmit="confirmDelete(event, this)" data-student-name="{{ $payment->student->name }}" method="POST" action="{{ route('payments.destroy', $payment->id) }}" class="mx-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    
                                  </div>
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
</div>
@endsection
