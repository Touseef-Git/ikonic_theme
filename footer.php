    <footer>
      
        <?php if ( is_active_sidebar( 'footer' ) ) : ?>
            <div>
                <?php dynamic_sidebar( 'footer' ); ?>
            </div>
        <?php endif; ?>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>