
        <?= $copyright ?>


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url(); ?>templates/kamr/vendor/global/global.min.js"></script>
	<script src="<?= base_url(); ?>templates/kamr/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url(); ?>templates/kamr/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?= base_url(); ?>templates/kamr/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="<?= base_url(); ?>templates/kamr/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="<?= base_url(); ?>templates/kamr/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url(); ?>templates/kamr/vendor/select2/js/select2.full.min.js"></script>
	
	<!-- Swiper-js -->
	<script src="<?= base_url(); ?>templates/kamr/vendor/swiper/js/swiper-bundle.min.js"></script>

	<!-- Datatable -->
	<script src="<?= base_url(); ?>templates/kamr/vendor/datatables/js/jquery.dataTables.min.js"></script>
    
	<!-- OpenLayers -->
	<script src="<?= base_url(); ?>templates/kamr/vendor/ol/dist/ol.js"></script>
	


    <script src="<?= base_url(); ?>templates/kamr/js/custom.js"></script>
	<script src="<?= base_url(); ?>templates/kamr/js/deznav-init.js"></script>
	<script src="<?= base_url(); ?>templates/kamr/js/demo.js"></script>
    
	
	<?= (isset($script) ? $script : "") ?>
    
    <?php 
    if($this->session->flashdata('swal')):
        echo '<script>';
        echo $this->session->flashdata('swal');
        echo '</script>';
    endif; 
    unset($_SESSION["swal"]);
    ?>
    
	<script>
		$(function () {
			  $(".datepicker").datepicker({ 
					autoclose: true, 
					todayHighlight: true,
					format: 'yyyy-mm-dd'
			  });
		
		});

	</script>
	
	
</body>
</html>