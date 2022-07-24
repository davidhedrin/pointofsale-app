<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\LogoutComponent;
use App\Http\Livewire\RegisterComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\UserManagementComponent;
use App\Http\Livewire\CustomersComponent;
use App\Http\Livewire\Auth\VerifryEmailComponent;

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

Auth::routes(['login' => false, 'register' => false, 'verify' => true]);

Route::get('/logout', LogoutComponent::class)->name('logout');
Route::get('/email/verify', VerifryEmailComponent::class)->middleware('auth')->name('verification.notice');
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
    Route::get('/customers', CustomersComponent::class)->name('all.customer');
});