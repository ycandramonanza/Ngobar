<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <style>
        body{
            background-image: url('{{asset('Pavicon/error.jpg')}}');
            background-repeat: no-repeat;
            background-size: cover;
        }
   
    </style>
</head>
<body>
    
    <div class="div text-center mt-5">
        <form action="{{route('Thanks-Page-Logout')}}" method="POST">
            @csrf
              <button class="btn btn-primary center-block">Go Back</button>
        </form>
    </div>
    

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         
         Swal.fire({
            icon: 'error',
            title: 'Akun Kamu Telah Di Nonaktifkan',
            text: '',
            buttonConfirm : true
            })

    </script>
      <script src="{{asset('Template-Website/assets/js/bootstrap.min.js')}}"></script>
</body>
</html>