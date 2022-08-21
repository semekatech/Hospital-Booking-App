<?php

Route::get('list-bookings', array_merge(['uses' => 'BookingController@index']))->name('list.bookings');
Route::post('store-booking', array_merge(['uses' => 'BookingController@store']))->name('store.booking');
Route::put('bookings/{booking}','BookingController@approve')->name('approve.booking');
Route::delete('bookings/{id}', array_merge(['uses' => 'BookingController@destroy']))->name('booking.destroy');

