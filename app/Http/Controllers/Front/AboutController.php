<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.pages.abouts.about',
            [
               'detail' => About::where('user_id',auth()->user()->id)->first()
            ]
        );
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
        $messages = [
            'editor1.nullable'  => 'Description field is invalid.',
            'editor1.max'       => 'Description field should not be more then 1000 character.'
        ];
        
        $validator = Validator::make($request->all(), [
            'editor1' => 'nullable|string|max:1000'
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $aboutJSON = [
            'descriptions'   => $request->editor1,
            'user_id'       => auth()->user()->id,
        ];
        
        if($request->_id){
            $about = About::find($request->_id);
            if($about->update($aboutJSON)){
                return redirect()->back()->with('success','About content has been updated');
            }
            return redirect()->back()->with('error','Something went wrong. Please try again.');

        } else {
            if(About::create($aboutJSON)){
                return redirect()->back()->with('success','About content has been added');
            }
            return redirect()->back()->with('error','Something went wrong. Please try again.');
    
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
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
