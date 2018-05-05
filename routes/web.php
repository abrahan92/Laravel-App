<?php


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('service', function () {
    return view('service');
})->name('service');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::post('messages', function(){

  // enviar un correo

  $data = request()->all();
  Mail::send("emails.message", $data, function($message) use ($data){
    $message->from($data['email'], $data['name'])
            ->to('mendozaabrahan@gmail.com', 'Abrahan Mendoza')
            ->subject($data['subject']);
  });

  //responder al usuario
  return back();

})->name('messages');
