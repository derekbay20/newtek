<?php
/**
 * Slain Admin Class.
 *
 * @author  ThemeCentury
 * @package Slain
 * @since   1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Slain_Admin_Page')) :

    /**
     * Slain_Admin_Page Class.
     */
    class Slain_Admin_Page{

        /**
         * Constructor.
         */
        public function __construct()
        {
            add_action('admin_menu', array($this, 'admin_menu'));
            add_action('wp_loaded', array(__CLASS__, 'hide_notices'));
            add_action('load-themes.php', array($this, 'admin_notice'));
        }

        /**
         * Add admin menu.
         */
        public function admin_menu()
        {
            $theme = wp_get_theme(get_template());

            $page = add_theme_page(esc_html__('About', 'slain') . ' ' . $theme->display('Name'), esc_html__('About', 'slain') . ' ' . $theme->display('Name'), 'activate_plugins', 'slain-welcome', array(
                $this,
                'welcome_screen'
            ));
            add_action('admin_print_styles-' . $page, array($this, 'enqueue_styles'));
        }

        /**
         * Enqueue styles.
         */
        public function enqueue_styles()
        {
            global $slain_version;

        }

        /**
         * Add admin notice.
         */
        public function admin_notice()
        {
            global $slain_version, $pagenow;
            // Let's bail on theme activation.
            if ('themes.php' == $pagenow && isset($_GET['activated'])) {
                add_action('admin_notices', array($this, 'welcome_notice'));
                update_option('slain_admin_notice_welcome', 1);

                // No option? Let run the notice wizard again..
            } elseif (!get_option('slain_admin_notice_welcome')) {
                add_action('admin_notices', array($this, 'welcome_notice'));
            }
        }

        /**
         * Hide a notice if the GET variable is set.
         */
        public static function hide_notices()
        {
            if (isset($_GET['slain-hide-notice']) && isset($_GET['_slain_notice_nonce'])) {
                if (!wp_verify_nonce(wp_unslash($_GET['_slain_notice_nonce']), 'slain_hide_notices_nonce')) {
                    wp_die(esc_html__('Action failed. Please refresh the page and retry.', 'slain'));
                }

                if (!current_user_can('manage_options')) {
                    wp_die(esc_html__('Cheatin&#8217; huh?', 'slain'));
                }

                $hide_notice = sanitize_text_field(wp_unslash($_GET['slain-hide-notice']));
                update_option('slain_admin_notice_' . $hide_notice, 1);
            }
        }

        /**
         * Show welcome notice.
         */
        public function welcome_notice()
        {
            ?>
            <div id="message" class="updated slain-message">
                <a class="slain-message-close notice-dismiss"
                   href="<?php echo esc_url(wp_nonce_url(remove_query_arg(array('activated'), add_query_arg('slain-hide-notice', 'welcome')), 'slain_hide_notices_nonce', '_slain_notice_nonce')); ?>"><?php esc_html_e('Dismiss', 'slain'); ?></a>
                <p><?php
                    /* translators: 1: anchor tag start, 2: anchor tag end*/
                    printf(esc_html__('Welcome! Thank you for choosing Slain! To fully take advantage of the best our theme can offer please make sure you visit our %1$swelcome page%1$s.', 'slain'), '<a href="' . esc_url(admin_url('themes.php?page=slain-welcome')) . '">', '</a>');
                    ?></p>
                <p class="submit">
                    <a class="button-secondary"
                       href="<?php echo esc_url(admin_url('themes.php?page=slain-welcome')); ?>"><?php esc_html_e('Get started with Slain', 'slain'); ?></a>
                </p>
            </div>
            <?php
        }

        /**
         * Intro text/links shown to all about pages.
         *
         * @access private
         */
        private function intro()
        {
            global $slain_version;
            $theme = wp_get_theme(get_template());
            // Drop minor version if 0
            ?>
            <div class="slain-theme-info">
                <h1>
                    <?php esc_html_e('About', 'slain'); ?>
                    <?php echo esc_html( $theme->display('Name') ); ?>
                    <?php echo esc_html($slain_version); ?>
                </h1>
                <div class="welcome-description-wrap">
                    <div class="about-text"><?php echo esc_html($theme->display('Description')); ?></div>
                    <div class="slain-screenshot" style="position: absolute; top:70px; right:0; width: 200px;">
                        <img src="<?php echo esc_url(get_template_directory_uri()) . '/screenshot.png'; ?>"/>
                    </div>
                </div>
            </div>

            <p class="slain-actions">
                <a href="<?php echo esc_url('https://themecentury.com/downloads/slain-free-wordpress-theme/?ref=slain-about-us'); ?>"
                   class="button button-secondary"
                   target="_blank"><?php esc_html_e('Theme Info', 'slain'); ?></a>

                <a href="<?php echo esc_url(apply_filters('slain_theme_url', 'https://demo.themecentury.com/wpthemes/slain/')); ?>"
                   class="button button-secondary docs"
                   target="_blank"><?php esc_html_e('View Demo', 'slain'); ?></a>

                <a href="<?php echo esc_url(apply_filters('slain_rate_url', 'https://wordpress.org/support/view/theme-reviews/slain?filter=5#postform')); ?>"
                   class="button button-secondary docs"
                   target="_blank"><?php esc_html_e('Rate this theme', 'slain'); ?></a>
                <a href="<?php echo esc_url(apply_filters('slain_pro_plugin_url', 'https://themecentury.com/downloads/slain-pro-premium-wordpress-plugin/?ref=slain-about-us')); ?>"
                   class="button button-primary docs"
                   target="_blank"><?php esc_html_e('View Pro Version', 'slain'); ?></a>
            </p>

            <h2 class="nav-tab-wrapper">
                <a class="nav-tab <?php if (empty($_GET['tab']) && $_GET['page'] == 'slain-welcome') {
                    echo 'nav-tab-active';
                } ?>"
                   href="<?php echo esc_url(admin_url(add_query_arg(array('page' => 'slain-welcome'), 'themes.php'))); ?>">
                    <?php echo esc_html($theme->display('Name')); ?>
                </a>
                <a class="nav-tab <?php if (isset($_GET['tab']) && $_GET['tab'] == 'changelog') {
                    echo 'nav-tab-active';
                } ?>" href="<?php echo esc_url(admin_url(add_query_arg(array(
                    'page' => 'slain-welcome',
                    'tab' => 'changelog'
                ), 'themes.php'))); ?>">
                    <?php esc_html_e('Changelog', 'slain'); ?>
                </a>
                <a class="nav-tab <?php if (isset($_GET['tab']) && $_GET['tab'] == 'freevspro') {
                    echo 'nav-tab-active';
                } ?>" href="<?php echo esc_url(admin_url(add_query_arg(array(
                    'page' => 'slain-welcome',
                    'tab' => 'freevspro'
                ), 'themes.php'))); ?>">
                    <?php esc_html_e('Free vs Pro', 'slain'); ?>
                </a>
            </h2>
            <?php
        }

        /**
         * Welcome screen page.
         */
        public function welcome_screen()
        {
            $current_tab = empty($_GET['tab']) ? 'about' : sanitize_title(wp_unslash($_GET['tab']));

            // Look for a {$current_tab}_screen method.
            if (is_callable(array($this, $current_tab . '_screen'))) {
                return $this->{$current_tab . '_screen'}();
            }

            // Fallback to about screen.
            return $this->about_screen();
        }

        /**
         * Output the about screen.
         */
        public function about_screen()
        {
            $theme = wp_get_theme(get_template());
            ?>
            <div class="wrap about-wrap">

                <?php $this->intro(); ?>

                <div class="changelog point-releases">
                    <div class="under-the-hood two-col">

                        <div class="col">
                            <h3><?php esc_html_e('Theme Customizer', 'slain'); ?></h3>
                            <p><?php esc_html_e('All Theme Options are available via Customize screen.', 'slain') ?></p>
                            <p><a href="<?php echo esc_url( admin_url('customize.php') ); ?>"
                                  class="button button-secondary"><?php esc_html_e('Customize', 'slain'); ?></a>
                            </p>
                        </div>

                        <div class="col">
                            <h3><?php esc_html_e('Documentation', 'slain'); ?></h3>
                            <p><?php esc_html_e('Please view our documentation page to setup the theme.', 'slain') ?></p>
                            <p><a href="<?php echo esc_url('https://docs.themecentury.com/products/slain/'); ?>"
                                  class="button button-secondary"><?php esc_html_e('Documentation', 'slain'); ?></a>
                            </p>
                        </div>

                        <div class="col">
                            <h3><?php esc_html_e('Got theme support question?', 'slain'); ?></h3>
                            <p><?php esc_html_e('Please put it in our dedicated support forum.', 'slain') ?></p>
                            <p><a href="<?php echo esc_url('https://themecentury.com/forums/forum/slain-free-wordpress-theme/'); ?>"
                                  class="button button-secondary"><?php esc_html_e('Support', 'slain'); ?></a>
                            </p>
                        </div>

                        <div class="col">
                            <h3><?php esc_html_e('Any question about this theme or us?', 'slain'); ?></h3>
                            <p><?php esc_html_e('Please send it via our sales contact page.', 'slain') ?></p>
                            <p><a href="<?php echo esc_url('https://themecentury.com/contact/'); ?>"
                                  class="button button-secondary"><?php esc_html_e('Contact Page', 'slain'); ?></a>
                            </p>
                        </div>

                        <div class="col">
                            <h3>
                                <?php
                                esc_html_e('Translate', 'slain');
                                echo ' ' . esc_html($theme->display('Name'));
                                ?>
                            </h3>
                            <p><?php esc_html_e('Click below to translate this theme into your own language.', 'slain') ?></p>
                            <p>
                                <a href="<?php echo esc_url('https://translate.wordpress.org/projects/wp-themes/slain'); ?>"
                                   class="button button-secondary">
                                    <?php
                                    esc_html_e('Translate', 'slain');
                                    echo ' ' . esc_html($theme->display('Name'));
                                    ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="return-to-dashboard slain">
                    <?php if (current_user_can('update_core') && isset($_GET['updated'])) : ?>
                        <a href="<?php echo esc_url(self_admin_url('update-core.php')); ?>">
                            <?php is_multisite() ? esc_html_e('Return to Updates', 'slain') : esc_html_e('Return to Dashboard &rarr; Updates', 'slain'); ?>
                        </a> |
                    <?php endif; ?>
                    <a href="<?php echo esc_url(self_admin_url()); ?>"><?php is_blog_admin() ? esc_html_e('Go to Dashboard &rarr; Home', 'slain') : esc_html_e('Go to Dashboard', 'slain'); ?></a>
                </div>
            </div>
            <?php
        }

        /**
         * Output the changelog screen.
         */
        public function changelog_screen()
        {
            global $wp_filesystem;

            ?>
            <div class="wrap about-wrap">

                <?php $this->intro(); ?>

                <p class="about-description"><?php esc_html_e('View changelog below:', 'slain'); ?></p>

                <?php
                $changelog_file = apply_filters('slain_changelog_file', get_template_directory() . '/readme.txt');

                // Check if the changelog file exists and is readable.
                if ($changelog_file && is_readable($changelog_file)) {
                    WP_Filesystem();
                    $changelog = $wp_filesystem->get_contents($changelog_file);
                    $changelog_list = $this->parse_changelog($changelog);

                    echo wp_kses_post($changelog_list);
                }
                ?>
            </div>
            <?php
        }

        /**
         * Output the changelog screen.
         */
        public function freevspro_screen(){
            ?>
            <style type="text/css">
                .freevspro h4{
                    margin:0;
                    padding: 5px 0;
                }
            </style>
            <div class="wrap about-wrap freevspro">
                <?php $this->intro(); ?>
                <p class="about-description"><?php esc_html_e('Upgrade to PRO version for more awesome features.', 'slain'); ?></p>

                <table width="100%">
                    <thead>
                    <tr>
                        <th class="table-feature-title" align="left"><h3><?php esc_html_e('Features', 'slain'); ?></h3>
                        </th>
                        <th  align="left"><h3><?php esc_html_e('Slain', 'slain'); ?></h3></th>
                        <th  align="left"><h3><?php esc_html_e('Slain Pro', 'slain'); ?></h3></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><h4><?php esc_html_e('Support', 'slain'); ?></h4></td>
                        <td><?php esc_html_e('Forum', 'slain'); ?></td>
                        <td><?php esc_html_e('Forum + Emails/Support Ticket', 'slain'); ?></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Category colors', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Global Settings', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Global Colors', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Font size', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Elementor Support', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Google fonts', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><?php esc_html_e('500+', 'slain'); ?></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Custom widgets', 'slain'); ?></h4></td>
                        <td><?php esc_html_e('7', 'slain'); ?></td>
                        <td><?php esc_html_e('12', 'slain'); ?></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Social icons', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></td>
                        <td><span class="dashicons dashicons-yes"></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Social sharing', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                     <tr>
                        <td><h4><?php esc_html_e('Read more text', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Custom layouts', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Related posts', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Category enable/disable', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Author biography', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Footer copyright Text', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Advertisement Banner', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Reading indicator', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Featured Slider', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Random posts widget', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Tabbed widget', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Videos', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>

                    <tr>
                        <td><h4><?php esc_html_e('WooCommerce compatible', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('More Articles', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Sortable Headers', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Currency converter', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Call to action', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td><h4><?php esc_html_e('Contact us template', 'slain'); ?></h4></td>
                        <td><span class="dashicons dashicons-no"></span></td>
                        <td><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="<?php echo esc_url( apply_filters('slain_free_theme_url', 'https://themecentury.com/downloads/slain-free-wordpress-plugin/') ); ?>"
                               class="button button-secondary docs"
                               target="_blank"><?php esc_html_e('View Details', 'slain'); ?></a>
                        </td>
                        </td>
                        <td class="btn-wrapper">
                            <a href="<?php echo esc_url( apply_filters('slain_pro_plugin_url', 'https://themecentury.com/downloads/slain-pro-premium-wordpress-plugin/') ); ?>"
                               class="button button-secondary docs"
                               target="_blank"><?php esc_html_e('View Pro', 'slain'); ?></a>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <?php
        }

        /**
         * Parse changelog from readme file.
         *
         * @param  string $content
         *
         * @return string
         */
        private function parse_changelog($content)
        {
            $matches = null;
            $regexp = '~==\s*Changelog\s*==(.*)($)~Uis';
            $changelog = '';

            if (preg_match($regexp, $content, $matches)) {
                $changes = explode('\r\n', trim($matches[1]));

                $changelog .= '<pre class="changelog">';

                foreach ($changes as $index => $line) {
                    $changelog .= wp_kses_post(preg_replace('~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line));
                }

                $changelog .= '</pre>';
            }

            return wp_kses_post($changelog);
        }


        /**
         * Output the supported plugins screen.
         */
        public function supported_plugins_screen()
        {
            ?>
            <div class="wrap about-wrap">

                <?php $this->intro(); ?>

                <p class="about-description"><?php esc_html_e('This theme recommends following plugins:', 'slain'); ?></p>
                <ol>
                    <li><a href="<?php echo esc_url('https://wordpress.org/plugins/social-icons/'); ?>"
                           target="_blank"><?php esc_html_e('Social Icons', 'slain'); ?></a>
                        <?php esc_html_e(' by ThemeCentury', 'slain'); ?>
                    </li>
                    <li><a href="<?php echo esc_url('https://wordpress.org/plugins/easy-social-sharing/'); ?>"
                           target="_blank"><?php esc_html_e('Easy Social Sharing', 'slain'); ?></a>
                        <?php esc_html_e(' by ThemeCentury', 'slain'); ?>
                    </li>
                    <li><a href="<?php echo esc_url('https://wordpress.org/plugins/contact-form-7/'); ?>"
                           target="_blank"><?php esc_html_e('Contact Form 7', 'slain'); ?></a></li>
                    <li><a href="<?php echo esc_url('https://wordpress.org/plugins/wp-pagenavi/'); ?>"
                           target="_blank"><?php esc_html_e('WP-PageNavi', 'slain'); ?></a></li>
                    <li><a href="<?php echo esc_url('https://wordpress.org/plugins/woocommerce/'); ?>"
                           target="_blank"><?php esc_html_e('WooCommerce', 'slain'); ?></a></li>
                    <li>
                        <a href="<?php echo esc_url('https://wordpress.org/plugins/polylang/'); ?>"
                           target="_blank"><?php esc_html_e('Polylang', 'slain'); ?></a>
                        <?php esc_html_e('Fully Compatible in Pro Version', 'slain'); ?>
                    </li>
                    <li>
                        <a href="<?php echo esc_url('https://wpml.org/'); ?>"
                           target="_blank"><?php esc_html_e('WPML', 'slain'); ?></a>
                        <?php esc_html_e('Fully Compatible in Pro Version', 'slain'); ?>
                    </li>
                </ol>

            </div>
            <?php
        }

    }

endif;

return new Slain_Admin_Page();
