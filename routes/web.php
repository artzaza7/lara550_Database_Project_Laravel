<?php

use Illuminate\Support\Facades\Route;
// จะทำการใช้ Controller ไหนก็อย่าลืม import ด้วยคำสั่ง : use ที่อยู่\ชื่อไฟล์_Controller;
use App\Http\Controllers\AboutController;

use App\Http\Controllers\Sector_1_Controller;
use App\Http\Controllers\Sector_2_Controller;
use App\Http\Controllers\Sector_3_Controller;
use App\Http\Controllers\Sector_4_Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// ตัวอย่างในการใช้งาน lavavel Controller + route + view
// ในการใช้งานร่วมกับ Controller เขียนตามนี้
// สามารถตั้งชื่อเล่นได้ด้วย การ Route...)->name('ชื่อที่ต้องการตั้ง'); 
// ในการใช้ใน <a href="{{route('ชื่อเล่นที่ทำการตั้งไว้')}}">ตั้ง link ที่ต้องการแสดงผล</a>

Route::get('/','Sector_1_Controller@index')->name('index_project');

//Sector_1
Route::get('subArea/subArea.blade.php', 'Sector_1_Controller@subArea')->name('subArea');
Route::get('subArea/subAreaCreate.blade.php', 'Sector_1_Controller@subAreaCreate')->name('subAreaCreate');
Route::get('subArea/subAreaCreate.blade.php/Sector', 'Sector_1_Controller@subAreaCreate_dropdownfor_Sector')->name('subAreaCreate_dropdown_Sector');
Route::get('subArea/subAreaCreate.blade.php/Province', 'Sector_1_Controller@subAreaCreate_dropdownfor_Province')->name('subAreaCreate_dropdown_Province');
Route::get('subArea/subAreaCreate.blade.php/District', 'Sector_1_Controller@subAreaCreate_dropdownfor_District')->name('subAreaCreate_dropdown_District');
Route::get('subArea/subAreaCreate.blade.php/store', 'Sector_1_Controller@subAreaStore')->name('subAreaStore');
Route::get('subArea/subAreaEdit.blade.php/edit/{id}/{d_id}/{near}', 'Sector_1_Controller@subAreaEdit')->name('subAreaEdit');
Route::get('subArea/subAreaUpdate.blade.php/update/{id}', 'Sector_1_Controller@subAreaUpdate')->name('subAreaUpdate');
Route::get('subArea/subAreaDelete.blade.php/delete/{id}', 'Sector_1_Controller@subAreaDelete')->name('subAreaDelete');
Route::get('subArea/subAreaDestroy.blade.php/destroy/{id}', 'Sector_1_Controller@subAreaDestroy')->name('subAreaDestroy');

//Sector_2
Route::get('house/house.blade.php', 'Sector_2_Controller@house')->name('house');
Route::get('house/houseCreate.blade.php', 'Sector_2_Controller@houseCreate')->name('houseCreate');
Route::get('house/houseCreate.blade.php/store', 'Sector_2_Controller@houseStore')->name('houseStore');
Route::get('house/houseEdit.blade.php/edit/{sub_area_id}/{house_id}', 'Sector_2_Controller@houseEdit')->name('houseEdit');
Route::get('house/houseEdit.blade.php/update/{house_id}', 'Sector_2_Controller@houseUpdate')->name('houseUpdate');
Route::get('house/houseDelete.blade.php/delete/{house_id}', 'Sector_2_Controller@houseDelete')->name('houseDelete');
Route::get('house/houseDelete.blade.php/destroy/{house_id}', 'Sector_2_Controller@houseDestroy')->name('houseDestroy');

//Sector_3
Route::get('houseRegistration/houseRegistration.blade.php', 'Sector_3_Controller@houseRegister')->name('houseRegister');
Route::get('houseRegistration/houseRegistrationCreate.blade.php', 'Sector_3_Controller@houseRegisterCreate')->name('houseRegisterCreate');
Route::get('houseRegistration/houseRegistrationCreate.blade.php/store', 'Sector_3_Controller@houseRegisterStore')->name('houseRegisterStore');
Route::get('houseRegistration/houseRegistrationEdit.blade.php/edit/{house_register_id}/{sex_id}/{house_id}', 
'Sector_3_Controller@houseRegisterEdit')->name('houseRegisterEdit');
Route::get('houseRegistration/houseRegistrationEdit.blade.php/update/{house_register_id}', 
'Sector_3_Controller@houseRegisterUpdate')->name('houseRegisterUpdate');
Route::get('houseRegistration/houseRegistrationDelete.blade.php/delete/{house_register_id}', 
'Sector_3_Controller@houseRegisterDelete')->name('houseRegisterDelete');
Route::get('houseRegistration/houseRegistrationDelete.blade.php/destroy/{house_register_id}', 
'Sector_3_Controller@houseRegisterDestroy')->name('houseRegisterDestroy');

//Sector_4
Route::get('result/result.blade.php', 'Sector_4_Controller@result')->name('result');
