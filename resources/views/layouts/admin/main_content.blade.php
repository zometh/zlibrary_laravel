<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Styles personnalisés -->
    <style>
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #1f2937;
        }
        .sidebar a {
            color: #ffffff;
            padding: 12px;
            display: block;
        }
        .sidebar a:hover {
            background: #374151;
        }
    </style>
</head>
<body class="flex bg-gray-100">

<!-- Sidebar -->


<!-- Contenu principal -->
<main class="flex-1 flex flex-col">
    <!-- Navbar -->

    <!-- Contenu de la page -->
    <div class="p-6 overflow-y-auto">
        @yield('content')
    </div>
</main>

</body>
</html>
