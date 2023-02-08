@extends('layouts.v_template')

@section('content')
<!-- slider section -->
<div class="row p-0">
  <div class="col-sm-12">
    <div class="card p-0">
      <div class="card-header">
        <div class="card-body p-0">
          <div style="width: 100%" id="reader"></div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

@section('script')
    <script>


        function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
            // console.log(`Scan result: ${decodedText}`, decodedResult);
            console.log(`Scan result: ${decodedText}`, decodedResult);
            $.ajax({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/admin/cek_tamu/' + decodedResult.decodedText,
                    dataType: 'json',
                    success: function(data) {
                      console.log(data);
                      if(data == 1) {
                        alert('Barcode anda telah di scan sebelumya');
                        document.location.reload();
                      } else {
                        alert('berhasil melakukan scan, selamat datang');
                        document.location.href = '/admin/terima/' + decodedResult.decodedText;
                      }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            
        }

        function onScanError(errorMessage) {
            // handle on error condition, with error message
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>
@endsection

