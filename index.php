<?php require 'views/gallery.header.inc.php'; ?>

<section class="container_12">
	<form action="POST" class="accessCode" id="accessCode">
		<div class="accessCode_table">
			<div class="accessCode_left">
				<img src="//www.jasonfukura.com/image/LOGO-Fukura2016_LIN.png" class="accessCode_logo" alt="Jason Fukura">
			</div>
			<div class="accessCode_right">
				<span class="blokk" style="width:40%;height:2em;margin-top:10px;"></span>
				<span class="blokk" style="width:80%;height:1em;"></span>
				<h2 class="accessCode_headline">2. Enter access code</h2>
				<div class="codeMsg">Please check your access code and try again.</div>
				<input class="codeChar" type="text" name="a1" maxlength="1" placeholder="*">
				<input class="codeChar" type="text" name="a2" maxlength="1" placeholder="*">
				<input class="codeChar" type="text" name="a3" maxlength="1" placeholder="*">
				<input class="codeChar" type="text" name="a4" maxlength="1" placeholder="*">
				<input class="codeChar" type="text" name="a5" maxlength="1" placeholder="*">
				<input class="btn-dark" type="submit" value="Go">
			</div>
		</div>
		
	</form>	
</section>

<script>
	var container = document.getElementsByClassName('accessCode')[0];
	container.onkeyup = function(e) {
	    var target = e.srcElement;
	    var maxLength = parseInt(target.attributes.maxlength.value, 10);
	    var myLength = target.value.length;
	    if (myLength >= maxLength) {
	        var next = target;
	        while (next = next.nextElementSibling) {
	            if (next === null)
	                break;
	            if (next.tagName.toLowerCase() == 'input') {
	                next.focus();
	                break;
	            }
	        }
	    }
	};


	$(function () {
		'use strict';

		$('#accessCode').on('submit', function (e) {
			e.preventDefault();
			$('.codeChar').removeClass('error');

			var codeInput = '';

			$('#accessCode').find('input[type="text"]').each(function () {
				codeInput += $(this).val();
			});

			$.ajax({
				method: 'POST',
				url: 'models/ajax.accessCode.php',
				data: {access: codeInput.toUpperCase()},
			}).done(function (response) {
				if(response === '1') {
					// Go to gallery
					window.location.href = '/gallery';
				} else {
					$('.codeChar').addClass('error');
					$('.codeMsg').slideDown(250);
				}
			});

		});
	});
</script>