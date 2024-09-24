<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('images/bus1.jpg') }}');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            height: 100vh; 
        }

        .content {
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            position: relative;
            top: 50%; 
            transform: translateY(-50%);
        }

         .seat {
            width: 60px;
            height: 60px;
            margin: 5px;
            border-radius: 5px;
            text-align: center;
            line-height: 60px;
            cursor: pointer;
        }


.seat.booked {
    background-color: #dc3545;
    color: white;
    cursor: not-allowed;
}

.seat.available {
    background-color: #28a745;
    color: white;
}

    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
           <h3 class="text-color-red"> <a class="navbar-brand"  href="#">Bus Ticket Booking</a></h3>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
