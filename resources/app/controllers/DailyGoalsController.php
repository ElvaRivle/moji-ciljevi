<?php

class DailyGoalsController extends Controller {

    public function __construct()
    {
        parent::__construct(new DailyGoalsModel());
    }

    
}


?>