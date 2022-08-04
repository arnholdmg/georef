<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class FindCoord extends Component
{
    public $address;
    public $lat;
    public $lng;
    public $found;

    public function mount()
    {
        $found = false;
    }
    
    public function render()
    {
        return view('livewire.find-coord');
    }

    public function submit()
    {
        $this->lat = null;
        $this->lng = null;
        $this->found = false;
        
        $response = Http::get('https://nominatim.openstreetmap.org/search?q=Avenida Juscelino Kubitschek de Oliveira, 2200, Pelotas&format=json');
        $response = json_decode($response->getBody()->getContents(), true);

        if(count($response) > 0){
            $response = $response[0];

            if(isset($response['lat'])){
                $this->lat = $response['lat'];
            }
            
            if(isset($response['lon'])){
                $this->lng = $response['lon'];
            }
        }

        if(is_numeric($this->lat) && is_numeric($this->lng)){
            $this->found = true;
        }
    }    
}
