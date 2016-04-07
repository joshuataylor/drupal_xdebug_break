<?php

/**
 * @file
 * Contains \Drupal\xdebug_break\Twig\XDebugBreakExtension.
 */

namespace Drupal\xdebug_break\Twig;

class XDebugBreakExtension extends \Twig_Extension {

  /**
   * {@inheritdoc}
   */
  public function getFunctions() {
    return [
      new \Twig_SimpleFunction(
        'xdebug_break',
        [$this, 'xdebug_break'],
        [
          'needs_context' => TRUE,
          'needs_environment' => TRUE,
        ]
      ),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'xdebug_break';
  }

  /**
   * When xdebug_break is hit, $context will be where you currently broke.
   */
  public function xdebug_break(\Twig_Environment $env, array $context) {
    /*
     * Will only work if in twig is in debug mode and xdebug_break has been
     * enabled.
     */
    if ($env->isDebug() && function_exists('xdebug_break')) {
      xdebug_break();
    }
  }
}

