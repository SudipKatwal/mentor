<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Feature;
use DataTables;
use Session;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.pages.features.features');
    }

    public function featuresData(Request $request)
    {
        $data = Feature::where('user_id',auth()->user()->id)->latest()->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function($row){
                    return $row->name;
                })
                ->addColumn('descriptions', function($row){
                    return $row->descriptions;
                })
                
                ->addColumn('type', function($row){
                    return $row->type;
                })
                ->addColumn('edit', function($row){
                    $url = route('features.edit',$row->id);
                    return '<a href="'.$url.'" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                })
                ->addColumn('delete', function($row){
                    return ' <button onClick="deleteModalUpdate('.$row->id.')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>';
                    
                })
                ->rawColumns(['name','descriptions','edit','delete'])
                ->make(true); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.pages.features.add-features');        
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
            'editor1.required'  => 'Message field is invalid.',
            'editor1.max'       => 'Message field should not be more then 1000 character.'
        ];
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'editor1' => 'required|string|max:1000',
            'type'  => 'required|string|in:course,feature',
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $featureJSON = [
            'name'  => $request->name,
            'descriptions'   => $request->editor1,
            'user_id'   => auth()->user()->id,
            'type'      => $request->type,
        ];
        
        if($request->_id){
            $feature = Feature::find($request->_id);
            
            if($feature->update($featureJSON)){
                Session::flash('success', $feature->name.' has been updated.');
                return redirect()->route('features.index');
            }
            Session::flash('error','Something went wrong. Please try again.');
            return redirect()->back();

        } else {
            if(Feature::create($featureJSON)){
                Session::flash('success','New Feature has been added.');
                return redirect()->route('features.index');
            }
            Session::flash('error','Something went wrong. Please try again.');
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
        return view('front.pages.features.add-features',
            [
                'detail'    => Feature::find($id),
            ]
        );
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
