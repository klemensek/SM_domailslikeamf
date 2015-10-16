<?php

//print '<img src="/uploads/c2263291dc6844e31513edab3f8cc73d2a4da3ab.jpg" />';
$img = '/uploads/c2263291dc6844e31513edab3f8cc73d2a4da3ab.jpg';

$imgpath = '/uploads/';
$directory = 'C:\wamp\www\sm_domailslikeamf/uploads/';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

?>


	<script type="text/javascript">
		function initButtons() {
			$(".btnPreview").button({
				icons: {
					primary: "ui-icon-newwin"
				}
			});

			$(".btnAlert").button({
				icons: {
					primary: "ui-icon-alert"
				}
			});

			$(".btnPlay").button({
				icons: {
					primary: "ui-icon-play"
				}
			});

			$(".btnPause").button({
				icons: {
					primary: "ui-icon-pause"
				}
			});

			$(".btnStar").button({
				icons: {
					primary: "ui-icon-star"
				}
			});

			$(".btnScissors").button({
				icons: {
					primary: "ui-icon-scissors"
				}
			});

			$(".btnEdit").button({
				icons: {
					primary: "ui-icon-pencil"
				}
			});

			$(".btnHelp").button({
				icons: {
					primary: "ui-icon-help"
				}
			});

			$(".btnSearch").button({
				icons: {
					primary: "ui-icon-search"
				}
			});

			$(".btnTag").button({
				icons: {
					primary: "ui-icon-tag"
				}
			});

			$(".btnFlag").button({
				icons: {
					primary: "ui-icon-flag"
				}
			});

			$(".btnUnlock").button({
				icons: {
					primary: "ui-icon-unlocked"
				}
			});

			$(".btnLock").button({
				icons: {
					primary: "ui-icon-locked"
				}
			});


			$(".btnDelete").button({
				icons: {
					primary: "ui-icon-trash"
				}
			});

			$(".btnSave").button({
				icons: {
					primary: "ui-icon-disk"
				}
			});

			$(".btnCancel").button({
				icons: {
					primary: "ui-icon-close"
				}
			});

			$(".btnSend").button({
				icons: {
					primary: "ui-icon-mail-closed"
				}
			});

			$(".btnUpload").button({
				icons: {
					primary: "ui-icon-transfer-e-w"
				}
			});

			$(".btnProcess").button({
				icons: {
					primary: "ui-icon-gear"
				}
			});

			$(".btnAdd").button({
				icons: {
					primary: "ui-icon-plus"
				}
			});

			$(".btnDetails").button({
				icons: {
					primary: "ui-icon-contact"
				}
			});

			$(".btnCopy").button({
				icons: {
					primary: "ui-icon-copy"
				}
			});

			$(".btnLink").button({
				icons: {
					primary: "ui-icon-link"
				}
			});

			$(".btnPower").button({
				icons: {
					primary: "ui-icon-power"
				}
			});

			$(".btnFix").button({
				icons: {
					primary: "ui-icon-wrench"
				}
			});

			$(".btnRefresh").button({
				icons: {
					primary: "ui-icon-refresh"
				}
			});

			$(".btnClose").button({
				icons: {
					primary: "ui-icon-close"
				}
			});

			$(".btnCalc").button({
				icons: {
					primary: "ui-icon-calculator"
				}
			});

			$(".btnMail").button({
				icons: {
					primary: "ui-icon-mail-open"
				}
			});

			$(".btnNextArrow").button({
				icons: {
					secondary: "ui-icon-carat-1-e"
				}
			});

			$(".btnPrevArrow").button({
				icons: {
					primary: "ui-icon-carat-1-w"
				}
			});

		}

		$(document).ready(function() {
			initButtons();
		});

	</script>





	<div id="gallery_content">
		<div id="gallery" class="scroll">





			<?php foreach($scanned_directory as $sd){ ?>

				<?php $sd0 = $imgpath . $sd; ?>
					<div class="galleryImage" id="galleryImage_<?php echo $sd; ?>" style="float: left; margin: 6px; background: #ffffff; border: #4d4d4d; padding: 2px;">
						<div style="text-align: center; font-size: 0.8em;">
							<input name="image" type="radio" value="<?php echo $sd0; ?>" />
						</div>
						<div style="text-align: center; min-width: 132px; min-height: 132px; padding: 2px;"><img style="max-width: 128px; max-height: 128px;" src="<?php echo $sd0; ?>" alt="Image" /></div>
						<div style="text-align: center; font-size: 0.8em;">
							<?php echo $sd; ?>
						</div>
						<div style="text-align: center;">
							<input style="font-size: 0.8em;" value="<?php echo $sd; ?>" />
						</div>
						<div style="text-align: center;">
							<a class="btnDelete" id="delete" href="#" onclick="deleteFile('<?php echo $sd; ?>', '<?php echo $sd; ?>');">
					DELETE
					<script type="text/javascript">
						function deleteFile(name, shortId) {
							var dataObj = {};
							dataObj["fileName"] = name;
							dataObj["shortId"] = shortId;
							var deleteImage = confirm("Are you sure that you want to delete selected picture?");
							if (deleteImage) {
								$.ajax({
									type: 'POST',
									url: '/app/gallery/delete.htm',
									data: dataObj,
									cache: false,
									async: false,
									timeout: 240000,
									success: function (data) {
									if ("ERROR" == data) {
									alert("error");
								} else {
									   $("#galleryImage_" + shortId).remove();
							}
						},
							error: function (data) {
							}
						});
						} else {

						}
						findImagesToGallery(null, null);
						}
						function findImagesToGallery(page, days) {
							$.ajax({
								url: '/app/emails/reloadEmailEditorGalleryContent.htm',
								type: 'POST',
								data: {
									days : days,
									page : page
								},
								success: function (data) {
									$('#gallery_content').html(data);
								},
								error: function () {
									alert("error, could not load images");
								}
							});
						}
					</script>
				</a></div>

					</div>



					<?php } ?>






						<div style="clear: both"></div>
		</div>
		<div>
			<div class="menuOnLeft">
				Images Found: 2
			</div>
			<div class="menuOnRight">



				&larr; Previous


				<span>:: 1/1 ::</span> next &rarr;


			</div>
			<input id="numberOfPages" style="display: none;" value="1">
			<div class="clearBoth"></div>
		</div>
	</div>
