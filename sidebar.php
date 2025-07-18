<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Morphix
 */

if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
    </aside>
<?php endif; ?>