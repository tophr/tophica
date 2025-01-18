</div>

<footer id="footer-container">
    <div id="footer" class="clearfix container">
        <p class="copyright">&copy; Copyright <?php echo date( 'Y' ); ?> <a href="/contact">Topher McCulloch</a></p>
        <p class="credit"><?php echo get_theme_mod( 'footer_text' ); ?> | <a href="#" title="Mozart's Ghost!" id="gl-btn-net">π</a></p>
    </div>
<?php wp_footer(); ?>
</footer>

<div id="gl-modal-container">
    <div id="gl-modal">
        <video id="gl-video">
            <source src="<?php echo get_template_directory_uri(); ?>/images/thenet-glitch.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <button id="gl-btn-close">Close</button>
    </div>
</div>
<script>
const btn = document.getElementById('gl-btn-net');
const modal = document.getElementById('gl-modal-container');
const btnClose = document.getElementById('gl-btn-close');
const video = document.getElementById('gl-video');
btn.addEventListener('click', (e) => {
    e.preventDefault();
    modal.style.display = 'block';
    video.play();
});
btnClose.addEventListener('click', () => {
    modal.style.display = 'none';
    video.pause();
});
video.addEventListener('ended', () => {
    modal.style.display = 'none';
});
</script>

</body>
</html>