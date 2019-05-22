<?php

namespace RB28DETT\Settings\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RB28DETT\RB28DETT\Packages;
use RB28DETT\Settings\Models\Settings;
use RB28DETT\Settings\Settings as Setts;

class SettingsController extends Controller
{
    /**
     * Display all the modules settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::all();
        $final_packages = [];

        foreach ($packages as $package) {
            $sets = Setts::get($package);
            if ($sets) {
                $final_packages[$package] = Setts::view($package);
            }
        }

        return view('rb28dett_settings::index', ['packages' => $final_packages]);
    }

    /**
     * Update the general settings.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->authorize('update', Settings::class);

        $this->validate($request, [
            'appname'     => 'required',
            'description' => 'required',
            'keywords'    => 'required',
            'author'      => 'required',
        ]);

        Settings::first()->update([
            'appname'       => $request->appname,
            'description'   => $request->description,
            'keywords'      => $request->keywords,
            'author'        => $request->author,
        ]);

        return redirect()->route('rb28dett::settings.index', ['p' => 'Settings'])->with('success', __('rb28dett_settings::general.updated_settings'));
    }
}
