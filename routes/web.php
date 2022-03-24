<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

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
    return inertia('Home');
});
Route::get('/users', function () {
    return inertia('Users/Index', [
        'users' => User::query()
            ->latest()
            ->when(request('search') ?? null, function ($query, $search) {
                $query->where('name', 'Like', '%' . $search . '%');
            })
            ->paginate(10)
            ->withQueryString()
            ->through(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ];
            }),
        'filters' => request(['search'])
    ]);
});

Route::get('/users/create', function () {
    return inertia('Users/Create');
});

Route::post('/users/store', function () {
    $attr = request()->validate([
        'name' => 'required',
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required', 'min:8']
    ]);

    User::create($attr);

    return redirect('/users');
});
Route::get('/settings', function () {
    return inertia('Settings');
});

Route::post('/logout', function () {
    dd('log out', request('name'));
});
