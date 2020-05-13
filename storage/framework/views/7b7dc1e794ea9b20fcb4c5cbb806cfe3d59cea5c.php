
  	</div>
	<!-- /.content-wrapper -->
  	<footer class="main-footer">
		<div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
		<?php echo e((getSettings('copyright-text'))? getSettings('copyright-text') : ""); ?>

	</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo e(url('public/backend/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(url('public/backend/bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(url('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo e(url('public/backend/bower_components/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(url('public/backend/bower_components/morris.js/morris.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(url('public/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo e(url('public/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(url('public/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(url('public/backend/bower_components/jquery-knob/dist/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(url('public/backend/bower_components/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(url('public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(url('public/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(url('public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(url('public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(url('public/backend/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('public/backend/dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(url('public/backend/dist/js/pages/dashboard.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(url('public/backend/dist/js/demo.js')); ?>"></script>
<!-- toastr -->
<script src="<?php echo e(url('public/backend/js/toastr.min.js')); ?>"></script>
<?php echo app('toastr')->render(); ?>
<!-- datatable -->
<script src="<?php echo e(url('public/backend/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('public/backend/js/jquery.dataTables.min.js')); ?>"></script>
<!-- ckeditor -->
<script src="<?php echo e(url('public/vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(url('public/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
<!-- Lightbox -->
<script src="<?php echo e(url('public/backend/lightbox2-master/dist/js/lightbox.js')); ?>"></script>
<!-- jQuery date time picker start -->
<link rel="stylesheet" href="<?php echo e(url('public/common/jquery_datetimepicker/build/jquery.datetimepicker.min.css')); ?>">
<script type="text/javascript" src="<?php echo e(url('public/common/jquery_datetimepicker/build/jquery.datetimepicker.full.min.js')); ?>"></script>
<!-- jQuery date time picker End -->
<script>
	lightbox.option({ 'resizeDuration': 200, 'wrapAround': true });
</script>

<!-- Datepicker Script Start -->
<script>
	$(document).find(".datepicker").datepicker({ "clearBtn": true, "autoclose": true });
</script>
<!-- Datepicker Script End -->
<!-- decodeHTMLEntities Work Start -->
<script type="text/javascript">
	function decodeHTMLEntities(text) {
		var entities = [
			['amp', '&'],
			['apos', '\''],
			['#x27', '\''],
			['#x2F', '/'],
			['#39', '\''],
			['#47', '/'],
			['lt', '<'],
			['gt', '>'],
			['nbsp', ' '],
			['quot', '"']
		];
		for (var i = 0, max = entities.length; i < max; ++i) { text = text.replace(new RegExp('&'+entities[i][0]+';', 'g'), entities[i][1]); }
		return text;
	}
</script>
<!-- decodeHTMLEntities Work End -->

<!-- Number Only Validation Work Start -->
<script type="text/javascript">
	$(document).on("keypress",".numberOnly",function(event){
	  var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
      return true;
    } else if ( key < 48 || key > 57 ) {
      return false;
    } else {
      return true;
    }
	});
</script>
<!-- Number Only Validation Work End -->

<!-- Mail Attachment Limit Script Start -->
<script type="text/javascript">
	$(document).on('change','input[type="file"]', function(e) { 
		if( $(this).hasClass('mail_attach') ){
			myfile= $( this ).val();
			var ext = $(this).val().split(".").pop().toLowerCase();
			if($.inArray(ext, ["pdf","doc",'docx','xls','xlsx','jpg','jpeg','png','bmp','svg','gif']) == -1) {
				e.preventDefault();
				this.value = "";
				alert("Please select a valid file.");
			}
		}
		if( $(this).hasClass('mail_attach') ) var max_size = 25;
		else var max_size = 100;
		var size = (this.files[0].size / 1024 / 1024).toFixed(2); 
		if (size > max_size) {
			e.preventDefault();
			this.value = "";
			alert("File can not be greater than 25 MB.");
		} 
	}); 
</script>
<!-- Mail Attachment Limit Script End -->

<!-- Jquery Validation Work Start -->
<script type="text/javascript" src="<?php echo e(url('public/common/jquery_validation/dist/jquery.validate.js')); ?>"></script>
<script>
	jQuery.validator.setDefaults({
		errorPlacement: function(error, element) {
			if($( element ).closest( ".field_container" ).has("span.error").length ) $(element).closest( ".field_container" ).find("span.error").remove();
			$( element ).closest( ".field_container" ).append( error );
		},
		errorClass: "error text-danger",
		errorElement: "span",
		onkeyup: function(element){ $(element).valid(); },
		submitHandler: function(form) { $(".loader_container").show(); form.submit(); }
	});
	/** regex validation method add work start **/
	jQuery.validator.addMethod( "regex", function(value, element, regexp) {
		var check = false;
		return this.optional(element) || regexp.test(value);
	}, function(condition, element) {
		return "The "+element.name+" field is invalid";
	});
	/** regex validation method add work end **/
	/** nospace metnod add work start **/
	jQuery.validator.addMethod("noSpace", function(value, element) { 
	  	return value.trim().length > 0 && value != ""; 
	}, function(condition, element) {
		return "The "+element.name+" field must not have any space";
	});
	/** nospace metnod add work end **/
	/** editor required method add work start **/
	jQuery.validator.addMethod("editorRequired", function(value, element) { 
	  return decodeHTMLEntities(value).replace(/<[^>]*>/gi, '').trim().length > 0 && value != ""; 
	}, function(condition, element) {
		return "The "+element.name+" field is required";
	});
	/** editor required method add work end **/
	/** editor required minlength add work start **/
	jQuery.validator.addMethod("editorMinlength", function(value, element, minlength) { 
	  return decodeHTMLEntities(value).replace(/<[^>]*>/gi, '').trim().length >= minlength; 
	}, function(minlength, element) {
		return "The "+element.name+" field must not exceed "+minlength+" characters";
	});
	/** editor required minlength add work end **/
	/** editor required maxlength add work start **/
	jQuery.validator.addMethod("editorMaxLength", function(value, element, maxlength) { 
	  return decodeHTMLEntities(value).replace(/<[^>]*>/gi, '').trim().length <= maxlength; 
	}, function(maxlength, element) {
		return "The "+element.name+" field must not exceed "+maxlength+" characters";
	});
	/** editor required maxlength add work end **/
</script>
<!-- Jquery Validation Work Start -->

<!-- CKEDITOR Instance ready Work Start -->
<script type="text/javascript">
	$(document).ready(function(){ 
		CKEDITOR.on('instanceReady', function (e) {
		    var instance = e.editor;
		    instance.on("change", function (evt) { onCKEditorChange(evt.editor); });
		    //key event handler is a hack, cause change event doesn't handle interaction with these keys 
		    instance.on('key', function (evt) {
				var backSpaceKeyCode = 8;
				var deleteKeyCode = 46;
				if (evt.data.keyCode == backSpaceKeyCode || evt.data.keyCode == deleteKeyCode) {
					//timeout needed cause editor data will update after this event was fired
					setTimeout(function() { onCKEditorChange(evt.editor); }, 100);
				}
		    });
		    instance.on('mode', function () {
				if (this.mode == 'source') {
					var editable = instance.editable();
					editable.attachListener(editable, 'input', function (evt) { onCKEditorChange(instance); });
				}
		    });
		});
	});
	function onCKEditorChange(intance) { intance.updateElement(); triggerElementChangeAndJqueryValidation($(intance.element.$)); }
	function triggerElementChangeAndJqueryValidation(element) { element.trigger('keyup'); }
</script>
<!-- CKEDITOR Instance ready Work End -->

</body>
</html><?php /**PATH /opt/lampp/htdocs/helthiago/resources/views/backend/includes/footer.blade.php ENDPATH**/ ?>