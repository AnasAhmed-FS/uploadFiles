<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\Controller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('demo' ,  [FilesController::class, 'demo']);

Route::prefix('store')->group(function () {
    // Lunch first page with registar address and code
    Route::get('lunchFirReg' , [FilesController::class, 'Fir_view_pg'])->name('mainReg');
    // Lunch page to any user registered address and have code
    Route::get('lunchDataReg' , [FilesController::class, 'view_pg_registered'])->name('directUpload');

    // Arrive data come from user to (data_file  && user_info)
    Route::post('storage' , [FilesController::Class, 'store_files'])-> name('store.storage');
    // Arrive data come from user to only (data_file)
    Route::post('storageReg' , [FilesController::Class, 'store_files_reg'])-> name('store.storage.reg');

    // SHOW selected data from database user_info in webpage
    Route::get('userInfo' , [FilesController::class, 'showUserData'])->name('userInfo');
     // SHOW selected data from database data_info in webpage
    //Route::get('dataFile/{dataFile_id}' , [FilesController::class, 'showDataFile'])->name('alone.file.data');

    // SHOW data data_info in webpage by alone function
    Route::get('dataFile/{dataFile_id}' , [FilesController::class, 'showStorageDataAlone'])->name('file.data');

    // EDIT selected data from database user_info in webpage
    Route::get('editDataFile/{alleditFile_id}' , [FilesController::class, 'editDataFile'])->name('edit.file.data');
    // Update data in user_info table in laravel database
    Route::post('updateDataFile/{updataDataFile_id}', [FilesController::class, 'updateEditDataFile'])->name('update.file.data');
    // Cancel edit  data from database user_info
    Route::get('canelEditDataFile/{cancelDataFile_id}' , [FilesController::class, 'cancelEditDataFile'])->name('cancel.edit.file.data');

    // Delete data from user_info table
    Route::get('deleteDataFile/{deleteDataFile_id}', [FilesController::class, 'deleteDataFile'])->name('delete.file.data');
});
