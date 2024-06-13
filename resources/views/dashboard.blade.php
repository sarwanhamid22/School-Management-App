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
                          <h5 class="card-title">Teachers</h5>
                          <p class="card-text">{{ $data['teachers'] }}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3 mb-3">
              <div class="card text-white bg-success">
                  <div class="card-body d-flex align-items-center">
                      <i class="fas fa-user-graduate fa-2x mr-3"></i>
                      <div>
                          <h5 class="card-title mb-0">Students</h5>
                          <p class="card-text">{{ $data['students'] }}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3 mb-3">
              <div class="card text-white bg-info">
                  <div class="card-body d-flex align-items-center">
                      <i class="fas fa-school fa-2x mr-3"></i>
                      <div>
                          <h5 class="card-title mb-0">Classes</h5>
                          <p class="card-text">{{ $data['class'] }}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3 mb-3">
              <div class="card text-white bg-warning">
                  <div class="card-body d-flex align-items-center">
                      <i class="fas fa-users fa-2x mr-3"></i>
                      <div>
                          <h5 class="card-title mb-0">Parents</h5>
                          <p class="card-text">Rp. {{ $data['total_payments'] }}</p>
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
                    Academic Calendar
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addEventModal">Add Event</button>
                </div>
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
          <div class="col-md-6">
              <div class="card mb-3">
                  <div class="card-header bg-dark text-white">Add Notification</div>
                  <div class="card-body">
                      <form id="notificationForm">
                          <div class="form-group">
                              <label for="notificationMessage">Notification Content:</label>
                              <textarea class="form-control" id="notificationMessage" rows="3" placeholder="Enter notification content"></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Send</button>
                      </form>
                  </div>
              </div>
              <div class="card mt-3">
                  <div class="card-header bg-dark text-white">Latest Notifications</div>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item"><i class="fas fa-bell text-info mr-2"></i>Teacher meeting tomorrow at 10:00</li>
                      <li class="list-group-item"><i class="fas fa-book-open text-success mr-2"></i>Semester exams will start next week</li>
                      <li class="list-group-item"><i class="fas fa-exclamation-triangle text-warning mr-2"></i>SPP payment for this month is due</li>
                  </ul>
              </div>
          </div>
      </div>
    </div>

    <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventFormModal">
                        <div class="form-group">
                            <label for="eventTitleModal">Event Title:</label>
                            <input type="text" class="form-control" id="eventTitleModal" placeholder="Enter event title">
                        </div>
                        <div class="form-group">
                            <label for="eventDateModal">Event Date:</label>
                            <input type="date" class="form-control" id="eventDateModal">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitEvent">Save</button>
                </div>
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
    // Inisialisasi FullCalendar
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: fetchEvents // Panggil fungsi fetchEvents untuk mengambil event
    });

    // Fungsi untuk mengambil event dari server atau cache
    function fetchEvents(start, end, timezone, callback) {
        const cachedEvents = sessionStorage.getItem('events');

        if (cachedEvents) {
            // Gunakan event dari cache jika ada
            callback(JSON.parse(cachedEvents));
        } else {
            // Ambil event dari server jika belum ada di cache
            $.get('/events', function (events) {
                sessionStorage.setItem('events', JSON.stringify(events)); // Simpan di cache
                callback(events);
            });
        }
    }

    // Menangani tombol Save untuk menambah event baru
    $('#submitEvent').on('click', function () {
        const title = $('#eventTitleModal').val();
        const date = $('#eventDateModal').val();

        if (title && date) {
            $.post('/events', {
                title: title,
                date: date,
                _token: '{{ csrf_token() }}' // Pastikan Anda menyertakan token CSRF
            }).done(function (newEvent) {
                // Hapus event lama sebelum menambahkan yang baru
                $('#calendar').fullCalendar('removeEvents');
                // Tambahkan event baru ke kalender
                $('#calendar').fullCalendar('renderEvent', newEvent, true); 

                // Reset form dan tutup modal
                $('#eventFormModal')[0].reset();
                $('#addEventModal').modal('hide');
            }).fail(function () {
                alert('Failed to save event. Please try again.');
            });
        } else {
            alert('Please fill in all fields');
        }
    });

    function fetchEvents(start, end, timezone, callback) {
    $.get('/events', function (events) {
        callback(events);
    });
    }

});
</script>
@endsection
