<?php


namespace App\Http\Controllers;

use App\Http\Requests\PlantRequest;
use App\Models\BillingPeriod;
use App\Models\Cistern;
use App\Models\Company;
use App\Models\Country;
use App\Models\Currency;
use App\Models\MembraneActiveArea;
use App\Models\Plant;
use App\Models\PlantContract;
use App\Models\PlantType;
use App\Models\PolishFilterType;
use App\Models\Train;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company)
    {
        if ((Auth::user()->getRoleNames()[0] == 'Super-Admin') || (Auth::user()->getRoleNames()[0] == 'Director') || (Auth::user()->getRoleNames()[0] == 'Operations-Manager') || (Auth::user()->getRoleNames()[0] == 'Administrative-Manager')) {

            $companies = Company::where('name', $company)->first();


            $plants = Plant::where('companies_id', $companies->id)->get();
        } else if (Auth::user()->getRoleNames()->first() == 'Manager') {

            $plants = Plant::where('manager', Auth::id())->get();
        } else if (Auth::user()->getRoleNames()->first() == 'Operator') {

            $plants = Plant::where('operator', Auth::id())->get();
        }

        return view('content.operations.plants.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendants = User::role(['Operator', 'Manager'])->get();
        $managers = User::role('Manager')->get();

        $plantTypes = PlantType::all();
        $countries = Country::all();
        $currencies = Currency::all();
        $polishFilterTypes = PolishFilterType::all();
        //$billings = BillingPeriod::all();
        $membranesActiveArea = MembraneActiveArea::all();
        $companies = Company::all();

        return view('content.operations.plants.create', compact('plantTypes', 'attendants', 'managers', 'countries', 'currencies', 'polishFilterTypes', 'membranesActiveArea', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $cover_path = Storage::put('public/covers/plants', $request->cover);
                $handbook_path = Storage::put('public/handbooks/handbooks', $request->pdf);

                Plant::create([
                    'name' => $request->name,
                    'location' => $request->location,
                    'currencies_id' => $request->currency,
                    'countries_id' => $request->country,
                    'companies_id' => $request->company,
                    'cover_path' => $request->cover != null ? $cover_path : null,
                    'cisterns_quantity' => $request->totalCisterns,
                    'plant_types_id' => $request->type,

                    'irrigation' => $request->riego != null ? 'yes' : 'no',
                    'sdi' => $request->sdi != null ? 'yes' : 'no',
                    'chloride' => $request->chloride != null ? 'yes' : 'no',
                    'well_pump' => $request->wellPump != null ? 'yes' : 'no',
                    'feed_pump' => $request->feedPump != null ? 'yes' : 'no',
                    'boosterc' => $request->boosterc != null ? 'yes' : 'no',
                    'feed' => $request->feed != null ? 'yes' : 'no',
                    'reject' => $request->reject != null ? 'yes' : 'no',

                    'attendant' => $request->attendant,
                    'manager' => $request->manager,
                    'user_created_at' => Auth::id()
                ]);


                // Obtenemos el ultimo id de la planta creada;
                $plantId = Plant::latest('id')->first();

                // Plant Contract
                PlantContract::create([
                    'plants_id' => $plantId->id,
                    'botM3' => $request->botm3,
                    'botFixed' => $request->botfixed,
                    'omM3' => $request->OMm3,
                    'omFixed' => $request->OMfixed,
                    'remineralitation' => $request->remineralisation,
                    'totalM3' => $request->totalM3,
                    'totalMonth' => $request->totalFixed,
                    'years' => $request->years,
                    'from' => $request->from,
                    'till' => $request->till,
                    'minimunConsumption' => $request->minimun,
                    'billingDay' => $request->billingDay,
                    'billingPeriod' => $request->billingPeriod,
                    'user_created_at' => Auth::id(),
                ]);

                // Add all trains
                foreach ($request->trains['capacity'] as $index => $train) {
                    Train::create([
                        'plants_id' => $plantId->id,
                        'capacity' => $train,
                        'multimedia_filter_quantity' => $request->trains['mf'][$index],
                        'polish_filters_types_id' => $request->trains['pft'][$index],
                        'polish_filters_quantity' => $request->trains['pfq'][$index],
                        'tds' => $request->trains['tds'][$index],
                        'booster_quantity' => $request->trains['booster'][$index],
                        //DEFAULT TYPES
                        //DEFAULT STATUS
                        'membrane_active_area' => $request->trains['mArea'][$index],
                        'membrane_elements' => $request->trains['mElements'][$index],
                        'user_created_at' => Auth::id()
                    ]);
                }

                // Add Irrigation train
                if ($request->riego) {
                    Train::create([
                        'plants_id' => $plantId->id,
                        //'capacity' => $train,
                        //'multimedia_filter_quantity' => $request->trains['mf'][$index],
                        //'polish_filters_types_id' => $request->trains['pft'][$index],
                        //'polish_filters_quantity' => $request->trains['pfq'][$index],
                        //'tds' => $request->trains['tds'][$index],
                        //'booster_quantity' => $request->trains['booster'][$index],
                        //DEFAULT STATUS
                        'type' => 'Irrigation',
                        'user_created_at' => Auth::id()
                    ]);
                }

                // Add Municipal train
                Train::create([
                    'plants_id' => $plantId->id,
                    //'capacity' => $train,
                    //'multimedia_filter_quantity' => $request->trains['mf'][$index],
                    //'polish_filters_types_id' => $request->trains['pft'][$index],
                    //'polish_filters_quantity' => $request->trains['pfq'][$index],
                    //'tds' => $request->trains['tds'][$index],
                    //'booster_quantity' => $request->trains['booster'][$index],
                    //DEFAULT STATUS
                    'type' => 'Municipal',
                    'user_created_at' => Auth::id()
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->route('Plants.index')->with('error', 'A Problem Occurred, Try Again!');
        }

        return redirect()->route('Plants.index')->with('success', 'Registered Plant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plant = Plant::find($id);
        $plantTypes = PlantType::all();
        $countries = Country::all();
        $currency = Currency::all();
        $polishFilterTypes = PolishFilterType::all();
        // $billings = BillingPeriod::all();

        $attendants = User::role('Operator')->get();
        $managers = User::role('Manager')->get();
        return view('plants.edit', compact('plant', 'plantTypes', 'countries', 'currency', 'polishFilterTypes', 'managers', 'attendants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlantRequest $request, $id)
    {
        //$cover_path = Storage::put('public/covers/plants', $request->cover);

        Plant::where('id', $id)->update([
            'name' => $request->name,
            //'cover_path' => $cover_path,
            'location' => $request->location,
            'installed_capacity' => $request->limit,
            'plant_types_id' => $request->type,
            'design_limit' => $request->limit,
            'attendant' => $request->attendant,
            'user_created_at' => auth()->user()->id
        ]);

        foreach ($request->trains as $iteration) {
            Train::where('id', $id)->update([
                'plant_id' => $id,
                'capacity' => $iteration,
                //DEFAULT TRAIN
            ]);
        }

        // Creamos Train Riego
        //TODO Crear el apartado de riego
        /*
            Train::create([
                'plants_id' => $plantId,
                //capacity nullable,
                'type' => 'RIEGO'
            ]);
        */
        return redirect()->route('Plants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Train::where('plants_id', $id)->delete();
        Cistern::where('plants_id', $id)->delete();
        Plant::find($id)->delete();

        return redirect()->route('Plants.index');
    }
}