<!DOCTYPE html>
<html lang="en">
    <?php
        use App\Models\Dokumentasi;   
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Dokumentasi - Jasa Keuangan | Dashboard</title>

    <!-- CSS only -->
    <link rel="website icon" type="png" href="/img/pos-indonesia.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">

    <link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    {{-- Datepicker --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js" integrity="sha512-s5u/JBtkPg+Ff2WEr49/cJsod95UgLHbC00N/GglqdQuLnYhALncz8ZHiW/LxDRGduijLKzeYb7Aal9h3codZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui-timepicker-addon@1.6.3/dist/jquery-ui-timepicker-addon.min.js"></script>
    <link href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" type='text/css'>

</head>

<body id="page-top" onload=display_ct()>
{{-- <body id="page-top"> --}}

    <div id="wrapper">
        @include('dashboard.layouts.sidebar')
            
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                
                @include('dashboard.layouts.navbar', ['dokumentasi' => Dokumentasi::latest()->paginate(3)])

                <div class="container-fluid">
                    @yield('container')

                </div>
            </div>
        </div>

    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> --}}

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js" type="text/javascript"></script>
    <script src="/js/moment.min.js" type="text/javascript"></script>

    {{-- Popover --}}
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>

    <!-- Core plugin JavaScript-->
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <!-- Page level plugins -->
    <script src="/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js" type="text/javascript"></script>

    <!-- Page level custom scripts -->
    <script src="/js/datatables-demo.js" type="text/javascript"></script>

    <script type="text/javascript"> 
        function display_c(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct()',refresh)
        }
        
        function display_ct() {
            var date = new Date();
            var tahun = date.getFullYear();
            var bulan = date.getMonth();
            var tanggal = date.getDate();
            var hari = date.getDay();
            var jam = date.getHours();
            var menit = date.getMinutes();
            var detik = date.getSeconds();

            switch(hari) {
            case 0: hari = "Minggu"; break;
            case 1: hari = "Senin"; break;
            case 2: hari = "Selasa"; break;
            case 3: hari = "Rabu"; break;
            case 4: hari = "Kamis"; break;
            case 5: hari = "Jum'at"; break;
            case 6: hari = "Sabtu"; break;
            }
            
            switch(bulan) {
            case 0: bulan = "Januari"; break;
            case 1: bulan = "Februari"; break;
            case 2: bulan = "Maret"; break;
            case 3: bulan = "April"; break;
            case 4: bulan = "Mei"; break;
            case 5: bulan = "Juni"; break;
            case 6: bulan = "Juli"; break;
            case 7: bulan = "Agustus"; break;
            case 8: bulan = "September"; break;
            case 9: bulan = "Oktober"; break;
            case 10: bulan = "November"; break;
            case 11: bulan = "Desember"; break;
            }

            document.getElementById('ct').innerHTML = hari + ", " + tanggal + " " + bulan + " " + tahun + " [" +jam + ":" + menit + ":" + detik + " WIB]";

            display_c();
        }
        
    </script>

</body>

</html>