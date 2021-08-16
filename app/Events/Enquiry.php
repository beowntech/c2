<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Date;

class Enquiry implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;

    /**
     * Create a new event instance.
     * @param  int  $id
     * @return void
     */
    public function __construct($id)
    {
        $this->setDate($id);
    }

    public function setDate($id) {
        $this->id = $id;
    }

    public function getDate() {
        return $this->id;
    }

    public function broadcastWith(){
        $dat = $this->getDate();
        $data = \App\Enquiries::where('enq_id',$dat)->get();
        if(!$data->isEmpty()) {
            return [
                'data'=>$data[0]->assigned_to
            ];
        }
        return ['data'=>0];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('enquiry');
    }

    public function broadcastAs()
    {
        return 'enquiry';
    }
}
