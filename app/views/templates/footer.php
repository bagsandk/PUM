<footer class="footer">
    <div class="container-fluid">
        <nav>
            <!-- <ul class="footer-menu">
                <li>
                    <a href="#">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        Company
                    </a>
                </li>
                <li>
                    <a href="#">
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        Blog
                    </a>
                </li>
            </ul> -->
            <p class="copyright text-center">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="#">PUM MI 2019</a>, by MI 17 A
            </p>
        </nav>
    </div>
</footer>
</div>
</div>
</body>
<script type="text/javascript">
    function angka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<!--   Core JS Files   -->
<script src="<?= BASEURL; ?>/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?= BASEURL; ?>/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?= BASEURL; ?>/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?= BASEURL; ?>/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="<?= BASEURL; ?>/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?= BASEURL; ?>/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?= BASEURL; ?>/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= BASEURL; ?>/js/demo.js"></script>
<script src="<?= BASEURL; ?>/js/cekform.js"></script>

</html>