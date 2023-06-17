<!DOCTYPE html>
<html lang="fr">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- MONO -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

    <!-- <script src="{{ asset('assets/plugins/jquery-3.6.0.min.js') }}"></script> -->

    <!-- GOOGLE FONTS -->
    <link href="{{ asset('assets/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <link href="{{ asset('assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <script src="{{ asset('assets/plugins/nprogress/nprogress.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.4.0/css/all.min.css') }}">
    
    <!-- MONO -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</head>

<body class="bg-light-gray" id="body">

    @include('includes.header')

    @yield('content')

    <!-- Agrandir une image -->
    <script>
        function showImage(src) {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            modal.style.zIndex = '999';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';

            var img = document.createElement('img');
            img.src = src;
            img.style.maxWidth = '90%';
            img.style.maxHeight = '90%';
            img.style.objectFit = 'contain';
            modal.appendChild(img);

            document.body.appendChild(modal);

            modal.addEventListener('click', function() {
                modal.parentElement.removeChild(modal);
            });
        }
    </script>

    <!-- activer les champs de formulaire de la page de profil -->
    <script>
        function activerChamps(form) {
            var champsSaisie = document.querySelectorAll("#" + form + " input[type='text'], #" + form + " input[type='email'], #" + form + " input[type='password'], #" + form + " input[type='submit'], #" + form + " input[type='file'], #" + form + " textarea[name]");

            for (var i = 0; i < champsSaisie.length; i++) {
                champsSaisie[i].removeAttribute("disabled");
            }
        }
    </script>

    <!-- afficher les champs de changement du mot de passe de la page de profil -->
    <script>
        function activerChangementMotDePasse() {
            document.getElementById('div-changement-mot-de-passe').style.display = 'block';
        }
    </script>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.js') }}"></script>

    <script src="{{ asset('assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>

    <script src="{{ asset('assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
    </script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="{{ asset('assets/plugins/toaster/toastr.min.js') }}"></script>

    <script src="{{ asset('assets/js/mono.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/map.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>