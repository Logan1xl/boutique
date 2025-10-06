<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use App\Models\Products;
use App\Models\ProductVariant;

class QuoteRequestController extends Controller
{
    public function index()
    {
        $requests = QuoteRequest::latest()->paginate(20);
        return view('admin.quote_requests.index', compact('requests'));
    }

    public function show(QuoteRequest $quote_request)
    {
        $product = Products::find($quote_request->product_id);
        $variant = $quote_request->variant_id ? ProductVariant::find($quote_request->variant_id) : null;
        return view('admin.quote_requests.show', compact('quote_request', 'product', 'variant'));
    }

    public function destroy(QuoteRequest $quote_request)
    {
        $quote_request->delete();
        return redirect()->route('admin.quote_requests.index')->with('success', 'Demande supprimée');
    }
}



