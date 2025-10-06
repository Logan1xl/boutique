<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obtenir un devis</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        @if(session('success'))
            <div class="mb-4">
                <div class="fixed top-6 right-6 z-50 bg-green-600 text-white px-4 py-3 rounded shadow-lg animate-fade-in">
                    <span class="font-semibold">Succès:</span> {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Obtenir un devis</h1>

            @if($product)
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <p class="font-semibold">Produit sélectionné</p>
                    <p class="text-gray-700">{{ $product->name }} (ID {{ $product->id }})</p>
                    @if($variant)
                        <p class="text-sm text-gray-600">Variante ID: {{ $variant->id }}</p>
                    @endif
                </div>
            @endif

            <form method="POST" action="{{ route('quotes.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">
                <input type="hidden" name="variant_id" value="{{ $variant->id ?? '' }}">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom complet</label>
                    <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                    <input type="tel" name="phone" pattern="^[0-9]{9}$" maxlength="9" inputmode="numeric" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" required placeholder="Ex: 699123456">
                    <p class="text-xs text-gray-500 mt-1">9 chiffres, sans espaces ni lettres.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Message (combien de sceaux de peinture voulez-vous??)</label>
                    <textarea name="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Combien de mètre est la surface de votre terrain??..."></textarea>
                </div>
                <div class="pt-4">
                    <button type="submit" class="w-full py-3 px-4 rounded-md text-white bg-green-600 hover:bg-green-700 transition duration-300 font-semibold">Valider</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    const toast = document.querySelector('.fixed.top-6.right-6');
    if (toast) {
        setTimeout(() => toast.remove(), 4000);
    }
 </script>
</html>



