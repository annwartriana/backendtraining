<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

//Para poder borrar la foto
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['companiesList']=Companies::paginate(10);
        return view ('companies.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view ('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Incluyendo token:
        //$datosCompanies = request () -> all();
        
        $datosCompanies = request ()->except('_token');

        if($request->hasFile('logo')){
            $datosCompanies['logo']=$request->file("logo")->store("uploads",'public');
        }

      /* if($archivo=$request->file('logo')){
            $nombreImg=$archivo->getClientOriginalName();
            $archivo->move('images', $nombreImg);

            $datosCompanies['logo']=$nombreImg;

        } */         

        Companies::insert($datosCompanies);

        //return response()->json($datosCompanies);

        return redirect('companies')->with('mensaje','Se agregó la Compañia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $companie=Companies::findOrFail($id);
        return view ('companies.edit', compact('companie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosCompanies = request ()->except(['_token', '_method']);

        //Para verificar si se cambió el logo
        if($request->hasFile('logo')){
            $companie=Companies::findOrFail($id);
            Storage::delete('public'.$companie->logo);
            $datosCompanies['logo']=$request->file("logo")->store("uploads",'public');
        }




        Companies::where('id', '=', $id)->update($datosCompanies);

        $companie=Companies::findOrFail($id);
        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */


    //public function destroy(Companies $companies)
    public function destroy($id)
    {  
        $companie=Companies::findOrFail($id);

        if(Storage::delete('public/'.$companie->logo)){
            Companies::destroy($id);
        }

        Companies::destroy($id);
       
        return redirect('companies')->with('mensaje','Se eliminó la Compañia');

        
    }
}
