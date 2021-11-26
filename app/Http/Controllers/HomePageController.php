<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Form;
use App\Category;

class HomePageController extends Controller
{

    public function index()
    {
        $company = Company::all();
        return view('mainTable.index', compact('company'));
    }

    public function contact()
    {
        $company = Company::all();
        return view('contacts.index', compact('company'));
    }

    public function storecontact(Request $request)
    {
        Form::create($request->all());
        return redirect()->route('contact');
    }

    public function table(Request $request)
    {
        $companies = Company::filterByRequest($request)->paginate(9);

        return view('mainTable.search', compact('companies'));
    }

    public function category(Category $category)
    {
        $companies = Company::join('category_company', 'companies.id', '=', 'category_company.company_id')
            ->where('category_id', $category->id)
            ->paginate(9);

        return view('mainTable.category', compact('companies', 'category'));
    }

    public function company(Company $company)
    {
        return view('mainTable.company', compact ('company'));
    }

}
