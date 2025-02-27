<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies.
     */
    public function index()
    {
        $company = Company::all();

        return response()->json($company);
    }

    /**
     * Store a newly created company.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'number' => 'required|string|max:20',
            'email' => 'required|email|unique:company,email',
            'address' => 'required|string',
            'banner'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $path = $request->file('banner')->store('banners', 'public');
            $data['banner'] = $path;
        }

        $company = Company::create($data);

        return redirect()->route('company')->with('success', 'Event created successfully!');
    }

    /**
     * Display a specific company.
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }

    /**
     * Update an existing company.
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $path = $request->file('banner')->store('banners', 'public');
            $data['banner'] = $path;
        }

        $company->update($data);

        return redirect()->route('company')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove a company.
     */
    public function destroy(Request $request)
    {
        $company = Company::find($request->id);
        $company->delete();

        return redirect()->route('company')->with('success', 'Event deleted successfully!');
    }

}