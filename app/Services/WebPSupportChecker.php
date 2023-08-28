<?php

namespace App\Services;

class WebPSupportChecker {

/**
 * Check if the browser supports WebP images.
 *
 * @return bool
 */
public function supportsWebP() {
    if (!isset($_SERVER['HTTP_ACCEPT'])) {
        return false;
    }

    return strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false;
}
}