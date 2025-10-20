{{-- <x-filament-panels::page>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <div class="max-w-md rounded-lg shadow-lg p-6 border border-gray-300 mx-auto">
        <!-- Card Header -->
        <div class="flex items-center justify-between mb-4">
            <!-- Logo (SVG Example) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4.354 4.354 0 01-4.354 4.354H6.354A4.354 4.354 0 0112 4.354zM18.354 8.708A4.354 4.354 0 0112 4.354a4.354 4.354 0 014.354 4.354zM12 4.354V12" />
            </svg>
            <h2 class="text-2xl font-bold text-primary-600 uppercase tracking-wider">Membership Card</h2>
        </div>

        <!-- Registration Number -->
        <p class="mb-4 text-gray-500 text-sm text-center">Registration No: <span class="font-semibold text-gray-900">123456</span></p>

        <!-- Membership Details -->
        <div class="space-y-3 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Member Name:</span>
                <span class="text-gray-900 font-semibold">admin</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Membership Type:</span>
                <span class="text-gray-900 font-semibold">3</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Date:</span>
                <span class="text-gray-900 font-semibold">2024-11-27</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Amount:</span>
                <span class="text-gray-900 font-semibold">5000.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Payment Method:</span>
                <span class="text-gray-900 font-semibold">Cash</span>
            </div>
        </div>

        <!-- Received By -->
        <div class="mt-6 text-center border-t pt-4">
            <p class="text-xs text-gray-500">
                Received By: <span class="font-medium text-gray-900">Authorized Signature</span>
            </p>
        </div>

        <!-- Download Button -->
        <div class="mt-6">
            <button onclick="downloadCard()" class="w-full btn btn-primary">Download Membership Card</button>
        </div>
    </div>

    <script>
        function downloadCard() {
            const element = document.querySelector('.max-w-md');
            const opt = {
                margin: 0.3,
                filename: 'membership-card.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save();
        }
    </script>
</x-filament-panels::page> --}}
<x-filament-panels::page>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <div class="w-full max-w-lg rounded-lg shadow-lg p-6 border border-gray-300 mx-auto">
        <!-- Card Header -->
        <div class="flex items-center justify-between mb-4">
            <!-- Logo (SVG Example) -->
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4.354 4.354 0 01-4.354 4.354H6.354A4.354 4.354 0 0112 4.354zM18.354 8.708A4.354 4.354 0 0112 4.354a4.354 4.354 0 014.354 4.354zM12 4.354V12" />
            </svg> --}}
            <h2 class="text-2xl font-bold text-primary-600 uppercase tracking-wider">Membership Card</h2>
        </div>

        <!-- Registration Number -->
        <p class="mb-4 text-gray-500 text-sm ">Registration No: <span class="font-semibold text-gray-900">123456</span></p>

        <!-- Membership Details -->
        <div class="space-y-3 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Member Name:</span>
                <span class="text-gray-900 font-semibold">admin</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Membership Type:</span>
                <span class="text-gray-900 font-semibold">3</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Date:</span>
                <span class="text-gray-900 font-semibold">2024-11-27</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Amount:</span>
                <span class="text-gray-900 font-semibold">5000.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Payment Method:</span>
                <span class="text-gray-900 font-semibold">Cash</span>
            </div>
        </div>

        <!-- Received By -->
        <div class="mt-6 text-center border-t pt-4">
            <p class="text-xs text-gray-500">
                Received By: <span class="font-medium text-gray-900">Authorized Signature</span>
            </p>
        </div>

        <!-- Download Button -->
        <div class="mt-6">
            <button onclick="downloadCard()" class="w-full btn btn-primary">Download Membership Card</button>
        </div>
    </div>

    <script>
        function downloadCard() {
            const element = document.querySelector('.max-w-md');
            const opt = {
                margin: 0.3,
                filename: 'membership-card.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save();
        }
    </script>

{{-- Chat --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<div class="flex flex-col items-center justify-center  p-6">
    <div id="card" class="bg-[#171717] rounded-lg w-full max-w-lg mb-4" style="background-color: #252525; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); ">
        <div style="background-color: #e63b3bda; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; display: flex; align-items: center; justify-content: space-between; padding-left: 1rem; padding-right: 1rem; padding-top: 10px;">
            <img alt="Company Logo" class="h-12 w-12" height="50" src="https://storage.googleapis.com/a1aa/image/JOBuAVjU8EamLVKQYtVVvvrTakf7K4BUTKDfV6qArrX9B6tTA.jpg" width="50">
            <div class="text-right mt-2" >
                <h2 style="color: white;" class=" text-2xl  text-primary-600 uppercase tracking-wider">Membership Card</h2>
                <div class=" flex">

                    {{-- <p class="text-sm">Registration No: </p>
                    <p class="pl-2 font-semibold text-gray-900"> 123456</p> --}}
                    <p  style="color: white;" class="mb-4 mt-2 text-gray-100 text-sm text-center">Registration No: <span class="font-semibold ml-4 text-gray-300">123456</span></p>
                </div>
            </div>
        </div>
        <div class="p-6">
            {{-- <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">CASH <span class="text-yellow-500">RECEIPT</span></h1>
                <div class="border border-gray-300 p-2 rounded">
                    <span>Date: 01/01/2023</span>
                </div>
            </div> --}}
            <div class="text-sm" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; color:white;">
                <div>
                    <span class="font-md">Member Name</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->user->name }}</span>
                </div>
                <div>
                    <span class="font-md">Membership Type</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->user->membership_id }}</span>
                </div>
                <div>
                    <span class="font-md">Date</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->payment_date }}</span>
                </div>
                <div>
                    <span class="font-md">Amount</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->amount }}</span>
                </div>
                <div>
                    <span class="font-md">Payment Method</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->payment_method }}</span>
                </div>
            </div>
        </div>
        <div style="background-color: #e63b3bda; padding: 1rem; border-bottom-left-radius: 0.5rem; border-bottom-right-radius: 0.5rem; display: flex; flex-direction: column; justify-content: space-between; align-items: center;">

            <div class="text-sm" style="display: flex; align-items: center; gap: 1rem;">
                <span >Received By:</span>
                <span class="font-bold">Authorized Signature</span>
            </div>
        </div>
    </div>
    <button id="downloadButton" style="background-color: #F41E1E; color: white; padding: 0.5rem 1rem; border-radius: 0.25rem;" onclick="downloadPDF()">Download</button>


    <script>
        function downloadPDF() {
            const button = document.getElementById('downloadButton');
            button.style.display = 'none'; // Hide the button

            const element = document.getElementById('card');
            html2pdf(element, {
                margin: 1,
                filename: 'membership_card.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            }).then(() => {
                button.style.display = 'block'; // Show the button again
            });
        }
    </script>
