<?php

namespace App\Events;

use App\Src\Interfaces\InvoiceCalculateTotalInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductAddedToEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $InvoiceCalculationInterface;
    public $Invoice;
    /**
     * Create a new event instance.
     */
    public function __construct(InvoiceCalculateTotalInterface $InvoiceCalculationInterface , $Invoice)
    {
        $this->InvoiceCalculationInterface = $InvoiceCalculationInterface;
        $this->Invoice = $Invoice;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
