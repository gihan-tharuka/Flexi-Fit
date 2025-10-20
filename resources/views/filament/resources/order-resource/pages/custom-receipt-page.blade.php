<x-filament-panels::page>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    {{-- <div class="p-6 rounded-xl border" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold">Invoice</h2>
                <p class="text-sm text-gray-500">Order ID: #12345</p>
                <p class="text-sm text-gray-500">Date: November 28, 2024</p>
            </div>

            <div class="mb-6 mt-2 ">
                <h3 class="text-lg font-semibold">Customer Details</h3>
                <p class="text-gray-500">Name: John Doe</p>
                <p class="text-gray-500">Email: john.doe@example.com</p>
            </div>
        </div>

        <div class="mb-6 mt-6">
            <h3 class="text-lg font-semibold">Order Summary</h3>
            <table class="w-full border-collapse border mt-2 border-gray-100 rounded-xl overflow-hidden">
                <thead>
                    <tr style="background-color: #c03d3d;">
                        <th class="p-3 border border-gray-200 text-left">Product</th>
                        <th class="p-3 border border-gray-200 text-right">Quantity</th>
                        <th class="p-3 border border-gray-200 text-right">Unit Price</th>
                        <th class="p-3 border border-gray-200 text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-3 border border-gray-200">Fitness Band</td>
                        <td class="p-3 border border-gray-200 text-right">2</td>
                        <td class="p-3 border border-gray-200 text-right">$25.00</td>
                        <td class="p-3 border border-gray-200 text-right">$50.00</td>
                    </tr>
                    <tr>
                        <td class="p-3 border border-gray-200">Protein Powder</td>
                        <td class="p-3 border border-gray-200 text-right">1</td>
                        <td class="p-3 border border-gray-200 text-right">$45.00</td>
                        <td class="p-3 border border-gray-200 text-right">$45.00</td>
                    </tr>
                    <tr>
                        <td class="p-3 border border-gray-200">Yoga Mat</td>
                        <td class="p-3 border border-gray-200 text-right">3</td>
                        <td class="p-3 border border-gray-200 text-right">$20.00</td>
                        <td class="p-3 border border-gray-200 text-right">$60.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr style="background-color: #c03d3d;">
                        <td colspan="3" class="p-3 border border-gray-200 text-right font-bold">Subtotal</td>
                        <td class="p-3 border border-gray-200 text-right">$155.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="p-3 border border-gray-200 text-right font-bold">Tax (5%)</td>
                        <td class="p-3 border border-gray-200 text-right">$7.75</td>
                    </tr>
                    <tr style="background-color: #c03d3d;">
                        <td colspan="3" class="p-3 border border-gray-200 text-right font-bold">Total</td>
                        <td class="p-3 border border-gray-200 text-right">$162.75</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="text-right mt-6">
            <x-filament::button color="primary" tag="a" href="#">
                Print Invoice
            </x-filament::button>
        </div>
    </div> --}}

    <div id="receipt" class="p-6 rounded-xl border  shadow-md" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
            <div class="mb-4">
                <h2 class="text-2xl font-bold">Invoice</h2>
                <p class="text-sm text-gray-500">Order ID: #{{$record->id}}</p>
                <p class="text-sm text-gray-500">Date: {{$record->created_at}}</p>
                <p class="text-sm text-gray-500">
                    Payment Status:
                    @switch($record->status)
                        @case(0)
                            <span class="text-yellow-500">Pending</span>
                            @break
                        @case(1)
                            <span class="text-green-500">Confirmed</span>
                            @break
                        @case(2)
                            <span class="text-red-500">Denied</span>
                            @break
                        @default
                            <span class="text-gray-500">Unknown</span>
                    @endswitch
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <h3 class="text-lg font-semibold">Customer Details</h3>
                <p class="text-gray-500">Name: {{$record->first_name }} {{$record->last_name}}</p>
                <p class="text-gray-500">Email: {{$record->email}}</p>

            </div>
            </div>

            <div style="text-align: right; margin-bottom: 1rem; display: flex; flex-direction: column; align-items: flex-end;">
                <!-- Logo -->
                <div class="mb-2">
                    <img src="{{ asset('img/logo-2.png') }}" width="80px" alt="Company Logo">
                </div>

                <!-- Company Details -->
                <div class="mt-6">
                    <p class="text-sm text-gray-600">1234 Street Name, City, State, 15987</p>
                    <p class="text-sm text-gray-600">Phone: (123) 456-7890</p>
                    <p class="text-sm text-gray-600">Email: flexifit@gmail.com</p>
                </div>
            </div>

        </div>



        <div class="mb-6 mt-6">
            <h3 class="text-lg font-semibold">Order Summary</h3>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border mt-2 border-gray-100 rounded-xl overflow-hidden text-sm">
                    <thead>
                        <tr style="background-color: #c03d3d;">
                            <th class="p-2 border border-gray-200 text-left">Product</th>
                            <th class="p-2 border border-gray-200 text-right">Quantity</th>
                            <th class="p-2 border border-gray-200 text-right">Unit Price</th>
                            <th class="p-2 border border-gray-200 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->products as $item)


                        <tr>
                            <td class="p-2 border border-gray-200">{{$item->name}}</td>
                            <td class="p-2 border border-gray-200 text-right">{{$item->pivot->quantity}}</td>
                            <td class="p-2 border border-gray-200 text-right">Rs.{{$item->pivot->price}}</td>
                            <td class="p-2 border border-gray-200 text-right">Rs.{{ $item->pivot->quantity * $item->pivot->price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #c03d3d;">
                            <td colspan="3" class="p-2 border border-gray-200 text-right font-bold">Subtotal</td>
                            <td class="p-2 border border-gray-200 text-right">Rs.{{$record->sub_total}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-2 border border-gray-200 text-right font-bold">Delivery</td>
                            <td class="p-2 border border-gray-200 text-right">Rs.399</td>
                        </tr>
                        <tr style="background-color: #c03d3d;">
                            <td colspan="3" class="p-2 border border-gray-200 text-right font-bold">Total</td>
                            <td class="p-2 border border-gray-200 text-right">Rs.{{$record->total}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
       <div class="text-right mt-6"  id="printButton">
            <x-filament::button color="primary" tag="a" href="#" onclick="downloadCard()">
                Print Invoice
            </x-filament::button>
        </div>

    </div>


{{-- <script>
        function downloadCard() {
            const element = document.getElementById('receipt');
            const opt = {
                margin: 0.3,
                filename: 'invoice.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save();
        }
    </script> --}}

    <script>
    function downloadCard() {
        const element = document.getElementById('receipt');
        const printButton = document.getElementById('printButton');
        printButton.style.display = 'none'; // Hide the button

        const opt = {
            margin: 0.3,
            filename: 'invoice.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        html2pdf().from(element).set(opt).save().then(() => {
            printButton.style.display = 'block'; // Show the button again
        });
    }
</script>
</x-filament-panels::page>
