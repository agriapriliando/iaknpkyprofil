<?php

namespace App\Http\Controllers;

use App\Models\Phototag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    public function index()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();

        $phototags = Phototag::all();
        return view('user.photo.daftar', compact('phototags','user'));
    }

    public function storePhototag(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul' => 'required|unique:phototags',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'errors' => $validator->errors()->all()]
            );
        }

        $phototags = Phototag::updateOrCreate([
            'id' => $request->id],[
            'judul' => $request->judul
        ]);

        if (Phototag::find($request->id)){
            Session::flash('message', 'Tag berhasil dirubah');
        } else {
            Session::flash('message', 'Tag berhasil ditambahkan');
        }

        return response()->json([
            'data' => $phototags,
        ]);

    }

    public function editPhotoTag($id)
    {
        $phototags = Phototag::find($id);
        return response()->json([
            'data' => $phototags,
        ]);
    }

    public function deletePhotoTag($id)
    {
        Phototag::find($id)->delete();

        return response()->json([
            'status' => 'Data Berhasil dihapus',
        ]);
    }
}
