<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReservationTimeDataTable;
use App\Http\Controllers\Controller;
use App\Models\ReservationTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ReservationTimeDataTable $dataTable)
    {
        return $dataTable->render('admin.reservation.reservation-time.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.reservation.reservation-time.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'start_time' => ['required'],
            'end_time' => ['required'],
            'status' => ['required', 'boolean'],
        ]);

        ReservationTime::create($validatedData);

        toastr()->success('Reservation time added successfully.');

        return to_route('admin.reservation-time.index');
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
        $reservationTime = ReservationTime::findOrFail($id);

        return view('admin.reservation.reservation-time.components.edit', compact('reservationTime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'start_time' => ['required'],
            'end_time' => ['required'],
            'status' => ['required', 'boolean'],
        ]);

        $reservationTime = ReservationTime::findOrFail($id);

        $reservationTime->update($validatedData);

        toastr()->success('Reservation Time Updated Successfully!');

        return to_route('admin.reservation-time.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $reservationTime = ReservationTime::findOrFail($id);
            $reservationTime->delete();

            return response([
                'status' => 'success',
                'message' => 'Reservation Time Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
