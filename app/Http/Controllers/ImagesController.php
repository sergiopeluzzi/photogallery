<?php

namespace PhotoGallery\Http\Controllers;

use Illuminate\Http\Request;

use PhotoGallery\Http\Requests;
use PhotoGallery\Models\Album;
use PhotoGallery\Models\Image;

class ImagesController extends Controller
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

    public function getForm($id)
    {
        $data['album'] = $this->album->find($id);
        return view('addimage')->with($data);
    }

    public function postAdd(Request $request)
    {
        $files = $request->file('image');

        $file_count = count($files);
        foreach ($files as $file) {
            $rules = [
                'album_id' => 'required|numeric|exists:albums,id',
                'image'=>'required'
            ];

            $validator = $this->validate($request, $rules);

            if(!is_null($validator)){
                return redirect()->route('add_image', ['id' => $request->get('album_id')])->withErrors($validator)->withInput();
            }

            $random_name = str_random(8);
            $destinationPath = 'albums/';
            $extension = $file->getClientOriginalExtension();
            $filename = $random_name.'_album_image.'.$extension;
            $uploadSuccess = $file->move($destinationPath, $filename);

            $this->image->create([
                'description' => $request->get('description'),
                'image' => $filename,
                'album_id'=> $request->get('album_id')
            ]);
        }

        return redirect()->route('show_album', ['id' => $request->get('album_id')]);
    }

    public function getDelete($id)
    {
        $image = $this->image->find($id);

        $image->delete();

        return redirect()->route('show_album', ['id' => $image->album_id]);
    }

    public function postMove(Request $request)
    {
        $rules = [
            'new_album' => 'required|numeric|exists:albums,id',
            'photo'=>'required|numeric|exists:images,id'
        ];

        $validator = $this->validate($request, $rules);

        if(!is_null($validator)){
            return redirect()->route('index');
        }

        $image = $this->image->find($request->get('photo'));
        $image->album_id = $request->get('new_album');
        $image->save();
        return redirect()->route('show_album', ['id' => $request->get('new_album')]);
    }
}
