<?php

namespace App\Http\Controllers;
use App\Category;
use App\Discount;
use App\Meal;
use view;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class RestaurantController extends Controller
{
    public function manageCategories()
    {
        $categories=Category::where('user_id','=',auth()->id())->get();
        return view('ControlPanel/restaurant/category.manageCategory',compact('categories'));
    }

    public function addCategory()
    {
        return view('ControlPanel/restaurant/category.addCategory');
    }

     public function storeCategory(Request $request)
     {
         if ($request->hasFile('image'))
         {
             $main_photo = $request->file('image');
             $file_name = time(). $main_photo->getClientOriginalName();
             $main_photo->move('uploads/category',$file_name);
             Category::create([
                 'name' =>$request->name,
                 'user_id' =>auth()->id(),
                 'img'=>$file_name
             ]);
         }
         else{
             // validation error

         }
             return redirect()->back();
     }
     public function editCategory($id)
     {
         $category=Category::findorfail($id);
         return view('ControlPanel/restaurant/category.editCategory',compact('category'));
     }
    public function updateCategory(Request $request,$id)
    {
        $category=Category::findorfail($id);

        if ($request->hasFile('image'))
        {

            $main_photo = $request->file('image');
            $file_name = time() . $main_photo->getClientOriginalName();
            $main_photo->move('uploads/category',$file_name);
            $category->name=$request->name;
            $category->img=$file_name;
        }
        else{
            $category->img=$category->img;
        }

        $category->save();
         return redirect('/manageCategory');
    }

     public function deleteCategory($id)
     {
         Category::findorfail($id)->delete();
         return redirect('/manageCategory');
     }

     //Meals
    public function manageMeals()
    {
        $meals=Meal::all();
        return view('ControlPanel/restaurant/meal.manageMeal',compact('meals'));
    }

    public function addMeal()
    {
        $categories=Category::where('user_id',auth()->id())->get();
        return view('ControlPanel/restaurant/meal.addMeal',compact('categories'));
    }

    public function storeMeal(Request $request)
    {
        if ($request->hasFile('image'))
        {

            $main_photo = $request->file('image');
            $file_name = time() . $main_photo->getClientOriginalName();
            $main_photo->move('uploads/meal',$file_name);
        }

        meal::create([
            'name' =>$request->name,
            'category_id' =>$request->catID,
            'img'=>$file_name,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);
        return redirect()->back();
    }
    public function editMeal($id)
    {
        $meal=Meal::findorfail($id);
        $categories=Category::all();
        return view('ControlPanel/restaurant/meal.editMeal',compact('meal','categories'));
    }
    public function updateMeal(Request $request,$id)
    {
        $meal=Meal::findorfail($id);
        $meal->name=$request->name;
        $meal->category_id=$request->catID;
        $meal->description=$request->description;
        $meal->price=$request->price;
        if($request->hasFile('image'))
        {

            $main_photo = $request->file('image');
            $file_name = time() . $main_photo->getClientOriginalName();
            $main_photo->move('uploads/meal',$file_name);
            $meal->img=$file_name;
        }else{
            $meal->img=$meal->img;
        }
        $meal->save();
        return redirect('/manageMeals');
    }

    public function deleteMeal($id)
    {
        Meal::findorfail($id)->delete();
        return redirect('/manageMeals');
    }

    public function getDiscountMeal($id)
    {
        $meal=Meal::findorfail($id);
        return view('ControlPanel/restaurant/meal.discountMeal',compact('meal'));
    }
    public function postDiscountMeal(Request $request, $id)
    {
        Discount::create([
            'user_id'=>auth()->id(),
            'meal_id'=>$id,
            'startDate'=>$request->startDate,
            'endDate'=>$request->endDate,
            'price'=>$request->price
        ]);
        return redirect('/manageMeals');
    }

}
