<!DOCTYPE html>
<html lang="fr">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.4.0/css/all.min.css') }}">
    <style>
        body {
        background-color: #4e4b78;
    }
    </style>
</head>

<body>

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

</body>

</html>