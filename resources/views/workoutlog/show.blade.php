<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Log Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const button = document.getElementById('downloadButton');
            const backButton = document.getElementById('backButton');
            button.style.display = 'none';
            backButton.style.display = 'none';

            const element = document.getElementById('workoutLog');
            html2pdf(element, {
                margin: 1,
                filename: 'workout-log.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            }).then(() => {
                button.style.display = 'block';
                backButton.style.display = 'block';
            });
        }

        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body class="bg-gray-100 p-6">
    <div id="workoutLog" class="max-w-4xl mx-auto bg-white shadow-sm rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Workout Log for {{ $workoutLog->workout_date }}</h1>
            <div class="flex space-x-4">
                <button id="downloadButton" onclick="downloadPDF()" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-2 rounded-full shadow-lg hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 transform transition-transform duration-300 hover:scale-105">
                    Download
                </button>
                <button id="backButton" onclick="goBack()" class="bg-gray-500 text-white px-6 py-2 rounded-full shadow-lg hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-500 focus:ring-opacity-50 transform transition-transform duration-300 hover:scale-105">
                    Back
                </button>
            </div>
        </div>

        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Workout Name: {{ $workoutLog->workout_name }}</h2>

        @foreach ($workoutLog->exerciseLogs as $exerciseLog)
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-600 mb-2">{{ $exerciseLog->exercise_name }}</h3>
                <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-700">Set</th>
                            <th class="py-3 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-700">Reps</th>
                            <th class="py-3 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-700">Weight (kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exerciseLog->setLogs as $index => $setLog)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b border-gray-200">Set {{ $index + 1 }}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{ $setLog->reps }}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{ $setLog->weight }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</body>
</html>
