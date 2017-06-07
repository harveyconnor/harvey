<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;
use App\Graphics;
use Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    static public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function showGraphics()
    {

        $images = Graphics::all();
        foreach ($images as $image){
            $image->location = Storage::url('public/portfolio/graphics/'.$image['filename']);
        }

        JavaScript::put([
           'images' => json_encode($images)
        ]);

        return view('gallery.graphics');
    }

    public function showGraphicsForm()
    {

    }

    public function submitGraphics(Request $request){

        $this->validate($request,[
            'title'         => 'required',
            'description'   => 'required',
            'image'         => 'required|image'
        ]);

        $userId = Auth::user()->id;
        $fileName = self::slugify($request->input('title'));

        $file = $request->file('image');
        Storage::disk('public')->putFileAs('portfolio/graphics/', $file, $fileName.'.'.$file->getClientOriginalExtension());

        $image = Graphics::query()->create([
            'filename'      => $fileName.'.'.$file->getClientOriginalExtension(),
            'user_id'       => $userId,
            'title'         => $request->input('title'),
            'description'   => $request->input('description')
        ]);

        return $image;
    }
}
