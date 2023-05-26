<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use Validator;
<<<<<<< HEAD
=======
use Storage;
>>>>>>> f6efe57eb207128b196370711e4d074e3c31abf2
use App\Http\Resources\PasienResource;

class PasienController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>FALSE,
                'msg'=>$validator->errors()
            ],400);
        }
        $email = $request->input('email');
        $password = $request->input('password');

        $pasien = Pasien::where([
            ['email',$email],
            ['status','active'],
        ])->first();

        if(is_null($pasien))
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Email & Password tidak sesuai'
            ],200);
        }
        else
        {
            if(password_verify($password,$pasien->password))
            {
                //--------- JIKA PASSWORD SESUAI -------------//
                return response()->json([
                    'status'=>TRUE,
                    'msg'=>'User Ditemukan',
                    'data'=>new PasienResource($pasien)
                ],200);
            }

            else
            {
                 //--------- JIKA TIDAK PASSWORD SESUAI -------------//
                return response()->json([
                    'status'=>FALSE,
                    'msg'=>'Email & Password Tidak Sesuai',

                ],200);
            }
        }
    }
<<<<<<< HEAD
=======

    public function avatarUpdate(Request $request)
    {
        $input = $request->all();
        $pasien = Pasien::find($request->get('id'));
        if(is_null($pasien))
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Data Tidak Ditemukan'
            ],404);
        }
        $validator = Validator::make($input,[
            'avatar'=>'sometimes|nullable|image|mimes:jpeg,jpg,png'
        ]);
        
        if($validator->fails())
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>$validator->errors()
            ],400);
        }
        if($request->hasFile('avatar'))
        {
            if($request->file('avatar')->isValid())
            {
                Storage::disk('upload')->delete($pasien->avatar);
                $avatar = $request->file('avatar');
                $extension = $avatar->getClientOriginalExtension();
                $pasienAvatar = "pasien-avatar/".date('YmdHis').".".$extension;
                $uploadPath = env('UPLOAD_PATH')."/pasien-avatar";
                $request->file('avatar')->move($uploadPath,$pasienAvatar);
                $input['avatar'] = $pasienAvatar;
            }
        }
        
        $pasien->update($input);
        return response()->json([
            'status'=>TRUE,
            'msg'=>'Data Avatar Berhasil Di Update'
        ],200);
    }
>>>>>>> f6efe57eb207128b196370711e4d074e3c31abf2
}