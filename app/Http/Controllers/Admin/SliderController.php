<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('admin.sliders.index', ['sliders' => $sliders]);
    }

    public function create()
    {
        return view('admin.sliders.create');
    }
    
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/slider/', $filename);

            $validatedData['image'] = "uploads/slider/$filename";

        }

        $validatedData['status'] = $request->status == true ? '1' :'0';

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],

        ]);

        return redirect('admin/sliders')->with('message', 'Slider Added Succesfully');
    }

    public function edit(int $slider_id)
    {
        $slider = SLider::FindOrFail($slider_id);
        // return $slider_id;
        return view('admin.sliders.edit',[
            'slider' => $slider
        ]);
    }

    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();

        if($request->hasFile('image')){
            $path = $slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/slider/', $filename);

            $validatedData['image'] = "uploads/slider/$filename";

        }

        $validatedData['status'] = $request->status == true ? '1' :'0';

        Slider::where('id', $slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $slider->image,
            'status' => $validatedData['status'],

        ]);
        return redirect('admin/sliders')->with('message', 'Slider Updated Succesfully');
    }

    public function destroy(Slider $slider)
    {
        // return $slider->id;
        $slider = Slider::FindOrFail($slider->id);
        $path = $slider->image;
        if(File::exists($path)){
                File::delete($path);
            }
        $slider->delete();
        
        return redirect()->back()->with('message', 'Slider Deleted');
    }

}
