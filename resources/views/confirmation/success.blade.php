<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Validée - Global Retail Business</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-100">

    <header class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4">
            <a href="/" class="text-3xl font-extrabold text-red-600">Global Retail Business</a>
        </div>
    </header>

    <main class="container mx-auto mt-12 px-6">
        <div class="bg-white rounded-lg shadow-xl p-10 text-center">
            <div class="flex justify-center mb-6">
                <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center">
                    <i class="fas fa-check text-green-600 text-4xl"></i>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Votre commande a été validée avec succès</h1>
            <p class="text-gray-600 mb-8">Nous vous remercions pour votre achat. Vous recevrez une confirmation sous peu.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/" class="inline-flex items-center px-6 py-3 rounded-md bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                    <i class="fas fa-home mr-2"></i> Retour à l'accueil
                </a>
                <a href="/produits" class="inline-flex items-center px-6 py-3 rounded-md bg-white border border-gray-300 text-gray-800 font-semibold hover:bg-gray-50 transition">
                    <i class="fas fa-store mr-2"></i> Continuer vos achats
                </a>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <p>&copy; 2025 Global Retail Business. Tous droits réservés.</p>
    </footer>

</body>
</html>


