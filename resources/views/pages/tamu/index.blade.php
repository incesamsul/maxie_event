@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header d-flex  justify-content-between">
              <h4>Tamu</h4>
              <div class="table-tools d-flex justify-content-around ">
                <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data Pengguna ..." id="searchbox">
                <button id="addTamu" type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#tamu"><i class="fas fa-plus"></i></button>
                <button id="btnStokis" type="button" class="btn btn-primary float-right ml-3 ">Stokis</button>
                <button id="btnDistributor" type="button" class="btn btn-warning float-right ml-3 ">Distributor</button>
                <button id="btnAgen" type="button" class="btn btn-info float-right ml-3 ">Agen</button>
                <button id="btnAll" type="button" class="btn btn-success float-right ml-3 ">All</button>
                <button id="btnConfirm" type="button" class="btn btn-success float-right ml-3 "><i class="fas fa-check"></i></button>
                <button id="btnNotConfirm" type="button" class="btn btn-danger float-right ml-3 "><i class="fas fa-times"></i></button>
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
                    <th>Share</th>
                    <th>Konfirmasi</th>
                    <th>Aksi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tamu as $row)
                  <?php
                    $message = "*Halo * %0a";
                    $message .= "Undangan ini merupakan undangan resmi dari kami,Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i *" . $row->nama_tamu . "* untuk menghadiri event kami.%0a";
                    $message .= "Berikut link untuk info lengkap dari acara kami :%0a%0a";
                    $message .= URL::to(Request::root() . '/' . $row->id_tamu) ." %0a%0a";
                    $message .= "(Jangan bagikan link ini kepada siapapun, Salin link dan buka di browser bila link tidak dapat dibuka, usahakan mematikan fitur dark mode dalam browser untuk hasil yang maksimal)";
                  ?>
                  <tr>
                    <td>{{ $row->no_team }} </td>
                    <td>{{ $row->facebook }}</td>
                    <td>{{ $row->whatsapp }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->kota_asal }} </td>
                    <td>
                      <a target="_blank" href="https://web.whatsapp.com/send?phone={{ convertNoHp($row->whatsapp) }}&text={{ $message }}" class="btn btn-success text-white">
                        <i class="fab fa-whatsapp"></i>

                    </a>
                    </td>
                    <td class="tdKonfirmasi">
                      @if($row->konfirmasi_tamu == '0') 
                      <button class="btn btn-light"><i class="fas fa-times text-danger"></i></button>
                      @elseif($row->konfirmasi_tamu == '1')
                      <button class="btn btn-light"><i class="fas fa-check text-success"></i></button>
                      @else
                      <button class="btn btn-light"><i class="fas fa-minus text-warning"></i></button>
                      @endif
                    </td>
                    <td>
                      <button data-id_tamu="{{ $row->id_tamu }}"  class="btnTimes btn btn-light"><i class="fas fa-times text-danger"></i></button>
                      <button data-id_tamu="{{ $row->id_tamu }}"  class="btnCheck btn btn-light"><i class="fas fa-check text-success"></i></button>
                      <button data-id_tamu="{{ $row->id_tamu }}"  class="btnMinus btn btn-light"><i class="fas fa-minus text-warning"></i></button>
                    </td>
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

$(document).on('click', '.btnCheck',  function(){
    let idTamu = $(this).data('id_tamu');
    var el = $(this).parent().prev('.tdKonfirmasi');
    $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          , url: '/admin/konfirmasi_tamu'
          , method: 'post'
          , dataType: 'json'
          , data: {
              id_tamu: idTamu
          }
          , success: function(data) {
              if (data == 1) {
                  el.html('<button class="btn btn-light"><i class="fas fa-check text-success"></i></button>');
              }
          }
      })
  })

  $(document).on('click', '.btnTimes', function(){
   
    let idTamu = $(this).data('id_tamu');
    var el = $(this).parent().prev('.tdKonfirmasi');
    $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          , url: '/admin/cancel_konfirmasi_tamu'
          , method: 'post'
          , dataType: 'json'
          , data: {
              id_tamu: idTamu
          }
          , success: function(data) {
              if (data == 1) {
                el.html('<button class="btn btn-light"><i class="fas fa-times text-danger"></i></button>');
              }
          }
      })
  })


  $(document).on('click', '.btnMinus', function(){
   
   let idTamu = $(this).data('id_tamu');
   var el = $(this).parent().prev('.tdKonfirmasi');
   $.ajax({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
         , url: '/admin/cadangkan_konfirmasi_tamu'
         , method: 'post'
         , dataType: 'json'
         , data: {
             id_tamu: idTamu
         }
         , success: function(data) {
             if (data == 1) {
               el.html('<button class="btn btn-light"><i class="fas fa-minus text-warning"></i></button>');
             }
         }
     })
 })

  $('#btnStokis').on('click', function(){
    document.location.href = '/admin/tamu/stokis';
  })

  $('#btnDistributor').on('click', function(){
    document.location.href = '/admin/tamu/distributor';
  })

  $('#btnAgen').on('click', function(){
    document.location.href = '/admin/tamu/agen';
  })

  $('#btnAll').on('click', function(){
    document.location.href = '/admin/tamu';
  })

  $('#btnConfirm').on('click', function(){
    document.location.href = '/admin/tamu/confirm';
  })

  $('#btnNotConfirm').on('click', function(){
    document.location.href = '/admin/tamu/not_confirm';
  })

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
