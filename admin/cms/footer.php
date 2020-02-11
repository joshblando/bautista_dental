</div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="js/jquery-3.3.1.slim.min.js"></script> -->
    <!-- Popper.JS -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/solid.js"></script>
    <script src="../js/fontawesome.js"></script>
    <script src="js/notification.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>