<?php
class EnviroPage extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class EnviroPage_Controller extends Page_Controller {


	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
		// 
		// Requirements::Javascript('https://www.gstatic.com/charts/loader.js');
	}


}
