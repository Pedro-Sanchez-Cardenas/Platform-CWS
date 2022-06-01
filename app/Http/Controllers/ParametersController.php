<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Carbon\Carbon;
use PDF;

class ParametersController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('role:Super-Admin|Operations-Manager|Administrative-Manager|Manager|Operator', ['only' => ['index', 'create', 'store', 'show']]);
        $this->middleware('role:Super-Admin|Operations-Manager', ['only' => ['edit', 'update', 'destroy']]);
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($plantId)
    {
        $plant = Plant::find($plantId);

        return view('content.parameters.index', compact('plant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company, $service, $plant)
    {
        $comp = $company;
        $serv = $service;

        $plantData = Plant::find($plant);

        return view('content.parameters.create', compact('plantData', 'comp', 'serv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                // Obtenemos los id's de los trenes de esa planta
                $trains = Train::where('plants_id', $request->plant_id)->where('type', 'Train')->get();
                $trAll = Train::where('plants_id', $request->plant_id)->get();
                $plant = Plant::find($request->plant_id);

                $contadorM = 0;
                foreach ($trains as $tr => $train) {
                    Pretreatment::create([
                        'plants_id' => $request->plant_id,
                        'trains_id' => $train->id,
                        'well_pump' => $request->pump['well'][$tr],
                        'feed_pump' => $request->pump['feed'][$tr],
                        'frecuencies_well_pump' => $request->pumpf['well'][$tr],
                        'frecuencies_feed_pump' => $request->pumpf['feed'][$tr],
                        'backwash' => $request->backwash[$tr],
                        'observations' => $request->observations['pre'][$tr],
                        'user_created_at' => Auth::id()
                    ]);

                    $pretreatment = Pretreatment::latest('id')->first();

                    for ($mf = 0; $mf < $train->multimedia_filter_quantity; $mf++) {
                        MultimediaFilter::create([
                            'pretreatments_id' => $pretreatment->id,
                            'trains_id' => $train->id,
                            'in' => $request->mm['in'][$contadorM],
                            'out' => $request->mm['out'][$contadorM]
                        ]);
                        $contadorM++;
                    }

                    for ($pf = 0; $pf < $train->polish_filters_quantity; $pf++) {
                        PolishFilter::create([
                            'pretreatments_id' => $pretreatment->id,
                            'trains_id' => $train->id,
                            'in' => $request->pf['in'][$tr],
                            'out' => $request->pf['out'][$tr],
                            'filter_change' => $request->filtros[$pf] == 'yes' ? Carbon::now()->toDateTimeString() : null
                        ]);
                    }

                    Operation::create([
                        'plants_id' => $request->plant_id,
                        'trains_id' => $train->id,
                        'hp' => $request->hp['op'][$tr],
                        'hpF' => $request->hp['fr'][$tr],
                        'sdi' => $request->sdi[$tr],
                        'ph' => $request->ph['op'][$tr],
                        'temperature' => $request->temperature[$tr],
                        'feed' => $request->feed['co'][$tr],
                        'permeated' => $request->permeate['co'][$tr],
                        'rejection' => $request->rejection[$tr],
                        'feedFlow' => $request->feed['flow'][$tr],
                        'permeateFlow' => $request->permeate['flow'][$tr],
                        'hpIn' => $request->hp['in'][$tr],
                        'hpOut' => $request->hp['out'][$tr],
                        'reject' => $request->reject[$tr],
                        'observations' => $request->observations['op'][$tr],
                        'user_created_at' => Auth::id()
                    ]);

                    $operation = Operation::latest('id')->first();

                    for ($bo = 0; $bo < $train->booster_quantity; $bo++) {
                        Booster::create([
                            'operations_id' => $operation->id,
                            'trains_id' => $train->id,
                            'amperage' => $request->booster['op'][$bo],
                            'frequency' => $request->booster['fr'][$bo],
                            'px' => $request->px[$bo],
                            'boosterFlow' => $request->booster['flow'][$tr],
                            'boosterPressures' => $request->booster['cp'][$tr],
                        ]);
                    }
                }

                ProductWater::create([
                    'plants_id' => $request->plant_id,
                    'ph' => $request->ph['pro'],
                    'hardness' => $request->hardness,
                    'tds' => $request->tds,
                    'h2s' => $request->h2s,
                    'freeChlorine' => $request->free_chlorine,
                    'chloride' => $request->chloride,
                    'observations' => $request->observations['pw'],
                    'user_created_at' => Auth::id()
                ]);

                $product_water = ProductWater::latest('id')->first();

                if ($request->typeUser == 'Operator') {
                    foreach ($trains as $tr => $train) {
                        ProductionReading::where('product_waters_id', null)->update([
                            'product_waters_id' => $product_water->id,
                        ]);
                    }
                } else {
                    foreach ($request->reading as $tr => $train) {
                        ProductionReading::create([
                            'product_waters_id' => $product_water->id,
                            'trains_id' => $trains[$tr]->id,
                            'reading' => $request->reading[$tr],
                            'production' => $trains[$tr]->productRea->last() != null ? ($request->reading[$tr] - $trains[$tr]->productRea->first()->reading) : $request->reading[$tr],
                            'type' => 'Train #' . ($tr + 1)
                        ]);
                    }

                    if ($plant->irrigation == 'yes') {
                        /**
                         * Irrigation
                         *
                        ProductionReading::create([
                            'product_waters_id' => $product_water->id,
                            'trains_id' => $trAll->where('type', 'Irrigation')->last()->id,
                            'reading' => $request->irrigation,
                            'production' => $plant->trains->where('type', 'Irrigation')->last()->productRea->first() != null ? ($request->irrigation - $plant->trains->where('type', 'Irrigation')->last()->productRea->first()->reading) : $request->irrigation,
                            'type' => 'Irrigation'
                        ]);
                    }

                    /**
                     * Municipal
                     *
                    ProductionReading::create([
                        'product_waters_id' => $product_water->id,
                        'trains_id' => $trAll->where('type', 'Municipal')->last()->id,
                        'reading' => $request->municipal,
                        'production' => $plant->trains->where('type', 'Municipal')->last()->productRea->first() != null ? ($request->municipal - $plant->trains->where('type', 'Municipal')->last()->productRea->first()->reading) : $request->municipal,
                        'type' => 'Municipal'
                    ]);
                }

                Chemical::create([
                    'product_waters_id' => $product_water->id,
                    'calciumChloride' => $request->calcium_chloride,
                    'sodiumCarbonate' => $request->sodium_carbonate,
                    'sodiumHypochlorite' => $request->sodium_hypochloride,
                    'antiscalant' => $request->antiscalant,
                    'sodiumHydroxide' => $request->sodium_hydroxide,
                    'hydrochloricAcid' => $request->hydrochloric_acid,
                    'kl1' => $request->kl1,
                    'kl2' => $request->kl2
                ]);

                for ($t = 0; $t < $plant->cisterns_quantity; $t++) {
                    Cistern::create([
                        'product_waters_id' => $product_water->id,
                        'plants_id' => $request->plant_id,
                        'capacity' => $request->tanks[$t],
                        //'status' => 'Enable',
                    ]);
                }
            });
        } catch (Exception $e) {
            return redirect()->route('Parameters.index')->with('error', 'An error occurred!');
        }
        return redirect()->route('Parameters.index')->with('success', 'Successful Registration!');
    }*/

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($company, $service, $plant ,$id)
    {
        $comp = $company;
        $serv = $service;
        $plan = $plant;
        $para = $id;

        return view('content.parameters.show', compact('comp', 'serv', 'plan', 'para'));
    }

    public function exportPDF($plant, $date_range = null)
    {
        if (isset($date_range)) {
            $dates = explode(" ", $date_range);

            if (count($dates) > 2) {
                $parameters = Plant::where('id', $plant)->with(
                    [
                        'product_waters' => function ($query) use ($date_range) {
                            $dates = explode(" ", $date_range);
                            $replace = array(0 => $dates[0], 1 => 'to', 2 => Carbon::createFromFormat('Y-m-d', $dates[2])->addDay()->toDateString());
                            $dates = array_replace($dates, $replace);

                            $query->whereBetween('created_at', [$dates[0], $dates[2]]);
                        },
                        'pretreatments' => function ($query) use ($date_range) {
                            $dates = explode(" ", $date_range);
                            $replace = array(0 => $dates[0], 1 => 'to', 2 => Carbon::createFromFormat('Y-m-d', $dates[2])->addDay()->toDateString());
                            $dates = array_replace($dates, $replace);

                            $query->whereBetween('created_at', [$dates[0], $dates[2]]);
                        },
                        'operations' => function ($query) use ($date_range) {
                            $dates = explode(" ", $date_range);
                            $replace = array(0 => $dates[0], 1 => 'to', 2 => Carbon::createFromFormat('Y-m-d', $dates[2])->addDay()->toDateString());
                            $dates = array_replace($dates, $replace);

                            $query->whereBetween('created_at', [$dates[0], $dates[2]]);
                        }
                    ]
                )->get();

                $pdf = PDF::loadView('TemplatesPDF.ParametersReport', compact('parameters', 'date_range'));
                $pdf->setPaper('letter', 'landscape');
                $pdf->render();
                return $pdf->stream($parameters->first()->name . ' REPORT - (' . $date_range . ').pdf');
            }
        } else {
            $parameters = Plant::where('id', $plant)->with(
                [
                    'product_waters' => function ($query) {
                        $query->get();
                    },
                    'pretreatments' => function ($query) {
                        $query->get();
                    },
                    'operations' => function ($query) {
                        $query->get();
                    }
                ]
            )->get();

            $pdf = PDF::loadView('TemplatesPDF.ParametersReport', compact('parameters', 'date_range'));
            $pdf->setPaper('letter', 'landscape');
            $pdf->render();
            return $pdf->stream($parameters->first()->name . ' REPORT - (ALL).pdf');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
    }*/
}
