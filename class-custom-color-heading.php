<?php
class Custom_Color_Heading {
    private $settings_key = 'custom_color_heading_options';

    public function init() {
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_init', [$this, 'settings_init']);
        add_action('wp_head', [$this, 'custom_heading_css']);
        add_shortcode('custom_heading', [$this, 'custom_heading_shortcode']);
    }

    public function add_admin_menu() {
        add_menu_page(
            'Custom Color Heading',
            'Custom Color Heading',
            'manage_options',
            'custom-color-heading',
            [$this, 'custom_color_heading_settings']
        );
    }

    public function settings_init() {
        register_setting($this->settings_key, $this->settings_key, [
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        add_settings_section($this->settings_key, 'Color Settings', [$this, 'section_callback'], 'custom-color-heading');

        add_settings_field('heading_color', 'Heading Color', [$this, 'color_field_callback'], 'custom-color-heading', $this->settings_key);
    }

    public function section_callback() {
        echo '<p>Set the color for the heading.</p>';
    }

    public function color_field_callback() {
        $options = get_option($this->settings_key);
        $color = isset($options['heading_color']) ? $options['heading_color'] : '#000000';
        echo "<input type='color' name='{$this->settings_key}[heading_color]' value='$color' />";
    }

    public function custom_color_heading_settings() {
        if (!current_user_can('manage_options')) {
            return;
        }

        if (isset($_GET['settings-updated'])) {
            add_settings_error($this->settings_key, "{$this->settings_key}_message", 'Settings Saved', 'updated');
        }

        settings_errors("{$this->settings_key}_message");
        ?>
        <div class="wrap">
            <h1>Custom Color Heading Settings</h1>
            <form action="options.php" method="post">
                <?php
                settings_fields($this->settings_key);
                do_settings_sections('custom-color-heading');
                submit_button('Save Settings');
                ?>
            </form>
        </div>
        <?php
    }

    public function custom_heading_css() {
        $options = get_option($this->settings_key);
        $color = isset($options['heading_color']) ? $options['heading_color'] : '';

        echo "<style>
            .custom-heading {
                color: $color;
            }
        </style>";
    }

    public function custom_heading_shortcode($atts, $content = null) {
        $options = get_option($this->settings_key);
        $color = isset($options['heading_color']) ? $options['heading_color'] : '';

        return "<h1 class='custom-heading' style='color: $color;'>$content</h1>";
    }
}

