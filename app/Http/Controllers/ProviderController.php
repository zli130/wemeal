<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Provider;

use Auth;

use File;

use App\Helpers\Strings;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::where('user_id', Auth::user()->id)->get();

        return view('_manage.providers.index')->withProviders($providers);
    }

    public function create()
    {
        return view('_manage.providers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:400',
            'address' => 'required|max:255',
            'phone' => 'required|max:50',
            'owner' => 'required|max:255',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $provider = new Provider;
        // todo:: check permissions

        $provider->name = $request->name;

        $provider->user_id = $request->user()->id;

        $provider->description = $request->description;

        $provider->active = $request->has('active') ? 1 : 0;

        $provider->address = $request->address;

        $provider->phone = $request->phone;

        $provider->owner = $request->owner;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = Strings::generateFileName($request->image);
            $request->image->move(base_path('public/images/_providers'), $filename);
            $provider->image = '_providers/'.$filename;
        } else {
            $provider->image = '_webs/no_image.png';
        }

        if ($provider->save()) {
            return redirect()->route('providers.show', $provider->id);
        } else {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $provider = Provider::where('user_id', Auth::user()->id)->with('categories')->findOrFail($id);

        return view('_manage.providers.show')->withProvider($provider);
    }

    public function edit($id)
    {
        $provider = Provider::where('user_id', Auth::user()->id)->findOrFail($id);

        return view('_manage.providers.edit')->withProvider($provider);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:400',
            'address' => 'required|max:255',
            'phone' => 'required|max:50',
            'owner' => 'required|max:255',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $provider = Provider::findOrFail($id);
        // todo:: check permissions

        $provider->name = $request->name;

        $provider->description = $request->description;

        $provider->active = $request->has('active') ? 1 : 0;

        $provider->address = $request->address;

        $provider->phone = $request->phone;

        $provider->owner = $request->owner;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = Strings::generateFileName($request->image);
            $request->image->move(base_path('public/images/_providers'), $filename);
            File::delete(base_path('public/images/').$provider->image);
            $provider->image = '_providers/'.$filename;
        }

        if ($provider->save()) {
            return redirect()->route('providers.show', $provider->id);
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        //
    }
}
