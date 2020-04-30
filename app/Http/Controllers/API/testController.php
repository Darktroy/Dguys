<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Models\vehicleDetails;
use App\Models\DriverToRequest;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    public function test() {
        dd(DriverToRequest::all());
    }
    /**
     * Show the form for creating a new vehicle details.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id', 'id')->all();

        return view('vehicle_details.create', compact('users'));
    }

    /**
     * Remove the specified vehicle details from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $vehicleDetails = vehicleDetails::findOrFail($id);
            $vehicleDetails->delete();

            return redirect()->route('vehicle_details.vehicle_details.index')
                ->with('success_message', 'Vehicle Details was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Show the form for editing the specified vehicle details.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $vehicleDetails = vehicleDetails::findOrFail($id);
        $users = User::pluck('id', 'id')->all();

        return view('vehicle_details.edit', compact('vehicleDetails', 'users'));
    }

    /**
     * Display a listing of the vehicle details.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $vehicleDetailsObjects = vehicleDetails::with('user')->paginate(25);

        return view('vehicle_details.index', compact('vehicleDetailsObjects'));
    }

    /**
     * Display the specified vehicle details.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $vehicleDetails = vehicleDetails::with('user')->findOrFail($id);

        return view('vehicle_details.show', compact('vehicleDetails'));
    }

    /**
     * Store a new vehicle details in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            vehicleDetails::create($data);

            return redirect()->route('vehicle_details.vehicle_details.index')
                ->with('success_message', 'Vehicle Details was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Update the specified vehicle details in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $vehicleDetails = vehicleDetails::findOrFail($id);
            $vehicleDetails->update($data);

            return redirect()->route('vehicle_details.vehicle_details.index')
                ->with('success_message', 'Vehicle Details was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        return true;
    }
}
