<!DOCTYPE html>
<html lang="en" class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>
<body class="bg-black text-white min-h-screen">
<!-- Outer Container -->
<div id="invoice-card" class="max-w-4xl mx-auto my-4 sm:my-10 px-4 sm:px-6 lg:px-8">
    <!-- Receipt Card: White background with dark text -->
    <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl border border-gray-300">
        <!-- Buttons -->
        <div id="buttons" class="flex justify-end gap-x-3 mb-6">
            <button id="download-button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-300 bg-white text-black shadow-sm hover:bg-gray-100">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" x2="12" y1="15" y2="3"/>
                </svg>
                Download Receipt
            </button>
            <!-- New Back to Orders Button -->
            <a href="{{ url()->previous() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-300 bg-white text-black shadow-sm hover:bg-gray-100">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Back to Orders
            </a>
        </div>
        <!-- End Buttons -->

        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-300 pb-5 mb-5">
            <div>
                <div class="flex items-center gap-x-3">
                    <svg class="w-10 h-10 text-black" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 26V13C1 6.37258 6.37258 1 13 1C19.6274 1 25 6.37258 25 13C25 19.6274 19.6274 25 13 25H12" stroke="currentColor" stroke-width="2"/>
                        <path d="M5 26V13.16C5 8.65336 8.58172 5 13 5C17.4183 5 21 8.65336 21 13.16C21 17.6666 17.4183 21.32 13 21.32H12" stroke="currentColor" stroke-width="2"/>
                        <circle cx="13" cy="13.0214" r="5" fill="currentColor"/>
                    </svg>
                    <h1 class="text-xl font-bold text-black">Flexifit</h1>
                </div>
                <p class="mt-1 text-sm text-gray-600">123 Main Street, City, Country</p>
                <p class="text-sm text-gray-600">Phone: (123) 456-7890</p>
            </div>
            <div class="mt-4 sm:mt-0 text-left sm:text-right">
                <h2 class="text-2xl font-bold text-black">Receipt #{{ $receipt->id ?? '3682303' }}</h2>
                <span class="mt-1 block text-sm text-gray-600">
            Date: {{ $receipt->created_at ? $receipt->created_at->format('M d, Y') : 'March 10, 2023' }}
          </span>
            </div>
        </div>
        <!-- End Header -->

        <!-- Customer and Order Details (Stacked) -->
        <div class="grid grid-cols-1 gap-6 mb-6 border-b border-gray-300 pb-6">
            <!-- Customer Information -->
            <div>
                <h3 class="text-lg font-bold text-black mb-3">Customer Information</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Name:</span>
                        <span class="text-black">{{ $receipt->first_name ?? 'Sara Williams' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Phone:</span>
                        <span class="text-black">{{ $receipt->phone ?? '(123) 456-7890' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Note:</span>
                        <span class="text-black">{{ $receipt->notes ?? 'No spicy' }}</span>
                    </div>
                    @if(isset($receipt->address) && !empty($receipt->address))
                        <div class="flex justify-between">
                            <span class="font-medium text-gray-600">Delivery Address:</span>
                            <span class="text-black">{{ $receipt->address }}</span>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Order Details -->
            <div>
                <h3 class="text-lg font-bold text-black mb-3">Order Details</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Order Status:</span>
                        <span class="text-black">
                @if(isset($receipt->Order_status))
                                @if($receipt->Order_status == 0)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                      Processing
                    </span>
                                @elseif($receipt->Order_status == 1)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                      Delivered
                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                      Cancelled
                    </span>
                                @endif
                            @else
                                Processing
                            @endif
              </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Payment Method:</span>
                        <span class="text-black">{{ $receipt->payment_method ?? 'Cash on Pickup' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Customer and Order Details -->

        <!-- Order Items Table -->
        <div class="mb-6">
            <h3 class="text-lg font-bold text-black mb-3">Order Items</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr class="text-left bg-white">
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-black uppercase">Item</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-black uppercase">Qty</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-black uppercase text-right">Unit Price</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-black uppercase text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                    @if(isset($receipt->order_product) && $receipt->order_product->count() > 0)
                        @foreach($receipt->order_product as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                    {{ $item->product->name ?? 'Main Product' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black text-right">
                                    {{ $item->product->discount_price }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black text-right">
                                    @if(isset($item->product) && isset($item->quantity))
                                        {{ number_format($receipt->total) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Order Items Table -->

        <!-- Totals -->
        <div class="flex justify-end mb-6">
            <div class="w-full sm:w-1/2 md:w-1/3">
                <div class="border-t border-gray-300 pt-4">
                    <div class="flex justify-between text-sm mb-2">
                        <span class="font-medium text-gray-600">Subtotal:</span>
                        <span class="text-black">
                {{ isset($receipt->total) ? number_format($receipt->total, 2) : '0.00' }}
              </span>
                    </div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="font-medium text-gray-600">Tax:</span>
                        <span class="text-black">
                {{ isset($receipt->tax) ? number_format($receipt->tax, 2) : '1.95' }}
              </span>
                    </div>
                    <div class="flex justify-between font-bold text-base border-t border-gray-300 pt-2 mt-2">
                        <span class="text-black">Total:</span>
                        <span class="text-black">
                {{ number_format($receipt->total ?? 0, 2) }}
              </span>
                    </div>
                    @if(isset($receipt->payment_status) && $receipt->payment_status == 1)
                        <div class="flex justify-between text-sm mt-2">
                            <span class="font-medium text-gray-600">Payment Status:</span>
                            <span class="text-green-600 font-medium">Paid</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- End Totals -->

        <!-- Footer -->
        <div class="border-t border-gray-300 pt-6 mt-2">
            <h4 class="text-lg font-bold text-black mb-2">Thank you for your order!</h4>
            <p class="text-sm text-gray-600 mb-4">
                If you have any questions about your order, please contact us:
            </p>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between text-sm text-gray-600">
                <div class="mb-2 sm:mb-0">
                    <p>Email: support@flexifit.com</p>
                    <p>Phone: (123) 456-7890</p>
                </div>
                <div class="text-center sm:text-right">
                    <p>© {{ date('Y') }} Flexifit</p>
                    <p>Thank you for dining with us!</p>
                </div>
            </div>
        </div>
        <!-- End Footer -->
    </div>
    <!-- End Receipt Card -->
</div>
<!-- End Outer Container -->

<script>
    document.getElementById('download-button').addEventListener('click', function(e) {
        e.preventDefault();
        var element = document.getElementById('invoice-card');
        var buttons = document.getElementById('buttons');
        // Hide the buttons before generating PDF
        buttons.style.display = 'none';
        // Set options for PDF generation
        var opt = {
            margin: [0.5, 0.5, 0.5, 0.5],
            filename: 'order-receipt.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, useCORS: true },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        // Generate PDF
        html2pdf().set(opt).from(element).save().then(function() {
            // Show the buttons again after PDF generation
            buttons.style.display = 'flex';
        });
    });
</script>
</body>
</html>
