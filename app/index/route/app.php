<?php

use think\facade\Route;

Route::view('product/showproduct', 'product/showproduct');
Route::view('product/:classifyId', 'product/index');
Route::rule('message/sendEmail','message/sendEmail')->method('post');