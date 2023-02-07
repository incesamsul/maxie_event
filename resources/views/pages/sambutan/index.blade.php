<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Maxie skincare</title>
    <meta charset="utf-8">
     {{-- csrf token --}}
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  </head>
  <body class="d-flex align-items-center justify-content-center" style="height: 100vh">
 
    <h1 id="sambutan">.....</h1>
  <script src="{{ asset('eventalk-master/js/jquery.min.js') }}"></script>

  <script>
    
$.ajaxSetup({
    timeout: 3000,
    retryAfter: 3000
});

function reqNotif(param) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/get_last_scanned',
        dataType: 'json',
        success: function(data) {
            console.log('u do it');
            console.log(data);
            $('#sambutan').html("Selamat Datang " + data.tamu.facebook + " Dari Tim " + data.tamu.no_team)
            $('#sambutan').addClass('animate__animated animate__fadeInDown');
              setTimeout(() => {
                $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: '/admin/clear_last_scanned',
                  dataType: 'json',
                  success: function(data) {
                    $('#sambutan').html("")
                    document.location.reload();
                  },
                  error: function(err) {
                      console.log(err);
                  }
              })
              }, 6000);
        },
        error: function(err) {
            console.log(err);
        }
    })
}

setInterval(() => {
  reqNotif();
}, 3000);
  </script>
  </body>
</html>