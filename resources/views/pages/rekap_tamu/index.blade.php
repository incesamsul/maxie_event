@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header d-flex  justify-content-between">
              <h4>Rekap Tamu</h4>
              <div class="table-tools d-flex justify-content-around ">
                <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data Pengguna ..." id="searchbox">
                <button id="btnStokis" type="button" class="btn btn-primary float-right ml-3 ">Stokis</button>
                <button id="btnDistributor" type="button" class="btn btn-warning float-right ml-3 ">Distributor</button>
                <button id="btnAgen" type="button" class="btn btn-info float-right ml-3 ">Agen</button>
                <button id="btnAll" type="button" class="btn btn-success float-right ml-3 ">All</button>
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
                   
                   
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
          </div>
        </div>
      </div>



  </section>




@endsection
@section('script')
<script>




  $('#btnStokis').on('click', function(){
    document.location.href = '/admin/rekap_tamu_hadir/stokis';
  })

  $('#btnDistributor').on('click', function(){
    document.location.href = '/admin/rekap_tamu_hadir/distributor';
  })

  $('#btnAgen').on('click', function(){
    document.location.href = '/admin/rekap_tamu_hadir/agen';
  })

  $('#btnAll').on('click', function(){
    document.location.href = '/admin/rekap_tamu_hadir';
  })






    $('#liRekapTamuHadir').addClass('active');
</script>
@endsection
