<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SettingsRepository;
use App\Models\Language;
use App\Models\Setting;
use DB;
use Auth;

class SettingsController extends Controller
{
    protected $settings;

    public function __construct(SettingsRepository $settings)
    {
        $this->settings = $settings;
    }

    public function index(Request $request)
    {
        return view('user.settings.index', [
            'settings' => $this->settings->getSettings(),
            'setting' => $this->settings->getSetting(),
            'languages' => $this->settings->getLanguages(),
            'c_locale' => \App::getLocale(),
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        if($request->password=='') {
            $this->validate($request, [
                'username' => 'bail|required|min:6|unique:users,username,'.$user->id,
                'name' => 'bail|required',
                'email' => 'bail|required|email',
            ]);

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->save();
        } else {
            $this->validate($request, [
                'username' => 'bail|required|min:6|unique:users,username,'.$user->id,
                'name' => 'bail|required',
                'email' => 'bail|required|email',
                'password' => 'bail|required|min:6|confirmed',
            ]);

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
        }

        flash()->success('Account updated');
        return redirect()->route('settings');
    }

    public function companyUpdate(Request $request)
    {
        $this->authorize('access', Setting::class);

        $this->validate($request, [
            'name' => 'bail|required',
            'email' => 'bail|email',
        ]);

        $settings = $this->settings->getSetting();
        $settings->name = $request->name;
        $settings->address = $request->address;
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->location = $request->location;
        $settings->save();

        flash()->success('Company updated');
        return redirect()->route('settings');
    }

    public function overmissedUpdate(Request $request)
    {
        $this->authorize('access', Setting::class);

        $this->validate($request, [
            'over_time' => 'bail|required|numeric',
            'missed_time' => 'bail|required|numeric',
        ]);

        $settings = $this->settings->getSetting();
        $settings->over_time = $request->over_time;
        $settings->missed_time = $request->missed_time;
        $settings->save();

        flash()->success('Settings updated');
        return redirect()->route('settings');
    }

    public function localeUpdate(Request $request)
    {
        $this->authorize('access', Setting::class);

        $this->validate($request, [
            'language' => 'bail|required|exists:languages,id',
        ]);

        $settings = $this->settings->getSetting();
        $settings->language_id = $request->language;
        $settings->save();

        $locale = Language::find($request->language);
        $request->session()->put('locale', $locale->code);

        flash()->success('Language updated');
        return redirect()->route('settings');
    }


    public function fetch(Request $request)
    {
     $value = $request->get('v_id');
     $data = DB::table('departments')
              ->where('vendor', $value)
              ->get();
     $output = '<option value="">Select Department</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
     }
     echo json_encode($output);
    }


    public function fetch_cont(Request $request)
    {
     $value = $request->get('v_id');
     $data = DB::table('counters')
              ->where('dep', $value)
              ->get();
     $output = '<option value="">Select Counter</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
     }
     echo json_encode($output);
    }


}
