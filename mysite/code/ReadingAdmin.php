<?php

class ReadingAdmin extends ModelAdmin {

	private static $managed_models = array(
        'Reading'
    );

    private static $url_segment = 'readings';

    private static $menu_title = 'Readings';

}