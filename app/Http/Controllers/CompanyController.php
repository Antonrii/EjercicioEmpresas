<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\CompanyStoreRequest;
use App\Company;

class CompanyController extends Controller
{
    public function index(){

    	$companies = Company::orderBy('id', 'desc')->get();
    	return view('companies.index', compact('companies'));

    }

    public function destroy($id){

    	$company = Company::find($id)->delete();
    	return back()
        ->with('eliminada','Empresa Eliminada.');

    }

    public function edit($id){

    	$company = Company::find($id);
    	return view('companies.edit', compact('company'));

    }

    public function create(){

    	return view('companies.create');

    }

    public function store(CompanyStoreRequest $request){

    	Company::create($request->all());
    	return redirect()->route('companies.index')
        ->with('creada','Empresa Creada Exitosamente.');

    }

    public function update(CompanyUpdateRequest $request, $id){

    	$company = Company::find($id);

    	$company->name = $request->name;
    	$company->address = $request->address;
    	$company->website = $request->website;
    	$company->email = $request->email;
    	$company->save();
    	return redirect()->route('companies.index')
        ->with('creada','Empresa Actualizada Exitosamente.');

    }
}
