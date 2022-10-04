<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Http\Requests\CreateRequest;


class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::get();
        return view('foods.index', [
            'foods' => $foods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('foods.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->file('image')->guessExtension());
        // dd($request->file('image')->getSize());
        // dd($request->file('image')->getError());
        // dd($request->file('image')->isValid());
        $request->validate([
            'name' => 'required',
            'count' => 'required|integer|min:0|max:20',
            'category_id' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $generatedImageName = 'image'.time().'-'
                                .$request->name.'.'
                                .$request->image->extension();

        // move to a folder
        $request->image->move(public_path('backend/images'), $generatedImageName);

        $food = Food::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'count' => $request->input('count'),
            'category_id' => $request->input('category_id'),
            'image_path' => $generatedImageName,
        ]);

        $food->save();
        return redirect('/foods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);
        $category = Category::find($food->category_id);

        $food->category = $category;
        // dd($food);
        return view('foods.show')->with('food', $food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // truyền dữ liệu xuống và hiện ra UI để custumer edit lại
        $food = Food::find($id)->first();
        // dd($food);
        return view('foods.edit')->with('food', $food);
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
        $food = Food::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'count' => $request->input('count'),
            ]);
        return redirect('/foods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        // dd($id);
        return redirect('/foods');
    }
}
