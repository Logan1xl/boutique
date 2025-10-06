<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail demande de devis</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <a href="{{ route('admin.quote_requests.index') }}" class="text-blue-600 hover:underline">← Retour</a>
        <h1 class="text-3xl font-bold mb-6">Demande #{{ $quote_request->id }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Client</h2>
                <p><span class="font-medium">Nom:</span> {{ $quote_request->name }}</p>
                <p><span class="font-medium">Téléphone:</span> {{ $quote_request->phone }}</p>
                <p><span class="font-medium">Message:</span> {{ $quote_request->message ?? '-' }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Produit</h2>
                @if($product)
                    <p><span class="font-medium">Produit:</span> {{ $product->name }} (ID {{ $product->id }})</p>
                @else
                    <p>Produit introuvable (ID {{ $quote_request->product_id }})</p>
                @endif
                @if($variant)
                    <p><span class="font-medium">Variante ID:</span> {{ $variant->id }}</p>
                @endif
            </div>
        </div>

        <div class="mt-6">
            <form method="POST" action="{{ route('admin.quote_requests.destroy', $quote_request) }}">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button>
            </form>
        </div>
    </div>
</body>
</html>



