<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Notifications\BookingSubmitted;
use App\Services\Notificationservice;
use Exception;
use Illuminate\Http\Request;
use NotifyLk\Api\SmsApi;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    protected $notificationService;

    public function __construct(Notificationservice $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and create the booking
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('phone'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'note' => $request->input('note'),
        ]);

        // Notify admin(s) once booking is successfully created
        if ($booking) {
            $admin = User::where('role', 1)->first(); // Assuming role 1 is for admin
            if ($admin) {
                $admin->notify(new BookingSubmitted($booking));
            }
        }

//        $this->notificationService->sendNotification(
//            'New Booking Received',
//            'A new booking has been made. Check the admin dashboard for details.',
//            '/path/to/icon.png',
//            '/admin/bookings'
//        );

        $this->sendSmsNotification($booking);


        return redirect()->back()->with('success', 'Booking submitted successfully');
    }
        private function sendSmsNotification($booking)
    {
        $api_instance = new SmsApi();
        $user_id = "28419"; // Replace with your actual user ID
        $api_key = "VShXDwJNmYzmVCMiGBGL"; // Replace with your actual API key
        $message = "Your booking is confirmed!";
        $to = "94722701880"; // Replace with the user's phone number

        try {
            $result = $api_instance->sendSMS($user_id, $api_key, $message, $to, "NotifyDEMO");
            if ($result) {
                // Log success message
                \Log::info("SMS sent successfully: " . print_r($result, true));
                echo "<script>console.log('SMS sent successfully');</script>";
            }
        } catch (Exception $e) {
            // Log error message
            \Log::error('Error sending SMS: ' . $e->getMessage());
            echo "<script>console.log('Error sending SMS: " . $e->getMessage() . "');</script>";
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
