<?php

namespace App\Http\Controllers;

use App\Models\Bookstore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class StoreStockController extends Controller
{
    public function show($id)
    {
        DB::enableQueryLog();
        $bookstore = Bookstore::findOrFail($id);
        $storeStocks = $bookstore->storeStock()->with('book')->get();

        $queries = DB::getQueryLog();


        Log::info('Bookstore ID:', ['id' => $id]);
        Log::info('Bookstore:', ['bookstore' => $bookstore->toArray()]);
        Log::info('Store Stocks:', ['storeStocks' => $storeStocks->toArray()]);
        Log::info('Executed Queries:', $queries);

        // dd($bookstore->toArray(), $storeStocks->toArray(), $queries);

        return view('storestock', compact('bookstore', 'storeStocks'));
    }
}
