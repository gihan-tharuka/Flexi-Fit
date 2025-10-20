<x-filament-panels::page>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
    function downloadPDF() {
        const button = document.getElementById('downloadButton');
        const element = document.getElementById('workoutLog');

        // Check if the element exists
        if (!element) {
            console.error('Workout log element not found.');
            return;
        }

        // Hide the download button temporarily
        button.style.display = 'none';

        // Initialize the html2pdf with the required options
        const options = {
            margin: 1,
            filename: 'workout-log.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2,
                useCORS: true // Helps prevent CORS issues
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };

        // Generate the PDF
        html2pdf().from(element).set(options).save().finally(() => {
            // Restore the visibility of the button
            button.style.display = 'block';
        });
    }
</script>

    <div id="workoutLog" class="max-w-4xl mx-auto shadow-xl rounded-lg p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl text-gray-800" style="margin-right: 20px;">Log Date: {{ $record->workout_date }}</h1>
            <div class="flex space-x-4">
                <button id="downloadButton" onclick="downloadPDF()"
                    class="px-4 py-1 rounded-md shadow-lg focus:outline-none focus:ring-4 transform transition-transform duration-300 hover:scale-105" style="background-color: #EF4444">
                    Download
                </button>
            </div>
        </div>

        <h2 class="text-2xl font-semibold text-gray-300 mb-4">Name: {{ $record->workout_name }}</h2>

        @foreach ($record->exerciseLogs as $exerciseLog)
            <div class="mb-6" style="margin-bottom: 1.5rem;">
                <h3 class="text-xl  mb-2">{{ $exerciseLog->exercise_name }}</h3>
                <table class="w-full min-w-full shadow-lg border border-gray-300 rounded-lg overflow-hidden">
                    <thead>
                        <tr class=" " >
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-bold">Set</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-bold">Reps</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-bold">Weight (kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exerciseLog->setLogs as $index => $setLog)
                            <tr class="">
                                <td class="py-3 px-4 border-b border-gray-200">{{ $index + 1 }}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{ $setLog->reps }}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{ $setLog->weight }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>
