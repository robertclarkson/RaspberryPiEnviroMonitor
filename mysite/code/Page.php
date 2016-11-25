<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
		'TakeReading',
		'Form'
	);

	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
		// 
		// Requirements::Javascript('https://www.gstatic.com/charts/loader.js');
	}

	public function TakeReading() {

        $reading = exec ('sudo '.Director::baseFolder().'/TakeReading.py 2>&1', $output, $return_var);
		$readingArr = json_decode($reading, true);

		$sample = Reading::create();
		$sample->press = $readingArr['press'];
		$sample->rgb = $readingArr['rgb'];
		$sample->soiltemp = $readingArr['soiltemp'];
		$sample->temp = $readingArr['temp'];
		$sample->moist = $readingArr['moist'];
		$sample->lux = $readingArr['lux'];
		$sample->write();

		print_r($sample);

		echo 'Reading: '.$reading;
        echo ' Output: '.print_r($output,true);
        echo ' return_var: '.print_r($return_var,true);
	}

	public function Readings() {
		if($hours = $this->Request->getVar('HoursShown')) {
			return Reading::get()->filter('Created:GreaterThan', strtotime('-'.$hours.' hours'));
		}
		return Reading::get()->filter('Created:GreaterThan', strtotime('-24 hours'));

	}

	public function Form() {

		$vals = array(
			12 => 12,
			24 => 24,
			36 => 36,
			48 => 48,
			72 => 72,
			144 => 144
		);

		$fields = FieldList::create(
			DropdownField::create('HoursShown', 'Hours Shown', $vals)
		);
		$actions = FieldList::create(
			FormAction::create('show', 'Show')
		);
		$form = Form::create($this, 'Form', $fields, $actions);
		$form->setFormMethod('GET');
		return $form;
	}

	public function show() {
		return $this;
	}

}
