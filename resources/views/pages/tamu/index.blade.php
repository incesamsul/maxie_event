@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header d-flex  justify-content-between">
              <h4>Tamu</h4>
              <div class="table-tools d-flex justify-content-around ">
                <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data Pengguna ..." id="cari-data-pengguna">
                <button id="addTamu" type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#tamu"><i class="fas fa-plus"></i></button>
            </div>
            </div>
            <div class="card-body" >
              <table class="table table-striped table-hover  table-action-hover" id="table-data">
                <thead>
                  <tr>
                    <th>No Team</th>
                    <th>Nama facebook</th>
                    <th>No wa</th>
                    <th>Status</th>
                    <th>Kota asal</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tamu as $row)
                  <tr>
                    <td>{{ $row->no_team }} </td>
                    <td>{{ $row->facebook }}</td>
                    <td>{{ $row->whatsapp }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->kota_asal }} </td>
                    <td class="option">
                      <div class="btn-group dropleft btn-option">
                          <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                          </i>
                          <div class="dropdown-menu">
                              <a data-pengguna='@json($row)'  data-toggle="modal" data-target="#tamu" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                              <a data-id_tamu="{{ $row->id_tamu }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
                          </div>
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



  </section>



<!-- Modal -->
<div class="modal fade" id="tamu" tabindex="-1" aria-labelledby="tamuLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tamuLabel">Tamu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTamu" action="{{ URL::to('/admin/create_tamu') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="no_team">no_team</label>
            <input type="hidden" id="id" name="id">
            <input type="text" class="form-control" name="no_team" id="no_team">
          </div>
          <div class="form-group">
            <label for="facebook">facebook</label>
            <input type="text" class="form-control" name="facebook" id="facebook">
          </div>
          <div class="form-group">
            <label for="whatsapp">whatsapp</label>
            <input type="text" class="form-control" name="whatsapp" id="whatsapp">
          </div>
          <div class="form-group">
            <label for="status">status</label>
            <select name="status" id="status" class="form-control">
              <option value="">--pilih status--</option>
              <option>agen</option>
              <option>distributor</option>
              <option>stokis</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kota_asal">kota_asal</label>
            <input type="text" class="form-control" name="kota_asal" id="kota_asal">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
        <button type="submit" class="btn btn-primary">simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>


@endsection
@section('script')
<script>
  // TOMBOL EDIT USER
  $('.table tbody').on('click', '.edit', function() {
            let tamu = $(this).data('pengguna');
            $('#no_team').val(tamu.no_team);
            $('#facebook').val(tamu.facebook);
            $('#whatsapp').val(tamu.whatsapp);
            $('#status').val(tamu.status);
            $('#kota_asal').val(tamu.kota_asal);
            $('#id').val(tamu.id_tamu);
            $('#formTamu').attr('action', '/admin/update_tamu');
        })

        // TOMBOL TAMBAH USER
        $('#addTamu').on('click', function() {
           
            $('#formTamu').attr('action', '/admin/create_tamu');
        });

        // TOMBOL HAPUS USER
        $('.table tbody').on('click', 'tr td a.hapus', function() {
            let id_tamu = $(this).data('id_tamu');
            Swal.fire({
                title: 'Apakah yakin?'
                , text: "Data tidak bisa kembali lagi!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, Konfirmasi'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , url: '/admin/delete_tamu'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id_tamu: id_tamu
                        }
                        , success: function(data) {
                            if (data == 1) {
                                Swal.fire('Berhasil', 'Data telah terhapus', 'success').then((result) => {
                                    location.reload();
                                });
                            }
                        }
                        , error: function(err) {
                          console.log(err);
                        }
                    })
                }
            })
        });


    $('#liTamu').addClass('active');
</script>
@endsection
