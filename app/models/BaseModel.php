<?php

/*
* Reformat Dates
* for all models
* don't forget to refer your extension to this MODEL, into your own models
* Code from: https://coderwall.com/p/ms-a1g
*/

use Carbon\Carbon;

class BaseModel extends Eloquent {

    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('d/m/Y à H:i'); //CHange the format to whichever you desire
    }

    public function getUpdatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('d/m/Y à H:i'); //Change the format to whichever you desire
    }
}