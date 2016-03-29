<?php

namespace PhotoGallery\Http\Controllers;

use Illuminate\Http\Request;

use PhotoGallery\Http\Requests;
use PhotoGallery\Models\Album;
use PhotoGallery\Models\Image;

class AlbumsController extends Controller
{
    /**
     * @var Album
     */
    private $album;
    /**
     * @var Image
     */
    private $image;

    public function __construct(Album $album, Image $image)
    {
        $this->album = $album;
        $this->image = $image;
    }

    public function getList()
    {
        $data['albums'] = $this->album->with('Photos')->get();

        return view('index')->with($data);
    }

    public function getAlbum($id)
    {
        $data['album'] = $this->album->with('Photos')->find($id);

        return view('album')->with($data);
    }

    public function getForm()
    {
        return view('createalbum');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required',
            'cover_image'=>'required|image'
        ];

        $validator = $this->validate($request, $rules);

        if(!is_null($validator)){
            return redirect()->route('create_album_form')->withErrors($validator)->withInput();
        }

        $file = $request->file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename = $random_name.'_cover.'.$extension;
        $uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
        $album = $this->album->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'cover_image' => $filename,
        ]);

        return redirect()->route('show_album', ['id' => $album->id ]);
    }

    public function getDelete($id)
    {
        $album = $this->album->find($id);

        $album->delete();

        return redirect()->route('index');
    }

}
