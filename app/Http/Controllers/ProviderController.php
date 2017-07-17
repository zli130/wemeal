<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Provider;

use Auth;

use File;

use App\Helpers\Strings;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::where('user_id', Auth::user()->id)->get();

        return view('_manage.providers.index')->withProviders($providers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::where('user_id', Auth::user()->id)->with('categories')->findOrFail($id);

        return view('_manage.providers.show')->withProvider($provider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::where('user_id', Auth::user()->id)->findOrFail($id);

        return view('_manage.providers.edit')->withProvider($provider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:400',
            'address' => 'required|max:255',
            'phone' => 'required|max:50',
            'owner' => 'required|max:255',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
