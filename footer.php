<?php wp_footer(); ?>

<?php
$footer_columns = morphix_get_option( 'footer_columns', '4' );
?>
<footer class="site-footer footer-cols-<?php echo esc_attr( $footer_columns ); ?>">
    <div class="container footer-inner">
        <?php for ( $i = 1; $i <= intval( $footer_columns ); $i++ ) : ?>
            <div class="footer-col footer-col-<?php echo $i; ?>">
                <?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
                    <?php dynamic_sidebar( 'footer-' . $i ); ?>
                <?php else : ?>
                    <p><?php echo sprintf( __( 'Footer Column %d - Add Widgets', 'morphix' ), $i ); ?></p>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
</footer>

</body>
</html>