<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\CovidPositive;

class CovidPositiveController extends Controller
{
  public function index(Request $request)
    {

      $model = CovidPositive::orderBy('id', 'desc');

      // if(session('user')->project_id!=8)
      //       return redirect(session('access').'dashboard')->send();
      //   else{
      //       if(in_array(5,session('accesslist_id')))
      //       $model=$model->where('user_id',session('user')->id);
      //
      //   }

        $pagetitle="Covid-19 positive patient Lists";

        if ($request->country_from) {
            $model =$model->where('country_from', $request->country_from );
            $pagetitle= "Covic Contact Search Results";
        }

        if ($request->entry_date) {
            $model =$model->whereRaw("date(created_at)='$request->entry_date'" );
            $pagetitle= "Covic Contact Search Results";
        }

        $model=$model->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Covic Contact' => url(session('access').'covic')));
        // return view(session('access').'covidpositive/index');
        return view('user/covidpositive/index');
      }

      public function create()
      {

      	view()->share('pageTitle', "Covid positive patient Create");
          view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Covic' => url(session('access').'covic'), 'Add Covic' => url(session('access').'covic/create')));
          return view('user/covidpositive/create');

      }

      public function store(Request $request)
      {
        // dd($request->all());
        $model = new CovidPositive();
        // $model->user_id = \Auth::User()->id;

        $model->fill($request->all());

        $model->save();
        return redirect('covid-positive/create');
      }

      public function edit($id)
      {
      	/*
      	if(session('user')->project_id!=8)
              return redirect(session('access').'dashboard')->send();
          elseif(!in_array(3,session('accesslist_id')) )
              return redirect(session('access').'dashboard')->send();*/

          view()->share('pageTitle', "Covic Update");
          view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Covic Contact' => url(session('access').'covic'), 'Update Covic Contact' => url(session('access').'covic/' . $id . '/edit')));

          $model = CovidPositive::find($id);

          view()->share('model', $model);
          return view('user/covidpositive/create');

      }


}
