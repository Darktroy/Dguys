<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\bankAccountDetails;
use App\Http\Controllers\Controller;

class BankAccountController extends Controller
{
    /**
     * Show the form for creating a new bank account details.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id', 'id')->all();

        return view('bank_account_details.create', compact('users'));
    }

    /**
     * Remove the specified bank account details from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $bankAccountDetails = bankAccountDetails::findOrFail($id);
            $bankAccountDetails->delete();

            return redirect()->route('bank_account_details.bank_account_details.index')
                ->with('success_message', 'Bank Account Details was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Show the form for editing the specified bank account details.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $bankAccountDetails = bankAccountDetails::findOrFail($id);
        $users = User::pluck('id', 'id')->all();

        return view('bank_account_details.edit', compact('bankAccountDetails', 'users'));
    }

    /**
     * Display a listing of the bank account details.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        dd('here');
        $bankAccountDetailsObjects = bankAccountDetails::with('user')->paginate(25);

        return view('bank_account_details.index', compact('bankAccountDetailsObjects'));
    }

    /**
     * Display the specified bank account details.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $bankAccountDetails = bankAccountDetails::with('user')->findOrFail($id);

        return view('bank_account_details.show', compact('bankAccountDetails'));
    }

    /**
     * Store a new bank account details in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            bankAccountDetails::create($data);

            return redirect()->route('bank_account_details.bank_account_details.index')
                ->with('success_message', 'Bank Account Details was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Update the specified bank account details in the storage.
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

            $bankAccountDetails = bankAccountDetails::findOrFail($id);
            $bankAccountDetails->update($data);

            return redirect()->route('bank_account_details.bank_account_details.index')
                ->with('success_message', 'Bank Account Details was successfully updated.');
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
            'bank_name' => 'string|min:1|nullable',
            'bank_account_serial' => 'numeric|nullable',
        ];

        $data = $request->validate($rules);

        return $data;
    }
}
