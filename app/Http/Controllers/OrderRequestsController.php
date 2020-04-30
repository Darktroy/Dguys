<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class OrderRequestsController extends Controller
{

    /**
     * Display a listing of the order requests.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $orderRequests = OrderRequest::with('user')->paginate(25);

        return view('order_requests.index', compact('orderRequests'));
    }

    /**
     * Show the form for creating a new order request.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();
        
        return view('order_requests.create', compact('users'));
    }

    /**
     * Store a new order request in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            OrderRequest::create($data);

            return redirect()->route('order_requests.order_request.index')
                ->with('success_message', 'Order Request was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified order request.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $orderRequest = OrderRequest::with('user')->findOrFail($id);

        return view('order_requests.show', compact('orderRequest'));
    }

    /**
     * Show the form for editing the specified order request.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $orderRequest = OrderRequest::findOrFail($id);
        $users = User::pluck('name','id')->all();

        return view('order_requests.edit', compact('orderRequest','users'));
    }

    /**
     * Update the specified order request in the storage.
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
            
            $orderRequest = OrderRequest::findOrFail($id);
            $orderRequest->update($data);

            return redirect()->route('order_requests.order_request.index')
                ->with('success_message', 'Order Request was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified order request from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $orderRequest = OrderRequest::findOrFail($id);
            $orderRequest->delete();

            return redirect()->route('order_requests.order_request.index')
                ->with('success_message', 'Order Request was successfully deleted.');
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
        $rules = [
                'user_id' => 'nullable',
            'estimated_price_by_client' => 'string|min:1|nullable',
            'order_description' => 'string|min:1|nullable',
            'status' => 'string|min:1|nullable',
            'delivery_price' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
