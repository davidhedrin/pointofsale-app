<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\LogoutComponent;
use App\Http\Livewire\RegisterComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\UserManagementComponent;

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


Route::get('/logout', LogoutComponent::class)->name('logout');
//For All
Route::middleware('guest')->group(function(){
    Route::get('/login', LoginComponent::class)->name('login');
    Route::get('/register', RegisterComponent::class)->name('register');
});
//For User
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/', DashboardComponent::class)->name('dashboard');
});
//For Admin
Route::middleware(['auth:sanctum', 'verified', 'adminrole'])->group(function(){
    Route::get('/user-management', UserManagementComponent::class)->name('all.users');
});