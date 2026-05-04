<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;

class TicketDownload implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $ticket = '';

    public function __construct(Ticket $ticket){
        $this->ticket = $ticket;
    }


}
