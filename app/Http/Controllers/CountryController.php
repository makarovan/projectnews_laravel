<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('Code', 'asc')->latest()->paginate(8);
        return view('countries.listCountry', compact('countries'))
            ->with('i', (request()->input('page',1)-1)*8);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $countries = Country::query()
            ->where('Name', 'LIKE', "%{$search}%") //двойные кавычки обязательны
            ->orWhere('Continent', 'LIKE', "%{$search}%")
            ->get();
        return view('countries.searchCountry', compact('countries'));
    }

    public function listContinent(){
        //v1
        //$continents = Country::distinct()->get('continent');
        //v2
        //$continents = array('Asia', 'Europe', 'North America', 'South America', 'Oceania', 'Antarctica');
        //v3
        $continents=DB::table('country')
            ->select(DB::raw('distinct(continent), count(*) as countCountry'))
            ->groupBy('continent')
            ->get();
        $countries = Country::orderBy('Code', 'asc')->get();
        return view('countries.countryContinent', compact('continents', 'countries'));
    }

    public function countryByContinent($continent){
        //$continents = Country::distinct()->get('continent');
         $continents=DB::table('country')
            ->select(DB::raw('distinct(continent), count(*) as countCountry'))
            ->groupBy('continent')
            ->get();
        //continent name for header
        $continentOne = Country::where('continent', $continent)->first();
        $continentName = $continentOne->Continent;
        //countries by continent
        $countries = Country::where('continent', $continent)->get();
        return view('countries.countryContinent', compact('continents', 'countries', 'continentName'));
    }

    public function filterCountry(){
        $continents=Country::distinct()->get('continent');
        $governments=Country::distinct()->get('GovernmentForm');
        $countries=Country::orderBy('Code', 'asc')->get();
        $numberMin=Country::query()
            ->whereNotNull('IndepYear')
            ->orderBy('IndepYear', 'asc')->first();
        $numberMax=Country::orderBy('IndepYear', 'desc')->first();
        return view('countries.countryFilter', compact('continents', 'governments', 'countries', 'numberMin', 'numberMax'));
    }

    public function filterShow(Request $request){
        $continent=$request->input('continent');
        $government=$request->input('government');
        $numberFrom=$request->input('numberFrom');
        $numberTo=$request->input('numberTo');
        
        $countries=Country::query()
            ->where('Continent', 'LIKE', "%{$continent}%")
            ->where('GovernmentForm', 'LIKE', "%{$government}%")
            ->where('IndepYear', '>=', "%{$numberFrom}%")
            ->where('IndepYear', '<=', "%{$numberTo}%")
            ->get();
        
        if($numberFrom=='' && $numberTo=''){
            $countries = Country::query()
            ->where('Continent', 'LIKE', "%{$continent}%")
            ->where('GovernmentForm', 'LIKE', "%{$government}%")
            ->get();
        }elseif ($numberFrom='') {
            $countries = Country::query()
                ->where('Continent', 'LIKE', "%{$continent}%")
                ->where('GovernmentForm', 'LIKE', "%{$government}%")
                ->where('IndepYear', '<=', "%{$numberTo}%")
                ->get();
        }elseif ($numberTo='') {
            $countries = Country::query()
                ->where('Continent', 'LIKE', "%{$continent}%")
                ->where('GovernmentForm', 'LIKE', "%{$government}%")
                ->where('IndepYear', '>=', "%{$numberFrom}%")
                ->get();
        }

        $continents = Country::distinct()->get('continent');
        $governments = Country::distinct()->get('GovernmentForm');
        $numberMin = Country::query()
            ->whereNotNull('IndepYear')
            ->orderBy('IndepYear', 'asc')->first();
        $numberMax=Country::orderBy('IndepYear', 'desc')->first();
        return view('countries.countryFilter', compact('continents', 'governments', 'countries', 'numberMin', 'numberMax'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $country = Country::where('code',$code)->first();
        $countryCities = City::where('CountryCode', $country->Code)->get();
        $citiesCount = City::where('CountryCode', $country->Code)->get()->count();
        return view('countries.show', compact('country', 'countryCities', 'citiesCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
