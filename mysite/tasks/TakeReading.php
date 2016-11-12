<?php

class TakeReading extends Controller {

    private static $allowed_actions = array(
        'index'
    );

    function index() {
        $reading = exec ('/home/pi/TakeReading.py');
        $readingArr = json_decode($reading);

        $sample = Reading::create();
        $sample->press = $readingArr['press'];
        $sample->rgb = $readingArr['rgb'];
        $sample->soiltemp = $readingArr['soiltemp'];
        $sample->temp = $readingArr['temp'];
        $sample->moist = $readingArr['moist'];
        $sample->lux = $readingArr['lux'];
        $sample->write();
        echo $reading;
    }
}