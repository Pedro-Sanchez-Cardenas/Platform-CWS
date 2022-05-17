<?php

namespace App\Http\Livewire\ReverseOsmosisType;

use Livewire\Component;

class IndexReverseOsmosisType extends Component
{
    public function render()
    {
        return view('livewire.reverse-osmosis-type.index-reverse-osmosis-type',[
            'reverse_osmosis_types' => collect()
        ]);
    }
}
