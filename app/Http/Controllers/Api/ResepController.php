<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Module;
use App\Http\Resources\ResepResource;
use App\Http\Resources\ModuleResource;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
>>>>>>> f6efe57eb207128b196370711e4d074e3c31abf2

class ResepController extends Controller
{
    function getByCategory(Request $request)
    {
        $id = $request->input('category_id');
        $resep = Resep::where([
            ['category_id',$id]
        ])->get();

        if($resep->isEmpty())
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Resep Tidak Ditemukan'
            ],200);
        }
        return ResepResource::collection($resep);
    }

    function getById(Request $request)
    {
        $id = $request->input('id');
        $resep = Resep::find($id);
        if(is_null($resep))
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Resep Tidak Ditemukan'
            ],404);
        }

        $module = Module::where([
            ['resep_id',$id],
            ['status','active'],
        ])->get();
        return response()->json([
            'status'=>TRUE,
            'data'=>[
                "resep"=> new ResepResource($resep),
                "detail"=> ModuleResource::collection($module)
            ]
            ]);
    }
<<<<<<< HEAD
=======

    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $resep = Resep::all();
        if($filterKeyword)
        {
            $resep = Resep::where('title','LIKE',"%$filterKeyword%")->get();
        }
        return ResepResource::collection($resep);
    }

    public function popularAndLatest()
    {
        $latest = Resep::orderBy('created_at','DESC')->limit(2)->get();
        $popular = Resep::select('*')
        ->join('vw_resep_modules as b','resep.id','=','b.resep_id')
        ->orderBy('b.total','DESC')
        ->limit(2)
        ->get();

        return response()->json([
            "status"=>"TRUE",
            "data"=>[
                "latest"=> ResepResource::collection($latest),
                "popular"=> ResepResource::collection($popular),
            ]
            ]);
    }
>>>>>>> f6efe57eb207128b196370711e4d074e3c31abf2
}