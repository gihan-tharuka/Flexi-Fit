<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }
        .card-shadow {
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.3), 0 10px 20px -5px rgba(0, 0, 0, 0.2);
        }
        .gradient-header {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 50%, #7f1d1d 100%);
            position: relative;
            overflow: hidden;
        }
        .gradient-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        .gradient-footer {
            background: linear-gradient(135deg, #1f1f1f 0%, #2d2d2d 50%, #1a1a1a 100%);
            position: relative;
        }
        .membership-label {
            position: absolute;
            top: 20px;
            right: -40px;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: white;
            padding: 4px 35px;
            font-size: 11px;
            font-weight: bold;
            transform: rotate(45deg);
            box-shadow: 0 2px 10px rgba(220, 38, 38, 0.3);
            z-index: 10;
        }
        .membership-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.2) 50%, transparent 70%);
            animation: shine 2s infinite;
        }
        @keyframes shine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        .card-body {
            background: linear-gradient(135deg, #1f1f1f 0%, #2d2d2d 100%);
            position: relative;
        }
        .card-body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #dc2626 0%, #991b1b 50%, #7f1d1d 100%);
        }
        .info-grid {
            /* background: linear-gradient(135deg, #2d2d2d 0%, #374151 100%); */
            /* border-radius: 12px; */
            padding: 20px;
            /* box-shadow: inset 0 2px 4px rgba(0,0,0,0.3); */
        }
        .info-item {
            transition: all 0.3s ease;
        }
        .info-item:hover {
            transform: translateX(5px);
            background-color: rgba(220, 38, 38, 0.1);
        }
        .icon-container {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(220, 38, 38, 0.2);
        }
        .qr-code {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            border-radius: 8px;
            padding: 12px;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }
        .member-name {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .member-label {
            color: #9ca3af;
            font-weight: 600;
        }
        .info-label {
            color: #d1d5db;
            font-weight: 500;
        }
        .info-value {
            color: #ffffff;
            font-weight: 600;
        }
        .amount-value {
            color: #fca5a5;
            font-weight: 700;
        }
        .back-button {
            background: linear-gradient(135deg, #374151 0%, #4b5563 100%);
            border: 2px solid #374151;
            transition: all 0.3s ease;
        }
        .back-button:hover {
            background: linear-gradient(135deg, #4b5563 0%, #6b7280 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .download-button {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            border: 2px solid #dc2626;
            transition: all 0.3s ease;
        }
        .download-button:hover {
            background: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(220, 38, 38, 0.3);
        }
        .logo-container {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 3px solid #dc2626;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
        }
        .id-badge {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.9) 0%, rgba(153, 27, 27, 0.9) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen p-6">

<div id="card" class="bg-white rounded-2xl overflow-hidden card-shadow w-full max-w-md mb-8 transition-all duration-500 hover:shadow-2xl relative">
    <!-- Membership ribbon -->
    <!-- <div class="membership-label">GYM PASS</div> -->

    <div class="gradient-header px-6 py-6 rounded-t-2xl flex items-center justify-between relative">
        <div class="flex items-center relative z-10">
            <div class="logo-container p-3 rounded-full">
                <img alt="Gym Logo" class="h-12 w-12 object-contain" src="https://storage.googleapis.com/a1aa/image/JOBuAVjU8EamLVKQYtVVvvrTakf7K4BUTKDfV6qArrX9B6tTA.jpg">
            </div>
            <div class="ml-4">
                <h2 class="text-white text-xl font-bold tracking-wide">FLEXIFIT GYM</h2>
                <p class="text-red-100 text-sm font-medium">STRENGTH • FITNESS • WELLNESS</p>
            </div>
        </div>
        <div class="text-right relative z-10">
            <div class="id-badge text-white px-4 py-2 rounded-full text-sm font-semibold">
                <span class="font-bold">ID:</span> {{$payment->id}}
            </div>
        </div>
    </div>

    <div class="card-body p-6 space-y-6">
        <div class="flex items-center space-x-4">
            <div class="icon-container">
                <i class="fas fa-user text-white text-sm"></i>
            </div>
            <div>
                <p class="member-label text-xs uppercase tracking-wide">Member</p>
                <p class="member-name font-bold text-xl">{{ $payment->user->name}}</p>
            </div>
        </div>

        <div class="info-grid">
            <div class="grid grid-cols-1 gap-y-4">
                <div class="info-item flex items-center justify-between p-3 rounded-lg transition-all duration-300">
                    <div class="flex items-center">
                        <div class="icon-container mr-3">
                            <i class="fas fa-award text-white text-xs"></i>
                        </div>
                        <span class="info-label text-sm">Membership Type</span>
                    </div>
                    <div class="info-value">
                        {{$payment->user->membershipPlan->name }}
                    </div>
                </div>

                <div class="info-item flex items-center justify-between p-3 rounded-lg transition-all duration-300">
                    <div class="flex items-center">
                        <div class="icon-container mr-3">
                            <i class="far fa-calendar-alt text-white text-xs"></i>
                        </div>
                        <span class="info-label text-sm">Issue Date</span>
                    </div>
                    <div class="info-value">
                        {{ $payment->payment_date }}
                    </div>
                </div>

                <div class="info-item flex items-center justify-between p-3 rounded-lg transition-all duration-300">
                    <div class="flex items-center">
                        <div class="icon-container mr-3">
                            <i class="fas fa-dollar-sign text-white text-xs"></i>
                        </div>
                        <span class="info-label text-sm">Amount Paid</span>
                    </div>
                    <div class="amount-value text-lg">
                        ${{ $payment->amount }}
                    </div>
                </div>

                <div class="info-item flex items-center justify-between p-3 rounded-lg transition-all duration-300">
                    <div class="flex items-center">
                        <div class="icon-container mr-3">
                            <i class="far fa-credit-card text-white text-xs"></i>
                        </div>
                        <span class="info-label text-sm">Payment Method</span>
                    </div>
                    <div class="info-value">
                        {{ Str::of($payment->payment_method)->replace('_', ' ')->title() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gradient-footer px-6 py-5 rounded-b-2xl flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <span class="text-white text-sm font-medium">Collected By: {{$payment->collected_by}}</span>
            <!-- <div class="w-24 h-0.5 bg-red-400 bg-opacity-60 rounded"></div> -->
        </div>
        <!-- <div class="qr-code">
            <i class="fas fa-qrcode text-white text-2xl"></i>
        </div> -->
    </div>
</div>

<!-- Back & Download buttons -->
<div class="flex flex-col sm:flex-row gap-4">
    <a href="{{ url()->previous() }}"
       class="back-button text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 flex items-center justify-center shadow-lg">
        <i class="fas fa-arrow-left mr-3"></i>
        Back
    </a>

    <button id="downloadButton"
            class="download-button text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 flex items-center justify-center shadow-lg"
            onclick="downloadPDF()">
        <i class="fas fa-download mr-3"></i>
        Download Membership Card
    </button>
</div>

<script>
    function downloadPDF() {
        const button = document.getElementById('downloadButton');
        button.style.display = 'none'; // Hide the button

        const element = document.getElementById('card');
        html2pdf(element, {
            margin: 1,
            filename: 'gym_membership_card.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        }).then(() => {
            button.style.display = 'block'; // Show the button again
        });
    }
</script>

</body>
</html>
