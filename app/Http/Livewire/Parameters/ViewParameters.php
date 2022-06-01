<?php

namespace App\Http\Livewire\Parameters;

use App\Models\Company;
use App\Models\Plant;
use App\Models\ProductWater;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ViewParameters extends Component
{
    // Parameters
    public $companyParameter;
    public $serviceParameter;
    public $plantParameter;

    // Componentes del Search
    public $date_range;
    public $dates = [];

    protected $queryString = [
        'date_range' => ['except' => ''],
    ];

    // Data requerida por la vista
    public Company $company;
    public Plant $plant;
    public $parameters;

    // AddOpeManaObservation
    public $opeManaId;
    public $opeManaObservation;

    // EditParemers
    public $edit_parameters_id;

    public function mount()
    {
        $this->company = Company::where('name', $this->companyParameter)->first(); // Obtenemos la data del company
        $this->plant = Plant::where('id', $this->plantParameter)->where('companies_id', $this->company->id)->first();
        $this->parameters = Plant::where('id', $this->plantParameter)->where('companies_id', $this->company->id)->with(['product_waters', 'pretreatments', 'operations'])->get();
    }

    public function render()
    {
        $dates = explode(" ", $this->date_range);
        return view('livewire.parameters.view-parameters', [
            'parameters' => empty($this->date_range) ? ($this->parameters) : ((count($dates) > 2) ? $this->query_range() : $this->query_one_date()),
        ]);
    }

    // Obtenemos el id del registro al cual le queremos agregar un operation manager observation;
    public function get_id_toAddOpeManaObservation($id)
    {
        $this->opeManaId = $id;
    }

    // Guardamos el operation manager observation a la DB;
    public function AddOpeManaObservation()
    {
        try {
            DB::transaction(function () {
                ProductWater::where('id', $this->opeManaId)->update([
                    'ope_mana_observation' => $this->opeManaObservation
                ]);
            });

            // Success Save
            $this->reset('opeManaObservation');

            return redirect()->back()->with('success', 'Comment saved successfully!!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error saving your comment.');
        }
    }

    public function get_id_editParameters($id)
    {
        $this->edit_parameters_id = $id;
    }

    public function query_one_date()
    {
        $parameters = Plant::where('id', $this->plantParameter)->where('companies_id', $this->company->id)->with(
            [
                'product_waters' => function ($query) {
                    $dates = explode(" ", $this->date_range);

                    $query->whereDate('created_at', '=', $dates[0]);
                },
                'pretreatments' => function ($query) {
                    $dates = explode(" ", $this->date_range);

                    $query->whereDate('created_at', '=', $dates[0]);
                },
                'operations' => function ($query) {
                    $dates = explode(" ", $this->date_range);

                    $query->whereDate('created_at', '=', $dates[0]);
                }
            ]
        )->get();
        return $parameters;
    }

    public function query_range()
    {
        $dates = explode(" ", $this->date_range);
        if (count($dates) > 2) {
            $parameters = Plant::where('id', $this->plantParameter)->where('companies_id', $this->company->id)->with(
                [
                    'product_waters' => function ($query) {
                        $dates = explode(" ", $this->date_range);
                        $replace = array(0 => $dates[0], 1 => 'to', 2 => Carbon::createFromFormat('Y-m-d', $dates[2])->addDay()->toDateString());
                        $dates = array_replace($dates, $replace);

                        $query->whereBetween('created_at', [$dates[0], $dates[2]]);
                    },
                    'pretreatments' => function ($query) {
                        $dates = explode(" ", $this->date_range);
                        $replace = array(0 => $dates[0], 1 => 'to', 2 => Carbon::createFromFormat('Y-m-d', $dates[2])->addDay()->toDateString());
                        $dates = array_replace($dates, $replace);

                        $query->whereBetween('created_at', [$dates[0], $dates[2]]);
                    },
                    'operations' => function ($query) {
                        $dates = explode(" ", $this->date_range);
                        $replace = array(0 => $dates[0], 1 => 'to', 2 => Carbon::createFromFormat('Y-m-d', $dates[2])->addDay()->toDateString());
                        $dates = array_replace($dates, $replace);

                        $query->whereBetween('created_at', [$dates[0], $dates[2]]);
                    }
                ]
            )->get();
            return $parameters;
        }
    }
}
