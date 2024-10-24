<?php
/*
Plugin Name: Custom Form Plugin
Description: A simple plugin to save form data to the database for the Oneclick practical round.
Version: 1.0
Author: Dhara Maharaj
*/

if (!defined('ABSPATH')) {
    exit;
}

// Create a custom table for storing custom form data
function cfp_create_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'custom_form_data';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        email text NOT NULL,
        message text NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

//Here, plugin activation
register_activation_hook(__FILE__, 'cfp_create_table');


// form submit
function cfp_handle_form_submission() {
    if (isset($_POST['cfp_submit'])) {
        global $wpdb;

        $table_name = $wpdb->prefix . 'custom_form_data';
        $name = sanitize_text_field($_POST['cfp_name']);
        $email = sanitize_email($_POST['cfp_email']);
        $message = sanitize_textarea_field($_POST['cfp_message']);

        $wpdb->insert($table_name, [
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ]);
    }
}
add_action('init', 'cfp_handle_form_submission');

// Here, Shortcode to show the form
function cfp_display_form() {
    ob_start();
    ?>
    <form method="post">
        <label for="cfp_name">Name:</label>
        <input type="text" name="cfp_name" required>

        <label for="cfp_email">Email:</label>
        <input type="email" name="cfp_email" required><br /><br />

        <label for="cfp_message">Message:</label>
        <textarea name="cfp_message" required></textarea><br /><br />

        <input type="submit" name="cfp_submit" value="Submit">
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_form', 'cfp_display_form');

// Here, Shortcode to show saved data
function cfp_display_saved_data() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_form_data';
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    ob_start();
    ?>
    <div class="wrap">
        <h1>Saved Form Data</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($results): ?>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo esc_html($row->id); ?></td>
                            <td><?php echo esc_html($row->name); ?></td>
                            <td><?php echo esc_html($row->email); ?></td>
                            <td><?php echo esc_html($row->message); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No data found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('show_data', 'cfp_display_saved_data');

// Here, menu to display saved data
function cfp_add_admin_menu() {
    add_menu_page('Custom Form Data', 'Form Data', 'manage_options', 'custom-form-data', 'cfp_show_data', 'dashicons-list-view');
}
add_action('admin_menu', 'cfp_add_admin_menu');

//Here, show saved data 
function cfp_show_data() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_form_data';
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    include plugin_dir_path(__FILE__) . 'templates/show-data.php';
}
?>
