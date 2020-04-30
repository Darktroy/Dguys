<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Models\deliveryGuyDetails;
use App\Http\Controllers\Controller;

class DeliveryGuyDetailsController extends Controller
{
    /**
     * Show the form for creating a new delivery guy details.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id', 'id')->all();

        return view('delivery_guy_details.create', compact('users'));
    }

    /**
     * Remove the specified delivery guy details from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deliveryGuyDetails = deliveryGuyDetails::findOrFail($id);
            $deliveryGuyDetails->delete();

            return redirect()->route('delivery_guy_details.delivery_guy_details.index')
                ->with('success_message', 'Delivery Guy Details was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Show the form for editing the specified delivery guy details.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deliveryGuyDetails = deliveryGuyDetails::findOrFail($id);
        $users = User::pluck('id', 'id')->all();

        return view('delivery_guy_details.edit', compact('deliveryGuyDetails', 'users'));
    }

    /**
     * Display a listing of the delivery guy details.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $deliveryGuyDetailsObjects = deliveryGuyDetails::with('user')->paginate(25);

        return view('delivery_guy_details.index', compact('deliveryGuyDetailsObjects'));
    }

    /**
     * Display the specified delivery guy details.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deliveryGuyDetails = deliveryGuyDetails::with('user')->findOrFail($id);

        return view('delivery_guy_details.show', compact('deliveryGuyDetails'));
    }

    /**
     * Store a new delivery guy details in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            deliveryGuyDetails::create($data);

            return redirect()->route('delivery_guy_details.delivery_guy_details.index')
                ->with('success_message', 'Delivery Guy Details was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Update the specified delivery guy details in the storage.
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

            $deliveryGuyDetails = deliveryGuyDetails::findOrFail($id);
            $deliveryGuyDetails->update($data);

            return redirect()->route('delivery_guy_details.delivery_guy_details.index')
                ->with('success_message', 'Delivery Guy Details was successfully updated.');
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
