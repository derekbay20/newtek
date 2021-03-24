<?php
/**
 * Custom Customizer Controls.
 *
 * @package themecentury
 * @subpackage slain
 */

if ( ! class_exists( 'WP_Customize_Section' ) ) {
	return null;
}

/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Slain_Customize_Upsell_Section extends WP_Customize_Section{

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'upsell';

	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';

	/**
	 * Custom pro button URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		$this->pro_text = (isset($args['pro_text'])) ? $args['pro_text'] : '';
		$this->pro_url = (isset($args['pro_text'])) ? $args['pro_url'] : '';
	}


	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render() {
		?>
		<style type="text/css">
			#accordion-section-theme_upsell{
				display:list-item !important;
			}
		</style>
		<li id="accordion-section-theme_upsell" class="accordion-section control-section control-section-upsell cannot-expand" style="display: list-item !important;">
			<h3 class="accordion-section-title">
				<?php echo esc_html($this->title); ?>
				<?php if ( $this->pro_text && $this->pro_url ) { ?>
				<a href="<?php echo esc_url($this->pro_url); ?>" class="button button-secondary alignright" style="color:#fff; background:#00a9ff;" target="_blank"><?php echo esc_html($this->pro_text); ?></a>
				<?php } ?>
			</h3>
		</li>
		<?php
	}
}
