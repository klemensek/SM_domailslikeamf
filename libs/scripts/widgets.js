var galleryMCE;
tinymce.PluginManager.add('gallery', function (editor, url) {
	// Add a button that opens a window
	editor.addButton('gallery', {
		text: 'Image',
		icon: false,
		onclick: function () {
			var selection = editor.selection,
				dom = editor.dom,
				selectedElm,
				anchorElm;

			// Focus the editor since selection is lost on WebKit in inline mode
			editor.nodeChanged();
			editor.focus();

			galleryMCE = true;
			// Open a modal screen using bootstrap
			$('#galleryModal').modal();

			// Note: As soon as modal opens TinyMce receives a blur event and disables the toolbar
		}
	});
});

function initTinyMCE() {
	// Custom Fields templates - these will display in dropdown menu
	// Eventually we'll load it by AJAX or whatever - Kuba
	customFields = [
		{
			text: "First Name",
			value: "$name.p1$"
        },
		{
			text: "Last Name",
			value: "$name.p2$"
        },
		{
			text: "Email",
			value: "$email$"
        },
		{
			text: "Preview",
			value: "<a data-mce-href=\"$preview$\" href=\"$preview$\">Preview</a>"
        },
		{
			text: "Opt-in (add tags)",
			value: "optin"
        }
    ];

	var dynamicBanners = [];

	lineSpaces = [
		{
			text: "1",
			value: "basic"
        },
		{
			text: "1.5",
			value: "oneAndHalf"
        },
		{
			text: "2",
			value: "two"
        },
		{
			text: "2.5",
			value: "twoAndHalf"
        }
    ];

	//theme_concrete_text_colors : "436EB2,3CB54B,3b2315,ffffff,000000",

	tinymce.init({
		selector: ".demo p, .demo body, .demo h3, .demo label.ui-dform-label",
		convert_fonts_to_spans: true,
		fontsize_formats: "6px 7px 8px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 36px 38px 40px",
		image_advtab: true,
		menubar: false,
		inline: true,
		skin: 'lightgray',
		forced_root_block: false,
		paste_as_text: true,
		formats: {
			basic: {
				inline: 'span',
				styles: {
					lineHeight: '100%'
				}
			},
			oneAndHalf: {
				inline: 'span',
				styles: {
					lineHeight: '150%'
				}
			},
			two: {
				inline: 'span',
				styles: {
					lineHeight: '200%'
				}
			},
			twoAndHalf: {
				inline: 'span',
				styles: {
					lineHeight: '250%'
				}
			}
		},
		font_formats: "Andale Mono=andale mono,times;" +
			"Arial=arial,helvetica,sans-serif;" +
			"Arial Black=arial black,avant garde;" +
			"Book Antiqua=book antiqua,palatino;" +
			"Calibri=calibri;" +
			"Comic Sans MS=comic sans ms,sans-serif;" +
			"Courier New=courier new,courier;" +
			"Georgia=georgia,palatino;" +
			"Helvetica=helvetica;" +
			"Impact=impact,chicago;" +
			"Open Sans=open sans;" +
			"Symbol=symbol;" +
			"Tahoma=tahoma,arial,helvetica,sans-serif;" +
			"Terminal=terminal,monaco;" +
			"Times New Roman=times new roman,times;" +
			"Trebuchet MS=trebuchet ms,geneva;" +
			"Verdana=verdana,geneva;" +
			"Webdings=webdings;" +
			"Wingdings=wingdings,zapf dingbats",
		//plugins: ["link", "code", "media", "image", "textcolor", "colorpicker", "gallery", "paste", "code"],
		toolbar: ["fontselect fontsizeselect bold italic underline strikethrough forecolor backcolor lineheight", "link unlink image gallery banners fields table code"],

		plugins: [
			"advlist autolink lists link media image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste colorpicker"
		],
		//toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",

		setup: function (editor) {

			var result = [];
			$.ajax({
				dataType: "json",
				url: '/app/emails/populateAddBanners.json',
				async: false,
				success: function (data) {
					for (var key in data) {
						var value = data[key];
						result.push({
							text: value,
							value: '<a class="img-url" href="$smb_' + key + '.clickUrl$"><img class="img-responsive" style="display: block;" src="$smb_' + key + '.imgUrl$" width="200" border="0"/></a>'
						});
						dynamicBanners = result;
					}
				}
			});

			editor.addButton('fields', {
				type: 'listbox',
				text: 'Custom fields',
				icon: false,
				onselect: function () {
					if (this.value() == "optin") {
						editor.windowManager.open({
							title: 'Opt-in, insert tags',
							body: [
								{
									name: 'text',
									type: 'combobox',
									size: 30,
									autofocus: true,
									label: 'Text:'
                                },
								{
									name: 'tags',
									type: 'combobox',
									size: 30,
									label: 'Tags:'
                                }
                            ],
							onSubmit: function (e) {
								if (e) {
									editor.insertContent('<a data-mce-href="$opt-in: ' + e.data.tags + '$" href="$opt-in: ' + e.data.tags + '$">' + e.data.text + '</a>');
								}
							}
						});
					} else {
						editor.insertContent(this.value() + ' ');
					}
				},
				values: customFields
			});

			editor.addButton('banners', {
				type: 'listbox',
				text: 'Banners',
				icon: false,
				onselect: function (e) {
					editor.insertContent(this.value());
				},
				values: dynamicBanners
			});

			editor.addButton('lineheight', {
				type: 'listbox',
				text: 'Spacing',
				tooltip: 'Line Spacing',
				icon: false,
				onselect: function (e) {
					editor.formatter.apply(this.value());
					return false;
				},
				values: lineSpaces
			});

			editor.on('focus', function () {
				$('#' + editor.id).parents('.column.ui-sortable').sortable('disable');
			});
			editor.on('blur', function () {
				$('#' + editor.id).parents('.column.ui-sortable').sortable('enable');
				//$('#'+editor.id).closest('.widget.ui-draggable').draggable('enable');
			});
		}
	});

	return false;
}

