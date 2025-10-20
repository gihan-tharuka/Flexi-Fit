<x-filament-panels::page>
    <!-- Load the script with defer to ensure it loads after the DOM -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" defer></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Add a delay to ensure everything is loaded before initializing the download function
            const downloadPDF = () => {
                const button = document.getElementById('downloadButton');
                const button2 = document.getElementById('backButton');
                const element = document.getElementById('schedule');

                element.style.color = 'black';
                // Hide buttons during PDF generation
                button.style.display = 'none';
                if (button2) button2.style.display = 'none';

                // Using html2pdf to download the schedule
                setTimeout(() => {
                    html2pdf(element, {
                        margin: 1,
                        filename: 'schedule.pdf',
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        html2canvas: {
                            scale: 2,
                            useCORS: true // Fix CORS issues if any images are included
                        },
                        jsPDF: {
                            unit: 'in',
                            format: 'letter',
                            orientation: 'portrait'
                        }
                    }).then(() => {
                        // Reset the text color to black and show the buttons again
                        element.style.color = '';
                        // Show buttons again after download
                        button.style.display = 'block';
                        if (button2) button2.style.display = 'block';
                    }).catch((error) => {
                        console.error("PDF generation error:", error);
                        button.style.display = 'block';
                        if (button2) button2.style.display = 'block';
                    });
                }, 500); // Add a small delay to ensure DOM stability
            };

            // Assign the function to the button click
            document.getElementById('downloadButton').addEventListener('click', downloadPDF);
        });
    </script>

    <div id="schedule" class="max-w-4xl mx-auto shadow-xl rounded-lg p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl text-gray-800" style="margin-right: 20px;">{{ $record->name }}</h1>
            <div class="flex space-x-4">
                <button id="downloadButton"
                    class="px-4 py-1 rounded-md shadow-lg focus:outline-none focus:ring-4 transform transition-transform duration-300 hover:scale-105"
                    style="background-color: #EF4444">
                    Download
                </button>
            </div>
        </div>

        <h2 class="text-2xl font-semibold text-gray-300 mb-4">Workouts</h2>

        @foreach ($record->workouts as $workout)
            <div class="mb-6" style="margin-bottom: 1.5rem;">
                <h3 class="text-xl mb-2">{{ $workout->name }}</h3>
                <table class="min-w-full shadow-lg border border-gray-300 rounded-lg overflow-hidden">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-bold">Exercise Name</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-bold">Sets</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-bold">Reps</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-bold">Rest Time (seconds)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workout->exercises as $exercise)
                            <tr>
                                <td class="py-3 px-4 border-b border-gray-200">{{ $exercise->name }}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{ $exercise->sets }}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{ $exercise->reps }}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{ $exercise->rest_time }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>
