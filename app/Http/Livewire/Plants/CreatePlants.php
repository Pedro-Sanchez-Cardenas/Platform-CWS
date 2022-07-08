<?php

namespace App\Http\Livewire\Plants;

use Livewire\Component;
use App\Models\Company;
use App\Models\Country;
use App\Models\Currency;
use App\Models\MembraneType;
use App\Models\PaymentType;
use App\Models\PersonalitationPlant;
use App\Models\Plant;
use App\Models\PlantContract;
use App\Models\PlantType;
use App\Models\PolishFiltersType;
use App\Models\User;
use Carbon\Carbon;
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
    public $personalisations;
    public $boosters;
    public $contract;
    public $costs;
    public $trains = 1;

    protected $listeners = ['postAdded'];


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
            'contract.client' => ['required', 'integer', Rule::exists('clients', 'id')],
            'contract.yearsOfContract' => ['required', 'integer', 'between:1,16'],
            'contract.from' => ['required', 'date'],
            'contract.till' => ['required', 'date', 'after:contract.from'],
            'contract.billingDay' => ['required', 'integer', 'between:1,31'],
            'contract.paymentType' => ['required', 'integer', Rule::exists('payment_types', 'id')],
            'contract.minimumConsumption' => ['nullable', 'numeric', 'min:0'],
            'contract.observations' => ['required', 'min:5', 'max:10000'],

            //Costs
            'costs.botM3' => ['sometimes', 'string', 'min:0'],
            'costs.botFixed' => ['sometimes', 'string', 'min:0'],
            'costs.oymM3' => ['sometimes', 'string', 'min:0'],
            'costs.oymFixed' => ['sometimes', 'string', 'min:0'],
            'costs.remineralisation' => ['sometimes', 'string', 'min:0'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addTrain(){
        if($this->trains > 0 && $this->trains < 5){
            $this->trains++;
        }
    }

    public function removeTrain(){
        if($this->trains > 1){
            $this->trains--;
        }
    }

    public function store()
    {
       /* try {
            DB::transaction(function () {*/
                PersonalitationPlant::create([
                    'cisterns_quantity' => isset($this->personalisations['cisterns']) ? $this->personalisations['cisterns'] : null,

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

                if (isset($this->plant['cover'])) {
                    $this->plant['cover']->store('plant.covers');
                }

                if (isset($this->plant['handbooks'])) {
                    foreach ($this->plant['handbooks'] as $handbook) {
                        $handbook->store('plant.handbooks');
                    }
                }

                Plant::create([
                    'name' => $this->plant['name'],
                    'location' => $this->plant['location'],
                    'cover_path' => isset($this->plant['cover']) ? $this->plant['cover'] : null, // nullable
                    'installed_capacity' => 0,
                    'design_limit' => 0,

                    'companies_id' => $this->plant['company'],
                    'personalitation_plants_id' => $idPersonalitationPlant->id,

                    'countries_id' => $this->plant['country'],
                    'plant_types_id' => $this->plant['type'],
                    'operator' => $this->plant['operator'], //nullable
                    'manager' => isset($this->plant['manager']) ? $this->plant['manager'] : null, // nullable
                    'user_created_at' => Auth::id()
                ]);

                $plantId = Plant::latest('id')->first();

                PlantContract::create([
                    'plants_id' => $plantId->id,
                    'clients_id' => isset($this->contract['client']) ? $this->contract['client'] : null,
                    'bot_m3' => $this->costs['botM3'],
                    'bot_fixed' => isset($this->costs['botFixed']) ? $this->costs['botFixed'] : null,
                    'oym_m3' => isset($this->costs['oymM3']) ? $this->costs['oymM3'] : null,
                    'oym_fixed' => isset($this->costs['oymFixed']) ? $this->costs['oymFixed'] : null,
                    'remineralitation' => isset($this->costs['remineralisationM3']) ? $this->costs['remineralisationM3'] : null,

                    'years' => $this->contract['yearsOfContract'],
                    'from' => $this->contract['from'],
                    'till' => Carbon::create($this->contract['from'])->addYears($this->contract['yearsOfContract']), //nullable
                    'minimun_consumption' => isset($this->contract['minimumConsumption']) ? $this->contract['minimumConsumption'] : null,
                    'billing_day' => $this->contract['billingDay'], // nullable
                    'payment_types_id' => $this->contract['paymentType'], // nullable
                    'observations' => isset($this->contract['observations']) ? $this->contract['observations'] : null,
                    'user_created_at' => Auth::id(),
                ]);

                $idPlant = Plant::latest('id')->first();
                $this->emit('createTrain', $idPlant);
           /* });
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
            'membranesTypes' => MembraneType::all(),
            'polishFiltersTypes' => PolishFiltersType::all(),
            'companies' => Company::where('status', 1)->get(),
            'paymentTypes' => PaymentType::all()
        ]);
    }
}