function widthToColumn(width, rowWidth) {
	return Math.round((width * 12) / rowWidth);
}

function addColumnControls(column) {
	$(column).each(function () {
		if ($(this).find('.edit-column').length == 0) {
			$(this).append('<span class="edit-column" data-toggle="modal" data-target="#columnSettings">Column</span>')
				.append('<span class="remove-column"><i class="fa fa-fw fa-times"></i></span>')
				.append('<span class="move-column left"><i class="fa fa-fw fa-arrow-left"></i></span>')
				.append('<span class="move-column right"><i class="fa fa-fw fa-arrow-right"></i></span>');
		}
	});
}

function makeSortable() {
	$(".demo, .demo .column").sortable({
		handle: ".drag",
		connectWith: ".column, .demo",
		placeholder: 'helper',
		opacity: .35,
		receive: function () {
			$(this).find('.dropped').each(function () {
				$(this).removeClass('dropped');
				if (($(this).hasClass('widget')) && ($(this).parent().hasClass('demo'))) {
					var row = $('#tab-layout .owl-item:first-child .lyrow').clone();
					$(this).clone().appendTo($(row).find('.column'));

					$(row).insertAfter($(this));

					$(this).remove();

					makeColumnResizable('.demo .column');
					addColumnControls('.demo .column');
				}

				if ($(this).hasClass('lyrow')) {
					addColumnControls($(this).find('.column'));
				}

			});
		}
	});
}

