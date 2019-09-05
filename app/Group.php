<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $fillable = [ 'name', 'uuid', 'status' ];

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
}
