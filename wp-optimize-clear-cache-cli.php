<?php

namespace WP_Optimize_Clear_Cache;


/**
 * Plugin Name:       WP Optimize Clear Cache CLI
 * Update URI:        wp-optimize-clear-cache-cli
 * Description:       This plugin allows you to clear cache with WP Optimize from WP CLI.
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Version:           1.0.0
 * Author:            Faramaz Patrick <infos@goodmotion.fr>
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-optimize-clear-cache-cli
 */




if (!(defined('WP_CLI') && \WP_CLI)) {
  return;
}



class WP_Optimize_Clear_Cache_Cli
{
  public function clear_cache()
  {
    if (class_exists('WP_Optimize')) {
      \WP_Optimize()->get_page_cache()->purge();
      \WP_CLI::success('Cache cleared');
    } else {
      \WP_CLI::error('WP Optimize not installed');
    }
  }
}

\WP_CLI::add_command('wp-optimize-clear-cache', __NAMESPACE__ . '\WP_Optimize_Clear_Cache_Cli');