function makeColumnResizable(column) {
	var rowWidth = $(column).parent().width();

	var singleCol = rowWidth / 12;

	$(column).resizable({
		handles: 'e',
		minWidth: singleCol,
		start: function (event, ui) {
			$(this).nextAll('.column').hide();
			var nextSiblingsCount = $(column).nextAll('.column').length;
			var thisMax = rowWidth - (singleCol * nextSiblingsCount);
			$(this).css('max-width', thisMax);
		},
		resize: function (event, ui) {
			var colWidth = parseInt($(this).css('width'));

			var currentColClass = parseInt($(this).attr('class').match(/col-md-([0-9]+)/)[1]);
			var newColClass = widthToColumn(colWidth, rowWidth);

			var diffColClass = newColClass - currentColClass;
			currentColClass += diffColClass;

			var prevColSize = 0;
			$(this).prevAll('.column').each(function () {
				prevColSize += parseInt($(this).attr('class').match(/col-md-([0-9]+)/)[1]);
			});

			var nextSiblingsCount = $(this).nextAll('.column').length;
			colMaxSize = 12 - prevColSize - nextSiblingsCount;

			if (newColClass > colMaxSize)
				newColClass = colMaxSize;

			// increasing column size
			if (diffColClass > 0) {
				if ($(this).nextAll('.column').not('.col-md-1').length) {
					if (newColClass == colMaxSize) {
						$(this).nextAll('.column').not('.col-md-1').each(function () {
							$(this).alterClass('col-md-*', 'col-md-1');
						});
					} else {
						var nextResizableColumn = $(this).nextAll('[class^="col-md-"]').not('.col-md-1').first();
						var nextResizableColumnSize = parseInt($(nextResizableColumn).attr('class').match(/col-md-([0-9]+)/)[1]);
						var nextResizableColumnNewSize = Math.abs(nextResizableColumnSize - diffColClass);

						if (nextResizableColumnNewSize) {
							$(nextResizableColumn).alterClass('col-md-*', 'col-md-' + nextResizableColumnNewSize);
						} else {
							$(nextResizableColumn).alterClass('col-md-*', 'col-md-1');
						}
					}
				}
			} else if (diffColClass < 0) { // decreasing column size
				if ($(this).nextAll('.column').not('.col-md-' + colMaxSize).length) {
					var nextResizableColumn = $(this).nextAll('[class^="col-md-"]').not('.col-md-' + colMaxSize).first();
					var nextResizableColumnSize = parseInt($(nextResizableColumn).attr('class').match(/col-md-([0-9]+)/)[1]);

					if (Math.abs(nextResizableColumnSize - diffColClass)) {
						$(nextResizableColumn).alterClass('col-md-*', 'col-md-' + Math.abs(nextResizableColumnSize - diffColClass));
					} else {
						$(nextResizableColumn).alterClass('col-md-*', 'col-md-1');
					}
				}
			}

			$(this).alterClass('col-md-*', 'col-md-' + newColClass);

			//$(this).removeAttr('style');
			$(this).css('width', '');
			$(this).css('max-width', '');

			$(this).nextAll('.column').css('width', '').css('max-width', '').show();
		}
	});

	makeSortable();
}


function makeWidgetsDraggable() {

	$(".widgets-container .lyrow").draggable({
		addClasses: false,
		connectToSortable: ".demo",
		cancel: ".view",
		helper: "clone",
		handle: ".widget-name",
		revert: 'invalid',
		scroll: true,
		cursorAt: {
			top: 34,
			left: 57
		},
		start: function (e, t) {
			t.helper.addClass('helper');
			t.helper.css('display', 'block');
			t.helper.css('position', 'absolute');
			t.helper.css('width', '115px');
			t.helper.css('height', '68px');
			$(this).addClass('dropped');
			$(this).data("startingScrollTop", $(document).scrollTop());
		},
		drag: function (event, ui) {
			var st = parseInt($(this).data("startingScrollTop"));
			ui.position.top -= $(document).scrollTop() - st;
		},
		stop: function (e, t) {
			makeColumnResizable(".demo .column");
			$(this).removeClass('dropped');
			makeSortable();
			$(this).css('opacity', '1');
		}
	});

	$('.demo .lyrow').draggable({
		handle: ".drag",
		revert: 'invalid',
		stop: function (e, t) {
			makeColumnResizable(".demo .column");

			makeSortable();
			$(this).css('opacity', '1');
		}
	});


	$(".widget").draggable({
		addClasses: false,
		connectToSortable: ".demo",
		helper: "clone",
		handle: ".widget-name",
		cancel: ".view",
		revert: 'invalid',
		scroll: true,
		cursorAt: {
			top: 34,
			left: 57
		},
		start: function (event, ui) {
			ui.helper.addClass('helper');
			ui.helper.css('display', 'block');
			ui.helper.css('position', 'absolute');
			ui.helper.css('width', '115px');
			ui.helper.css('height', '68px');

			$(this).addClass('dropped');
			$(this).data("startingScrollTop", $(document).scrollTop());
		},
		drag: function (event, ui) {
			var st = parseInt($(this).data("startingScrollTop"));
			ui.position.top -= $(document).scrollTop() - st;
		},
		stop: function (event, ui) {
			$(this).removeClass('dropped');
			if ($(this).hasClass('mce')) {
				tinyMCE.remove();
				initTinyMCE();
			}
		}
	});

	makeSortable();
}

