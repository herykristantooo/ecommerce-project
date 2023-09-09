<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::orderBy('id', 'DESC')->paginate(4);
        return view('admin.colors.index', ['colors'=> $colors]);

    }
    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        $color = new Color;

        $color->name = $validatedData['name'];
        $color->code = $validatedData['code'];
        $color->status = $request->status == true ? '1':'0';

        $color->save();

        return redirect('admin/colors')->with('message', 'Color Added Succesfully');

    }

    public function edit(int $color_id)
    {
        $color = Color::FindOrFail($color_id);

        return view('admin.colors.edit',[
            'color' => $color
        ]);
    }

    public function update(ColorFormRequest $request, int $color_id)
    {
        $validatedData = $request->validated();
        // Color::find($color_id)->update($validatedData);
        Color::find($color_id)->update([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'status' => $request->status == true? '1': '0',
        ]);

        return redirect('admin/colors')->with('message', 'Color Updated Succesfully');
    }

    public function destroy(int $color_id)
    {
        $color = Color::FindOrFail($color_id);

        $color->delete();
        
        return redirect()->back()->with('message', 'Color Deleted');
    }
}