</div>


<div class="flex flex-col items-center justify-center  p-6">
    <div id="card" class="bg-[#222222] rounded-lg w-full max-w-lg mb-4" style=" box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); ">
        <div style="background-color: #dd3131; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; display: flex; align-items: center; justify-content: space-between; padding-left: 1rem; padding-right: 1rem; padding-top: 10px;">
            <img alt="Company Logo" class="h-12 w-12" height="50" src="https://storage.googleapis.com/a1aa/image/JOBuAVjU8EamLVKQYtVVvvrTakf7K4BUTKDfV6qArrX9B6tTA.jpg" width="50">
            <div class="text-right mt-2">
                <h2 class="text-white text-2xl  text-primary-600 uppercase tracking-wider">Membership Card</h2>
                <div class="text-white flex">

                    {{-- <p class="text-sm">Registration No: </p>
                    <p class="pl-2 font-semibold text-gray-900"> 123456</p> --}}
                    <p class="mb-4 mt-2 text-gray-100 text-sm text-center">Registration No: <span class="font-semibold ml-4 text-gray-300">123456</span></p>
                </div>
            </div>
        </div>
        <div class="p-6">
            {{-- <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">CASH <span class="text-yellow-500">RECEIPT</span></h1>
                <div class="border border-gray-300 p-2 rounded">
                    <span>Date: 01/01/2023</span>
                </div>
            </div> --}}
            {{-- <div class="text-sm" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; color:white;">
                <div>
                    <span class="font-md">Member Name</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->user->name }}</span>
                </div>
                <div>
                    <span class="font-md">Membership Type</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->user->membership_id }}</span>
                </div>
                <div>
                    <span class="font-md">Date</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->payment_date }}</span>
                </div>
                <div>
                    <span class="font-md">Amount</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->amount }}</span>
                </div>
                <div>
                    <span class="font-md">Payment Method</span>
                </div>
                <div class="text-right">
                    <span class="font-semibold">{{ $record->payment_method }}</span>
                </div>
            </div> --}}
            <!-- Membership Details -->
        <div class="space-y-3 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Member Name:</span>
                <span class="text-gray-900 font-semibold">admin</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Membership Type:</span>
                <span class="text-gray-900 font-semibold">3</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Date:</span>
                <span class="text-gray-900 font-semibold">2024-11-27</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Amount:</span>
                <span class="text-gray-900 font-semibold">5000.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Payment Method:</span>
                <span class="text-gray-900 font-semibold">Cash</span>
            </div>
        </div>
        </div>
        <div style="background-color: #dd3131; padding: 1rem; border-bottom-left-radius: 0.5rem; border-bottom-right-radius: 0.5rem; display: flex; flex-direction: column; justify-content: space-between; align-items: center;">

            <div class="text-sm" style="display: flex; align-items: center; gap: 1rem;">
                <span >Received By:</span>
                <span class="font-bold">Authorized Signature</span>
            </div>
        </div>
    </div>
    <button id="downloadButton" style="background-color: #F41E1E; color: white; padding: 0.5rem 1rem; border-radius: 0.25rem;" onclick="downloadPDF()">Download</button>


    <script>
        function downloadPDF() {
            const button = document.getElementById('downloadButton');
            button.style.display = 'none'; // Hide the button

            const element = document.getElementById('card');
            html2pdf(element, {
                margin: 1,
                filename: 'membership_card.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            }).then(() => {
                button.style.display = 'block'; // Show the button again
            });
        }
    </script>
</div>
</x-filament-panels::page>