$(document).ready(function () {

	$('.editor-mode a').click(function () {

		if (!$(this).closest('li').hasClass('active')) {
			$(this).closest('li').addClass('active').siblings().removeClass('active');
			//clearDemo();
		}

		if ($(this).hasClass('email-editor')) {
			$('.demo').addClass('email');
			$('.widgets-container .widget.forlp').hide();
			$('.widgets-container .widget.foremail').show();
			$('#containerwidth').val('600px');
		} else {
			$('.demo').removeClass('email');
			$('.widgets-container .widget.forlp').show();
			$('.widgets-container .widget.foremail').hide();
			$('#containerwidth').val('1170px');
		}
		$('#bodyProp-save').click();
	});

	$('.widgets-container .widget.forlp').show();
	$('.widgets-container .widget.foremail').hide();

	$('.widgets-container .widget, .widgets-container .lyrow').each(function (i, obj) {
		// Add moving control and remove button to widgets
		if (!($(this).hasClass('dynamic'))) {
			$(this).prepend('<a href="#" class="remove"><i class="fa fa-trash-o"></i></a>');
			$(this).prepend('<span class="drag"><i class="icon-drag"></i></span>');
		}
	});

	// if($(this).children('.configuration').find(".configuration-options")){
	//   $(this).children('.configuration').prepend('<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i class="fa fa-cog"></i></a>');
	// }

	$('.widgets-container .lyrow').each(function (i, obj) {
		$(this).prepend('<a href="#" class="add-column"><i class="fa fa-plus"></i></a>');
		$(this).prepend('<a href="#" class="add-column add-row"><i class="fa fa-plus"></i></a>');
	});

	$('.widgets-container .ribbon-content .tab-pane').owlCarousel({
		items: 10,
		itemsDesktop: [1199, 10],
		itemsDesktopSmall: [979, 8],
		itemsTablet: [769, 4],
		itemsMobile: [479, 2],
		navigation: true,
		navigationText: ["<i class=\"fa fa-arrow-left\"></i>", "<i class=\"fa fa-arrow-right\"></i>"],
		pagination: false,
		mouseDrag: false,
		touchDrag: false
	});

	$('.demo').on('click', '.remove-column', function () {
		if ($(this).closest('.column').siblings().size() > 0) {
			$(this).closest('.lyrow').find('.add-column').show();

			var rowWidth = $(this).closest('.row').width();

			var columnsWidth = 0;
			$(this).parent().parent().children('.column').each(function () {
				columnsWidth += $(this).outerWidth();
			});

			var desiredColumnCount = $(this).closest('.column').siblings().length;

			var desiredColumnWidth = columnsWidth / desiredColumnCount;
			var desiredColumnClass = widthToColumn(desiredColumnWidth, rowWidth);

			$(this).parent().parent().children('.column').each(function () {
				$(this).alterClass('col-md-*', 'col-md-' + desiredColumnClass);
			});

			if ((12 % desiredColumnCount) / 2 == 1) {
				var rest = 12 - (desiredColumnCount * desiredColumnClass);
				$(this).closest('.column').siblings(':last').alterClass('col-md-*', 'col-md-' + (desiredColumnClass + rest));
			}

			$(this).closest('.column').remove();
		} else {
			$(this).closest('.lyrow').remove();
		}
		return false;
	});

	$('.demo').on('click', '.move-column.left', function () {
		var col = $(this).closest('.column');
		col.insertBefore(col.prev());
		$('.move-column').css('z-index', '2000');
		return false;
	});

	$('.demo').on('click', '.move-column.right', function () {
		var col = $(this).closest('.column');
		col.insertAfter(col.next());
		$('.move-column').css('z-index', '2000');
		return false;
	});

	makeWidgetsDraggable();

});
