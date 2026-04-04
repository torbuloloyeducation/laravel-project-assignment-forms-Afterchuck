<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/formtest', function(){
    $emails = session()->get('$emails', []);

    return view('formtest',[
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function() {
    $emails = session()->get('$emails', []);

    if (count($emails) >= 5) {
        return back()->withErrors(['email' => 'The limit of 5 emails has been reached. Please delete one to add more.']);
    }

    request()->validate([
        'email' => ['required', 'email']
    ]);

    $email = request('email');

    if (in_array($email, $emails)) {
        return back()->withErrors(['email' => 'This email is already in the list.']);
    }

    session()->push('$emails', $email);
    return redirect('/formtest')->with('success', 'Email added successfully!');
});

Route::delete('/delete-email/{index}', function($index){
    $emails = session()->get('$emails', []);

    if (isset($emails[$index])) {
        unset($emails[$index]);
    }
    session()->put('$emails', array_values($emails));
    return redirect('/formtest');
});