<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductVariant;
use App\Models\QuoteRequest;

class QuoteController extends Controller
{
    public function create(Request $request)
    {
        $productId = $request->query('product');
        $variantId = $request->query('variant');

        $product = $productId ? Products::with('variants', 'category')->find($productId) : null;
        $variant = $variantId ? ProductVariant::find($variantId) : null;

        return view('quotes.create', compact('product', 'variant'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:9',
            'product_id' => 'required|integer',
            'variant_id' => 'nullable|integer',
            'message' => 'nullable|string|max:2000',
        ]);

        $product = Products::find($validated['product_id']);
        $variantId = $validated['variant_id'] ?? null;

        // Enregistrer la demande en base
        QuoteRequest::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'message' => $validated['message'] ?? null,
            'product_id' => $validated['product_id'],
            'variant_id' => $variantId,
        ]);

        // Construire le message WhatsApp
        $lines = [];
        $lines[] = 'Bonjour, je souhaite obtenir un devis pour:';
        if ($product) {
            $lines[] = 'Produit: ' . $product->name . ' (ID ' . $product->id . ')';
        }
        if ($variantId) {
            $lines[] = 'Variante ID: ' . $variantId;
        }
        if (!empty($validated['message'])) {
            $lines[] = 'Précisions: ' . $validated['message'];
        }
        $lines[] = 'Client: ' . $validated['name'];
        $lines[] = 'Téléphone: ' . $validated['phone'];

        $text = implode("\n", $lines);
        $encoded = urlencode($text);

        // Optionnel: redirection WhatsApp désactivée pour le moment
        // $destinationPhone = '237691488604';
        // $waUrl = 'https://wa.me/' . $destinationPhone . '?text=' . $encoded;
        // return redirect()->away($waUrl);

        // Toast de confirmation pour l'utilisateur
        return redirect()
            ->route('quotes.create', [
                'product' => $validated['product_id'],
                'variant' => $variantId,
            ])
            ->with('success', 'Votre demande a bien été prise en compte. Un de nos commerciaux vous contactera.');
    }
}


