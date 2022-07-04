<?php

namespace App\Http\Livewire\Plants;

use App\Models\Cistern;
use Livewire\Component;
use App\Models\Company;
use App\Models\Country;
use App\Models\Currency;
use App\Models\MembraneActiveArea;
use App\Models\PaymentType;
use App\Models\PersonalitationPlant;
use App\Models\Plant;
use App\Models\PlantContract;
use App\Models\PlantType;
use App\Models\PolishFilterType;
use App\Models\Train;
use App\Models\User;
use Exception;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreatePlants extends Component
{
    use WithFileUploads;

    // Arrays;
    public $plant;
    public $plant_handbook = [];
    public $personalisations;
    public $boosters;
    public $contract;
    public $costs;

    protected function rules()
    {
        return [
            'plant' => 'array:cover,handbooks,name,location,type,company,country,currency,operator,manager', // We validate the array
            'plant.cover' => ['image', 'mimes:jpg,png'],
            'plant.handbooks.*' => ['mimes:pdf'],
            'plant.name' => ['required', 'string', 'min:1', 'max:100', Rule::unique('plants', 'name')],
            'plant.location' => ['required', 'string', 'min:10', 'max:500'],
            'plant.type' => ['required', 'integer', Rule::exists('plant_types', 'id')],
            'plant.company' => ['required', 'integer', Rule::exists('companies', 'id')],
            'plant.country' => ['required', 'integer', Rule::exists('countries', 'id')],
            'plant.currency' => ['required', 'integer', Rule::exists('currencies', 'id')],
            'plant.operator' => ['required', 'integer', Rule::exists('users', 'id')],
            'plant.manager' => ['sometimes', 'integer', Rule::exists('users', 'id')],

            // Personalization
            'personalisations' => ['nullable', 'min:0', 'min:1', 'array:irrigation,wellPump,feedPump,chloride,sdi'], // We validate the array
            'personalisations.irrigation' => ['sometimes'],
            'personalisations.wellPump' => ['sometimes'],
            'personalisations.feedPump' => ['sometimes'],
            'personalisations.chloride' => ['sometimes'],
            'personalisations.sdi' => ['sometimes'],

            'personalisations.booster_flow' => ['sometimes'],
            'personalisations.feed_flow' => ['sometimes'],
            'personalisations.permeate_flow' => ['sometimes'],
            'personalisations.reject_flow' => ['sometimes'],

            'personalisations.cisterns' => [
                'nullable',
                'integer',
                'min:0',
                'max:6'
            ],
            'boosters' => [
                'nullable',
                'integer',
                'min:0',
                'max:6'
            ],

            // Plant Contract
            'contract' => ['min:1', 'max:1', 'array:yearsOfContract, from, till, billingDay, paymentType, minimumConsumption'], // We validate the array
            'contract.yearsOfContract' => ['required', 'integer', 'between:1,16'],
            'contract.from' => ['required', 'date'],
            'contract.till' => ['required', 'date', 'after:contract.from'],
            'contract.billingDay' => ['required', 'integer', 'between:1,31'],
            'contract.paymentType' => ['required', 'integer', Rule::exists('payment_types', 'id')],
            'contract.minimumConsumption' => ['nullable', 'numeric', 'min:0'],

            //Costs
            'costs.botM3' => ['sometimes', 'string', 'min:0'],
            'costs.botFixed' => ['sometimes', 'string', 'min:0'],
            'costs.oymM3' => ['sometimes', 'string', 'min:0'],
            'costs.oymFixed' => ['sometimes', 'string', 'min:0'],
            'costs.remineralisation' => ['sometimes', 'string', 'min:0'],

            // Trains
            // 'trains' => ['nullable', 'min:1|max:5|array:capacity,tds,booster,multimediaFilsters,polishFilters,polishQuantity,mArea,mElements'], // We validate the array
            // 'trains.capacity.*' => ['required', 'integer', 'min:0'],
            // 'trains.tds.*' => ['required', 'integer', 'min:0'],
            // 'trains.booster.*' => ['required', 'integer'],
            // 'trains.multimediaFilsters.*' => ['required', 'integer'],
            // 'trains.polishFilters.*' => ['required', 'integer'],
            // 'trains.polishQuantity.*' => ['required', 'integer'],
            // 'trains.mArea.*' => ['required', 'integer'],
            // 'trains.mElements.*' => ['required', 'integer'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        /*try {
            DB::transaction(function () {*/
        PersonalitationPlant::create([
            'irrigation' => isset($this->personalisations['irrigation']) ? 'yes' : 'no',
            'sdi' => isset($this->personalisations['sdi']) ? 'yes' : 'no',
            'chloride' => isset($this->personalisations['chloride']) ? 'yes'  : 'no',
            'well_pump' => isset($this->personalisations['wellPump']) ? 'yes'  : 'no',
            'feed_pump' => isset($this->personalisations['feedPump']) ? 'yes'  : 'no',
            'boosterc' => isset($this->personalisations['booster_flow']) ? 'yes'  : 'no',
            'feed_flow' => isset($this->personalisations['feed_flow']) ? 'yes'  : 'no',
            'permeate_flow' => isset($this->personalisations['permeate_flow']) ? 'yes'  : 'no',
            'reject_flow' => isset($this->personalisations['reject_flow']) ? 'yes'  : 'no'
        ]);

        $idPersonalitationPlant = PersonalitationPlant::latest('id')->first();

        $this->plant['cover']->store('plant.covers');

        foreach ($this->plant['handbooks'] as $handbook) {
            $handbook->store('plant.handbooks');
        }

        Plant::create([
            'name' => $this->plant['name'],
            'location' => $this->plant['location'],
            'cover_path' => $this->plant['cover'], // nullable
            'installed_capacity' => 0,
            'design_limit' => 0,

            'polish_filter_types_id' => 1,
            'polish_filters_quantity' => 2,

            'multimedia_filters_quantity' => 2,
            'cisterns' => isset($this->personalisations['cisterns']) ? $this->personalisations['cisterns'] : null,

            'companies_id' => $this->plant['company'],
            'clients_id' => 1,
            'personalitation_plants_id' => $idPersonalitationPlant->id,
            'countries_id' => $this->plant['country'],
            'plant_types_id' => $this->plant['type'],
            'operator' => $this->plant['operator'], //nullable
            'manager' => $this->plant['manager'], // nullable
            'user_created_at',
        ]);

        $plantId = Plant::latest('id')->first();

        PlantContract::create([
            'plant_id' => $plantId->id,
            'bot_m3' => $this->costs['botM3'],
            'bot_fixed' => $this->costs['botFixed'],
            'oym_m3' => $this->costs['oymM3'],
            'oym_fixed' => $this->costs['oymFixed'],
            'remineralitation' => $this->costs['remineralisationM3'],
            'total_m3 ' => 0,
            'total_month' => 0,

            'years' => $this->contract['yearsOfContract'],
            'from' => $this->contract['from'],
            'till' => $this->contract['till'], //nullable
            'minimun_consumption' => $this->contract['minimumConsumption'],
            'billing_day' => $this->contract['billingDay'], // nullable
            'payment_types_id' => $this->plants['contract.paymenttypes'], // nullable
            'user_created_at' => Auth::id(),
        ]);


        $idPlant = Plant::latest('id')->first();

        for ($t = 0; $t < count($this->trainIndex); $t++) {
            Train::create([
                'plants_id' => $idPlant->id,
                'capacity' => $this->trains['capacity'][$t],
                'boosters_quantity' => $this->trains['booster'][$t],
                'tds' => $this->trains['tds'][$t],
                'status' => 'Enable',
                'type' => 'Train',
                'membrane_active_areas_id' => $this->trains['mArea'][$t],
                'membrane_elements' => $this->trains['mElements'][$t],
                'user_created_at' => Auth::id(),
            ]);
        }
        /*});
        } catch (Exception $e) {
            dd('ERROR TRY CATCH');
        }*/
    }

    public function render()
    {
        return view('livewire.plants.create-plants', [
            'plantTypes' => PlantType::all(),
            'countries' => Country::all(),
            'currencies' => Currency::all(),
            'attendants' => User::role('Operator')->get(),
            'managers' => User::role('Manager')->get(),
            'membranesActiveArea' => MembraneActiveArea::all(),
            'polishFilterTypes' => PolishFilterType::all(),
            'companies' => Company::where('status', 1)->get(),
            'paymentTypes' => PaymentType::all()
        ]);
    }
}
