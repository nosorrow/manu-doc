<?php

namespace App\Models;

use Core\Model;

class DbTestModel extends Model
{

    /**
     * BookingModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function selectDb()
    {
        return $this->table('geo_city')->limit(30)->get();
    }
}