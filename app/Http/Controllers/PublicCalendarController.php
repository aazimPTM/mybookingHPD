<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicCalendarController extends Controller
{
    /**
     * Display the public calendar view (no authentication required).
     */ 
    public function index(): View
    {
        // Get all active rooms (public view, show all)
        $rooms = Room::where('is_active', true)->orderBy('name')->get();

        return view('public.calendar', compact('rooms'));
    }

    /**
     * Get bookings for a specific date or date range (public API).
     */
    public function getBookings(Request $request)
    {
        // Range mode — for monthly calendar
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $request->validate([
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            ]);
            
            $query = Booking::with(['room'])
                ->whereBetween('start_time', [
                    $request->start_date . ' 00:00:00',
                    $request->end_date . ' 23:59:59'
                ])
                ->whereIn('status', ['approved', 'pending']);
            
            $bookings = $query->get();
            
            // Group by date
            $groupedByDate = [];
            foreach ($bookings as $booking) {
                $dateKey = $booking->start_time->format('Y-m-d');
                if (!isset($groupedByDate[$dateKey])) {
                    $groupedByDate[$dateKey] = [];
                }
                $groupedByDate[$dateKey][] = [
                    'id' => $booking->id,
                    'room_name' => $booking->room->name,
                    'status' => $booking->status,
                ];
            }
            
            return response()->json([
                'dates' => $groupedByDate,
            ]);
        }
        
        // Single date mode
        $request->validate([
            'date' => ['required', 'date'],
        ]);
        
        $date = $request->date;
        
        $query = Booking::with(['room'])
            ->whereDate('start_time', $date)
            ->whereIn('status', ['approved', 'pending'])
            ->orderBy('start_time');
        
        if ($request->filled('room_id')) {
            $query->where('room_id', $request->room_id);
        }
        
        $bookings = $query->get()->map(function ($booking) {
            return [
                'id' => $booking->id,
                'date' => $booking->start_time->format('Y-m-d'),
                'room_name' => $booking->room->name,
                'room_building' => $booking->room->building,
                'start_time' => $booking->start_time->format('g:i A'),
                'end_time' => $booking->end_time->format('g:i A'),
                'purpose' => $booking->purpose,
                'status' => $booking->status,
                // Don't expose user details in public view
                'user_name' => 'Staff Member',
            ];
        });
        
        return response()->json([
            'date' => $date,
            'bookings' => $bookings,
            'count' => $bookings->count(),
        ]);
    }
}
