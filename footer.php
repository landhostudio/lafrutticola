    <footer role="contentinfo" class="footer">
      <div class="container">

        <?php if (get_field('footer_text', options)): ?>
          <div class="footer__legal">
            <?php the_field('footer_text', options); ?>
          </div>
        <?php endif; ?>

        <div class="footer__copy">
          <p>&copy; <span itemprop="copyrightYear"><?php echo date('Y'); ?></span> <span itemprop="copyrightHolder"><?php bloginfo('name'); ?></span> – <?php bloginfo('description'); ?>.</p>
        </div>
        
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
