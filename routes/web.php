<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/controlPanel','HomeController@index')->name('home');
Auth::routes();
Route::get('/guest','HomeController@guest');
//Index and shopping cart
Route::get('/',[
   'uses'=>'ProductController@index',
   'as'=>'product.index'
]);
Route::get('/categoriesShow/{id}','ProductController@categoriesShow');
Route::get('/mealsShow/{id}','ProductController@mealsShow');
Route::get('/mealDetails/{id}','ProductController@mealDetails');
Route::get('/mealDiscount/{id}','ProductController@mealDiscount');
Route::Post('/addToCart/{id}/{price}','ProductController@addToCart');
Route::get('/getOrderNow','ProductController@getOrderNow');
Route::Post('/postOrderNow','ProductController@postOrderNow');
Route::get('/cancelOrder','ProductController@cancelOrder');
Route::get('/shoppingCart','ProductController@getCart');

//Delivery
Route::get('/waitingOrdersForDelivers','DeliverController@waitingOrdersForDelivers');
Route::get('/deliveringOrders','DeliverController@deliveringOrders');
Route::get('/receiveOrders/{id}','DeliverController@receiveOrders');
Route::get('/changeOrderStatus/{id}/{status}','DeliverController@changeOrderStatus');
Route::get('/waitingOrdersForRes','DeliverController@waitingOrdersForRes');

//Admin
Route::get('/restaurantStatus','UserController@restaurantStatus');
Route::get('/manageDelivers','UserController@manageDelivers');
Route::get('/addDeliver','UserController@addDeliver');
Route::Post('/storeDeliver','UserController@storeDeliver');
Route::get('/editDeliver/{id}','UserController@editDeliver');
Route::PATCH('/updateDeliver/{id}','UserController@updateDeliver');
Route::DELETE('/deleteDeliver/{id}','UserController@deleteDeliver');
Route::get('/getDeliverPassword/{id}','UserController@getDeliverPassword');
Route::Post('/postDeliverPassword/{id}','UserController@postDeliverPassword');
Route::get('/approveRestaurant/{id}','UserController@approveRestaurant');
Route::get('/rejectRestaurant/{id}','UserController@rejectRestaurant');

//Restaurant/categories
Route::get('/manageCategories','RestaurantController@manageCategories');
Route::get('/addCategory','RestaurantController@addCategory');
Route::Post('/storeCategory','RestaurantController@storeCategory');
Route::get('/editCategory/{id}','RestaurantController@editCategory');
Route::PATCH('/updateCategory/{id}','RestaurantController@updateCategory');
Route::DELETE('/deleteCategory/{id}','RestaurantController@deleteCategory');
Route::get('/orderDetails/{id}','ProductController@orderDetails');

//Restaurant/meals
Route::get('/manageMeals','RestaurantController@manageMeals');
Route::get('/addMeal','RestaurantController@addMeal');
Route::Post('/storeMeal','RestaurantController@storeMeal');
Route::get('/editMeal/{id}','RestaurantController@editMeal');
Route::PATCH('/updateMeal/{id}','RestaurantController@updateMeal');
Route::DELETE('/deleteMeal/{id}','RestaurantController@deleteMeal');
Route::get('/getDiscountMeal/{id}','RestaurantController@getDiscountMeal');
Route::Post('/postDiscountMeal/{id}','RestaurantController@postDiscountMeal');
