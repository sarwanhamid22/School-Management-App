@extends('layouts.master')

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
                                  <th>ID</th>
                                  <th>Nama Siswa</th>
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
                            @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->student->name }}</td>
                                <td>{{ $payment->academic_year }}</td>
                                <td>{{ implode(', ', $payment->payment_type) }}</td>
                                <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                <td>{{ $payment->payment_date->format('d-m-Y') }}</td>
                                <td>{{ $payment->description }}</td>
                                <td>{{ $payment->status ? 'Lunas' : 'Belum Lunas' }}</td>
                                <td>
                                  <div class="d-flex justify-content-around">
                                      <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info btn-sm mx-1">
                                          <i class="fas fa-eye"></i>
                                      </a>
                                      <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning btn-sm mx-1">
                                          <i class="fas fa-edit"></i>
                                      </a>
                                      <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="mx-1">
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
