<?php
/**
 * Customizer Control: twentytwentyone-react-color.
 *
 * Code is extracted and inspired by https://github.com/kirki-framework/control-react-color
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/**
 * React-color control.
 *
 * @since 1.0
 */
class Twenty_Twenty_One_ColorPicker extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @since 1.0
	 * @var string
	 */
	public $type = 'twentytwentyone-react-color';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function enqueue() {
		parent::enqueue();

		// Enqueue the script.
		wp_enqueue_script(
			'twentytwentyone-control-react-color',
			get_theme_file_uri( 'inc/palette-color-picker-control/dist/main.js' ),
			array( 'customize-controls', 'wp-element', 'jquery', 'customize-base' ),
			filemtime( get_theme_file_path( 'inc/palette-color-picker-control/dist/main.js' ) ),
			false
		);

		// Enqueue the style.
		wp_enqueue_style(
			'twentytwentyone-control-react-color',
			get_theme_file_uri( 'inc/palette-color-picker-control/src/style.css' ),
			array(),
			filemtime( get_theme_file_path( 'inc/palette-color-picker-control/src/style.css' ) )
		);
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @access public
	 * @since 1.0
	 * @see WP_Customize_Control::to_json()
	 * @return void
	 */
	public function to_json() {
		parent::to_json();
		$this->json['choices'] = $this->choices;
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 * @since 1.0
	 * @return void
	 */
	protected function content_template() {}
}
