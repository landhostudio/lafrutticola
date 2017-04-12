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

    <?php get_template_part('template-parts/cookies'); ?>

    <?php wp_footer(); ?>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-9111827-40', 'auto');
      ga('send', 'pageview');  
    </script>
  </body>
</html>
