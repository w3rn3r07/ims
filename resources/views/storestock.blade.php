<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $bookstore->name . ' Bookstore Stock Information:' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <h3 class="text-lg font-semibold">Comic Bookstore Details:</h3>
                <p><strong>Bookstore ID:</strong> {{ $bookstore->bookstore_id }}</p>
                <p><strong>Bookstore Phone Number:</strong> {{ $bookstore->phone_no }}</p>
                <p><strong>Bookstore Email:</strong> {{ $bookstore->email }}</p>
                <p><strong>Bookstore Address:</strong> {{ $bookstore->street_name }}, {{ $bookstore->city }}, {{ $bookstore->postcode }}</p>
                <hr class="my-4">

                <h3 class="text-lg font-semibold mt-6 mb-2">Stock Details For Comic Book:</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-2 py-1 border">Title</th>
                                <th class="px-2 py-1 border">SKU</th>
                                <th class="px-2 py-1 border">ISBN</th>
                                <th class="px-2 py-1 border">Current</th>
                                <th class="px-2 py-1 border">Status</th>
                                <th class="px-2 py-1 border">Min</th>
                                <th class="px-2 py-1 border">Max</th>
                                <th class="px-2 py-1 border">Location</th>
                                <th class="px-2 py-1 border">Supplier</th>
                                <th class="px-2 py-1 border">Last Restock</th>
                                <th class="px-2 py-1 border">Avg Sales/Mo</th>
                                <th class="px-2 py-1 border">Reorder Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($storeStocks as $stock)
                            @if($stock->book)
                            @foreach($stock->book as $book)
                            <tr>
                                <td class="px-2 py-1 border">{{ $book->title }}</td>
                                <td class="px-2 py-1 border">{{ $stock->SKU }}</td>
                                <td class="px-2 py-1 border">{{ $book->isbn }}</td>
                                <td class="px-2 py-1 border">{{ $stock->current_stock }}</td>
                                <td class="px-2 py-1 border">{{ $stock->status }}</td>
                                <td class="px-2 py-1 border">{{ $stock->min_stock }}</td>
                                <td class="px-2 py-1 border">{{ $stock->max_stock }}</td>
                                <td class="px-2 py-1 border">{{ $stock->location_in_store ?? 'N/A' }}</td>
                                <td class="px-2 py-1 border">{{ $stock->supplier->name ?? 'N/A' }}</td>
                                <td class="px-2 py-1 border">{{ $stock->last_restock_date ?? 'N/A' }}</td>
                                <td class="px-2 py-1 border">{{ $stock->average_sales_per_month ?? 'N/A' }}</td>
                                <td class="px-2 py-1 border">{{ $stock->reorder_status ?? 'N/A' }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="12" class="px-2 py-1 border text-center">No books available for this stock entry.</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>