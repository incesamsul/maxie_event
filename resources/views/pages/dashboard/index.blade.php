@extends('layouts.v_template')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Rincian data tamu Hadir</h4>
                </div>
                <div class="card-body">
                    <p>Stokis : {{ count($hadir_stokis) }}</p>
                    <p>Distributor : {{ count($hadir_distributor) }}</p>
                    <p>Agen : {{ count($hadir_agen) }}</p>
                    <p>Total hadir : {{ count($total_hadir) }}</p>
                    <a href="{{ URL::to('/admin/rekap_tamu_hadir') }}" class="badge badge-primary">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Rincian data tamu Tidak Hadir</h4>
                </div>
                <div class="card-body">
                    <p>Stokis : {{ count($tidak_hadir_stokis) }}</p>
                    <p>Distributor : {{ count($tidak_hadir_distributor) }}</p>
                    <p>Agen : {{ count($tidak_hadir_agen) }}</p>
                    <p>Total tidak hadir : {{ count($total_tidak_hadir) }}</p>
                    <a href="{{ URL::to('/admin/rekap_tamu_tidak_hadir') }}" class="badge badge-danger">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Tamu</h4><p>Total : {{ count($total_tamu) }}</p>
                </div>
                <div class="card-body  d-flex justify-content-center align-items-center">
                    <div class="col-sm-6 d-flex justify-content-center align-items-center">
                        <canvas height="350" id="myChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Tamu Hadir</h4>
                </div>
                <div class="card-body p-0">
                    <canvas height="150" id="myChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Tamu Tidak Hadir</h4>
                </div>
                <div class="card-body p-0">
                    <canvas height="150" id="myChart3"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>

    let agen = '{{ count($total_agen) }}';
    let distributor = '{{ count($total_distributor) }}';
    let stokis = '{{ count($total_stokis) }}';
    var ctx = document.getElementById("myChart1");
    if (ctx) {
        ctx.getContext('2d');
        var myChart = new Chart(ctx, {
            aspectRatio: 1
            , type: 'doughnut'
            , data: {
                datasets: [{
                    data: [agen,distributor,stokis]
                    , backgroundColor: [
                        '#6777ef'
                        , '#63ed7a'
                        , '#ffa426'
                        , '#fc544b'
                        , '#6777ef'
                    , ]
                    , label: 'Dataset 1'
                }]
                , labels: [
                    'Agen',
                    'Distributor',
                    'Stokis'
                ]
            , }
            , options: {
                responsive: true
                , legend: {
                    position: 'bottom'
                , }
            , }
        });
    }



    $(document).ready(function() {


        let dataStatus = ['agen','distributor','stokis'];
        let dataHadir = ['{{ count($hadir_agen) }}','{{ count($hadir_distributor) }}','{{ count($hadir_stokis) }}'];

        var ctx = document.getElementById('myChart2');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: dataStatus,
    datasets: [
        {
        label: 'Tamu Hadir',
        data: dataHadir,
        fill: false,
        borderColor: '#34c',
        backgroundColor: '#aae0a8',
        }
    ]
    },
    options: {
        responsive: true,
        scales: {
        x: {
            display: true,
            title: {
            display: true,
            text: 'Month',
            color: '#911',
            font: {
                family: 'Comic Sans MS',
                size: 20,
                weight: 'bold',
                lineHeight: 1.2,
            },
            padding: {top: 20, left: 0, right: 0, bottom: 0}
            }
        },
        y: {
            display: true,
            title: {
            display: true,
            text: 'Value',
            color: '#191',
            font: {
                family: 'Times',
                size: 20,
                style: 'normal',
                lineHeight: 1.2
            },
            padding: {top: 30, left: 0, right: 0, bottom: 0}
            }
        }
        }
    },
    });
        


        let dataTidakHadir = ['{{ count($tidak_hadir_agen) }}','{{ count($tidak_hadir_distributor) }}','{{ count($tidak_hadir_stokis) }}'];

        var ctx = document.getElementById('myChart3');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: dataStatus,
    datasets: [
        {
        label: 'Tamu Tidak Hadir',
        data: dataTidakHadir,
        fill: false,
        borderColor: '#34a',
        backgroundColor: '#990120',
        }
    ]
    },
    options: {
        responsive: true,
        scales: {
        x: {
            display: true,
            title: {
            display: true,
            text: 'Month',
            color: '#911',
            font: {
                family: 'Comic Sans MS',
                size: 20,
                weight: 'bold',
                lineHeight: 1.2,
            },
            padding: {top: 20, left: 0, right: 0, bottom: 0}
            }
        },
        y: {
            display: true,
            title: {
            display: true,
            text: 'Value',
            color: '#191',
            font: {
                family: 'Times',
                size: 20,
                style: 'normal',
                lineHeight: 1.2
            },
            padding: {top: 30, left: 0, right: 0, bottom: 0}
            }
        }
        }
    },
    });
        

       


    });


</script>
@endsection