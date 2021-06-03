<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\AdCreateRequest;
use App\Http\Requests\UpdateAdRequest;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_id = Auth::user()->id;
        $ads = DB::table('ads')->orderBy('created_at', 'DESC')->where('users_id', [$users_id])->paginate(5);

        return view ('ads', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-ad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdCreateRequest $request)
    {
        $id = Auth::user()->id;
        
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        
        $validated = $request->validated();

        $ad = new Ad();
        $ad->title = $validated['title'];
        $ad->content = $validated['content'];
        $ad->localisation = $validated['localisation'];
        $ad->price = $validated['price'];
        $ad->image_path = $newImageName;
        $ad->users_id = Auth::user()->id;
        $ad->save();

        return redirect()->route('ad.index')->with('message', 'Annonce ajoutée avec succès !');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view ('adEdit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {

        $id = \Request::segment(2);
        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'localisation' => 'required',
            'price' => 'int|required',
        ]);
        
        $ad = Ad::find($id);
        $no_token = $request->all();
        unset($no_token['_token']);
        unset($no_token['_method']);
        unset($no_token['image']);

        $ad->update($no_token);
        
        return redirect()->route('ad.store')->with('message', 'Annonce mise à jour avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = \Request::segment(2);
        $ad = Ad::find($id);
        $ad->delete();
        return redirect()->route('ad.store')->with('message', 'Add delete successfully');

    }

}
