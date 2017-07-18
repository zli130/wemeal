<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Meal;

use File;

use App\Helpers\Strings;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:400',
            'price' => 'required|between:0,99.99',
            'image'=> 'mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $meal = new Meal;
        // todo:: check permissions

        $meal->name = $request->name;

        $meal->description = $request->description;

        $meal->category_id = $request->category;

        $meal->provider_id = $request->provider;

        $meal->active = $request->has('active') ? 1 : 0;

        $meal->price = $request->price;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = Strings::generateFileName($request->image);
            $request->image->move(base_path('public/images/_meals'), $filename);
            $meal->image = '_meals/'.$filename;
        } else {
            $meal->image = '_webs/no_image.png';
        }

        if ($meal->save()) {
            return redirect()->route('meals.show', $meal->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::with('provider', 'category')->findOrFail($id);

        return view('_manage.meals.show')->withMeal($meal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = Meal::with('provider', 'category')->findOrFail($id);

        return view('_manage.meals.edit')->withMeal($meal);
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
            'price' => 'required|between:0,99.99',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $meal = Meal::findOrFail($id);

        $meal->name = $request->name;

        $meal->description = $request->description;

        $meal->price = $request->price;

        $meal->active = $request->has('active') ? 1 : 0;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = Strings::generateFileName($request->image);
            $request->image->move(base_path('public/images/_meals'), $filename);
            File::delete(base_path('public/images/').$meal->image);
            $meal->image = '_meals/'.$filename;
        }

        if ($meal->save()) {
            return redirect()->route('meals.show', $meal->id);
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
