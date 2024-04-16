<?php

namespace Tests\Feature;

use App\Models\SubServices;
use App\Models\TechnicalUsers;
use App\Models\TechnicalUserSubServices;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class createUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_if_user_can_register(): void
    {

        SubServices::create([
            'title'=>'غسالات'
        ]);
        SubServices::create([
            'title'=>'برادات'
        ]);
        SubServices::create([
            'title'=>'أفران كهربا'
        ]);
        $userid = TechnicalUsers::latest()->first() == null ? 1 :TechnicalUsers::latest()->first()->id;

        TechnicalUserSubServices::create([
            'id'=>$userid+1,
            'sub_service_id'=>SubServices::where('title', 'غسالات')->first()->id
        ]);
        TechnicalUserSubServices::create([
            'id'=>$userid+1,
            'sub_service_id'=>SubServices::where('title', 'برادات')->first()->id
        ]);
        TechnicalUserSubServices::create([
            'id'=>$userid+1,
            'sub_service_id'=>SubServices::where('title', 'أفران كهربا')->first()->id
        ]);
        $profileImage = "iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAIAAADTED8xAAADMElEQVR4nOzVwQnAIBQFQYXff81RUkQCOyDj1YOPnbXWPmeTRef+/3O/OyBjzh3CD95BfqICMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMO0TAAD//2Anhf4QtqobAAAAAElFTkSuQmCC";
        $residenceImage ="iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAIAAADTED8xAAADMElEQVR4nOzVwQnAIBQFQYXff81RUkQCOyDj1YOPnbXWPmeTRef";


        $response = $this->postJson('api/newUser',[
            'name'=>'Omar',
            'phoneNumber'=>'09312444353',
            'password'=>'123456789',
            'city'=>'aleppo',
            'mainService'=>'صيانة',
            'SubServices'=>['برادات','غسالات'],
            'bankName'=>'bemo',
            'statementNumber'=>9284244,
            'address'=>'aleppo',
            'address_latitude'=>124124,
            'address_longitude'=>124124,
            'profileImage'=>$profileImage,
            'residenceImage'=>$residenceImage,
        ]);

        $response->assertStatus(201);
    }
}
