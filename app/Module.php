<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $fillable = [ 'uuid', 'name', 'group', 'status', 'order', 'ping', 'ping_url' ];

    public function getStatusColor ()
    {
        switch ($this->status)
        {
            case 1: return 'is-success';
            case 2: return 'is-info';
            case 3: return 'is-warning';
            case 4: return 'is-danger';
            default: return 'is-primary';
        }
    }

    public function getStatusTextColor ()
    {
        switch ($this->status)
        {
            case 1: return 'has-text-success';
            case 2: return 'has-text-info';
            case 3: return 'has-text-warning';
            case 4: return 'has-text-danger';
            default: return 'has-text-primary';
        }
    }

    public function getStatusIcon ()
    {
        switch ($this->status)
        {
            case 1: return "fa-check-circle";
            case 2: return "fa-info-circle";
            case 3: return "fa-exclamation-circle";
            case 4: return "fa-times-circle";
            default: return "fa-question-circle";
        }
    }

    public function getStatusInfo ()
    {
        switch ($this->status)
        {
            case 1: return "Operational";
            case 2: return "Incident reported";
            case 3: return "Partial outage";
            case 4: return "Major outage";
            default: return "Unknown status";
        }
    }

    public static function getCurrentHighestOrder()
    {
        if (count(Module::all()) == 0) return 0;
        else return Module::orderBy('order', 'desc')->first()->order;
    }

    public static function getNextOrderIndex()
    {
        if (count(Module::all()) == 0) return 0;
        else return Module::getCurrentHighestOrder() + 1;
    }

    public function moveUp()
    {
        // Increases order by one
        // Moves previous higher ranked item below
        $curOrder = $this->order;
        if ($curOrder == Module::getCurrentHighestOrder()) return; // This is already the highest item, so cancel
        if ($prevItem = Module::where('order', '>', $curOrder)->first())
        {
            $this->order = $prevItem->order;
            $prevItem->order = $curOrder;
            $prevItem->save();
            $this->save();
        }
    }

    public function moveDown()
    {
        // Decreases order by one
        // Moves previous lower ranked item above
        $curOrder = $this->order;
        if ($curOrder == 0) return; // This is already the lowest item, so cancel
        if ($prevItem = Module::where('order', '<', $curOrder)->first())
        {
            $this->order = $prevItem->order;
            $prevItem->order = $curOrder;
            $prevItem->save();
            $this->save();
        }
    }

}
