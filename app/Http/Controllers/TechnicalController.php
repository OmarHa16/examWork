<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\SubServices;
use App\Models\TechnicalUsers;
use App\Models\TechnicalUserSubServices;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class TechnicalController extends Controller
{
    public function newUser(Request $request)
    {

        $subServices = $request->input('SubServices');
        $u = TechnicalUsers::latest()->first();
        if($u == null){
            $u = 1;
            foreach($subServices as $s){
                $sub = SubServices::where('title',$s)->first();

                TechnicalUserSubServices::create([

                    'id' => $u,
                    'sub_service_id' => $sub->id

                ]);

            }


            $user = TechnicalUsers::create([
                'name'=>$request->input('name'),
                'phoneNumber'=>$request->input('phoneNumber'),
                'password'=>$request->input('password'),
                'city'=>$request->input('city'),
                'mainService'=>$request->input('mainService'),
                'subServicesList'=>$u,
                'bankName'=>$request->input('bankName'),
                'statementNumber'=>$request->input('statementNumber'),
                'address'=>$request->input('address'),
                'address_latitude'=>$request->input('address_latitude'),
                'address_longitude'=>$request->input('address_longitude'),
                'profileImage'=>$request->input("profileImage"),
                'residenceImage'=>$request->input("residenceImage"),
                'Approved'=>false
            ]);

            return response($user, Response::HTTP_CREATED);
        }
        else{
            foreach($subServices as $s){
                $sub = SubServices::where('title',$s)->first();

                TechnicalUserSubServices::create([

                    'id' => $u->id+1,
                    'sub_service_id' => $sub->id

                ]);

            }


            $user = TechnicalUsers::create([
                'name'=>$request->input('name'),
                'phoneNumber'=>$request->input('phoneNumber'),
                'password'=>$request->input('password'),
                'city'=>$request->input('city'),
                'mainService'=>$request->input('mainService'),
                'subServicesList'=>$u->id+1,
                'bankName'=>$request->input('bankName'),
                'statementNumber'=>$request->input('statementNumber'),
                'address'=>$request->input('address'),
                'address_latitude'=>$request->input('address_latitude'),
                'address_longitude'=>$request->input('address_longitude'),
                'profileImage'=>$request->input("profileImage"),
                'residenceImage'=>$request->input("residenceImage"),
                'Approved'=>false
            ]);

            return response($user, Response::HTTP_CREATED);

        }
     }


    public function AllNotApprovedUsers(){
        return response(TechnicalUsers::all()->where('Approved',false));
    }
    public function ApproveUser(Request $request){
        $user = TechnicalUsers::where('id',$request->input('id'));
        $user->Approved = true;
        return response($user);
    }
}
