<footer>
    <div class="footer-area">
        <p>&copy; Copyright 2023. All right reserved. <span id="time"></span></p>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function() {
    setInterval(function() {
        var time = new Date();
        var options = {
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric'
        };
        var formattedTime = time.toLocaleDateString('en-US', options);
        jQuery('#time').html(formattedTime);
    }, 1000);
});
</script>