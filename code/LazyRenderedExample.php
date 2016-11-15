<?php

class LazyRenderedExample extends LazyRendered {

	/**
	 * @var string URL Segment
	 */
	private static $url_segment = "lazyrendered";

	/**
	 * @var string Menu Title
	 */
	private static $menu_title = "Lazy Rendered";

	/**
	 * @var array Actions that are allowed to take place on this Controller
	 */
	private static $allowed_actions = array(
		'example', // expects exampleRender() to exist

		// this is whitelisted below, thus meaning action whitelisted_example won't be interpreted with Lazy
		// Render and instead will fallback to default functionality, therefore is expecting whitelisted_example()
		// to exist. Though for this to actually be whitelisted, this action must be added to the whitelist array below
		'whitelisted_example'
	);

	/**
	 * @var array Actions that won't be interpreted by LazyRendered thus falling back to default LeftAndMain functionality
	 *            Note that 'index' produces our layout, and indexRender() will be used to populate the contents
	 */
	protected $whitelist = array(
		'index', // not actually needed, index is automatically whitelisted
		'whitelisted_example'
	);

	/**
	 * The content for index body
	 *
	 * @return array
	 */
	public function indexRender() {
		return array(
			'Title' => static::$menu_title,
			'Body' => $this->renderWith(
				'LazyRenderedExample_Index',
				array(
					// ... this template still has access to the functionality within the controller and up the chain
				)
			)
		);
	}

	public function exampleRender() {
		return array(
			'Title' => 'Example Subpage',
			'Body' => $this->renderWith(
				'LazyRenderedExample_Example',
				array(
					// ...
				)
			)
		);
	}

	/**
	 * Avoid LazyRendered by adding this function to whitelist
	 * @return string
	 */
	public function whitelisted_example() {
		$this->response->setBody(
			json_encode(
				array(
					'Lazy' => 'Rendered',
					'Is' => 'Cool'
				)
			)
		);

		$this->response->addHeader("Content-type", "application/json");

		return $this->response;
	}
}
