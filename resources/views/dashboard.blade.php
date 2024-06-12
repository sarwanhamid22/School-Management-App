@extends('layouts.master')

@section('content')

<div class="content-wrapper">
  <div class="container-fluid">
    <div class="container-fluid mt-4">
      <div class="row">

          <!-- Kartu Statistik -->
          <div class="col-md-3 mb-3">
              <div class="card bg-primary text-white">
                  <div class="card-body d-flex align-items-center">
                      <i class="fas fa-chalkboard-teacher fa-2x mr-3"></i>
                      <div>
                          <h5 class="card-title">Guru</h5>
                          <p class="card-text">50</p>
                      </div>
                  </div>
              </div>
          </div>
      <div class="col-md-3 mb-3">
          <div class="card text-white bg-success">
              <div class="card-body d-flex align-items-center">
                  <i class="fas fa-user-graduate fa-2x mr-3"></i>
                  <div>
                      <h5 class="card-title mb-0">Siswa</h5>
                      <p class="card-text">350</p>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3 mb-3">
          <div class="card text-white bg-info">
              <div class="card-body d-flex align-items-center">
                  <i class="fas fa-school fa-2x mr-3"></i>
                  <div>
                      <h5 class="card-title mb-0">Kelas</h5>
                      <p class="card-text">15</p>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3 mb-3">
          <div class="card text-white bg-warning">
              <div class="card-body d-flex align-items-center">
                  <i class="fas fa-users fa-2x mr-3"></i>
                  <div>
                      <h5 class="card-title mb-0">Orang Tua</h5>
                      <p class="card-text">280</p>
                  </div>
              </div>
          </div>
      </div>
      </div>

      <!-- Form Tambah Acara dan Pengaturan Notifikasi -->
      <div class="row">
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header bg-dark text-white">
                      Kalender Akademik
                      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addEventModal">Tambahkan Acara</button>
                  </div>
                  <div class="card-body">
                      <div id="calendar"></div>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card mb-3">
                  <div class="card-header bg-dark text-white">Tambahkan Notifikasi</div>
                  <div class="card-body">
                      <form id="notificationForm">
                          <div class="form-group">
                              <label for="notificationMessage">Isi Notifikasi:</label>
                              <textarea class="form-control" id="notificationMessage" rows="3" placeholder="Masukkan isi notifikasi"></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Kirim</button>
                      </form>
                  </div>
              </div>
              <div class="card mt-3">
                  <div class="card-header bg-dark text-white">Notifikasi Terbaru</div>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item"><i class="fas fa-bell text-info mr-2"></i>Rapat guru besok jam 10.00</li>
                      <li class="list-group-item"><i class="fas fa-book-open text-success mr-2"></i>Ujian semester akan dimulai minggu depan</li>
                      <li class="list-group-item"><i class="fas fa-exclamation-triangle text-warning mr-2"></i>Pembayaran SPP untuk bulan ini sudah jatuh tempo</li>
                      <li class="list-group-item"><i class="fas fa-exclamation-triangle text-warning mr-2"></i>Pembayaran SPP untuk bulan ini sudah jatuh tempo</li>
                      <li class="list-group-item"><i class="fas fa-exclamation-triangle text-warning mr-2"></i>Pembayaran SPP untuk bulan ini sudah jatuh tempo</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addEventModalLabel">Tambahkan Acara</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="eventFormModal">
                      <div class="form-group">
                          <label for="eventTitleModal">Judul Acara:</label>
                          <input type="text" class="form-control" id="eventTitleModal" placeholder="Masukkan judul acara">
                      </div>
                      <div class="form-group">
                          <label for="eventDateModal">Tanggal Acara:</label>
                          <input type="date" class="form-control" id="eventDateModal">
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="button" class="btn btn-primary" id="submitEvent">Simpan</button>
              </div>
          </div>
      </div>
  </div>
  </div>
</div>

@endsection

@section('addJavascript')
<script>
  $(document).ready(function () {
      $('#calendar').fullCalendar({
          // Konfigurasi kalender di sini
      });

      $('#submitEvent').on('click', function () {
          var title = $('#eventTitleModal').val();
          var date = $('#eventDateModal').val();
          if (title && date) {
              $('#calendar').fullCalendar('renderEvent', {
                  title: title,
                  start: date,
                  allDay: true
              });
              $('#addEventModal').modal('hide');
              $('#eventFormModal')[0].reset();
          } else {
              alert('Harap isi semua bidang');
          }
      });
  });
</script>

@endsection