<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SettingsRepository;
use App\Models\Language;
use App\Models\Setting;
use Auth;


class CompanyController extends Controller
{
    protected $settings;

    public function __construct(SettingsRepository $settings)
    {
        $this->settings = $settings;
    }

    public function index()
    {
         $this->authorize('access', Setting::class);

        return view('user.company.index' , [
            'settings' => $this->settings->getSettings(),
        ]);
    }

    public function create()
    {
        $this->authorize('access', Setting::class);
    
        return view('user.company.create', [
            'settings' => $this->settings->getSettings(),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('access', Setting::class);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $com = new Setting; 
        $com->create($request->all());
        flash()->success('Company created');
        return redirect()->route('company.index');
    }

    // public function edit(Request $request, Company $company)
    // {
    //     $this->authorize('access', Company::class);

    //     return view('user.Company.edit', [
    //         'Company' => $Company,
    //     ]);
    // }

    // public function update(Request $request, Company $company)
    // {
    //     $this->authorize('access', Company::class);

    //     // $this->validate($request, [
    //     //     'name' => 'required',
    //     //     'start' =>'required|numeric',
    //     // ]);

    //     // $department->name = $request->name;
    //     // $department->letter = $request->letter;
    //     // $department->start = $request->start;
    //     // $department->save();

    //     flash()->success('Company updated');
    //     return redirect()->route('company.index');
    // }

    // public function destroy(Request $request, Company $company)
    // {
    //     $this->authorize('access', Company::class);

    //     $department->delete();

    //     flash()->success('Department deleted');
    //     return redirect()->route('company.index');
    // }
}
