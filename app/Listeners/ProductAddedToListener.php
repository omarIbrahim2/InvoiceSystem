<?php

namespace App\Listeners;

use App\Events\ProductAddedToEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductAddedToListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductAddedToEvent $event): void
    {
        $total = $event->InvoiceCalculationInterface->Calculate($event->Invoice);

        $event->Invoice->total = $total;

        $event->Invoice->save();

     

    
    }

   
}
