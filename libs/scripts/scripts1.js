function prependClass(sel, strClass) {
	var $el = jQuery(sel);

	/* prepend class */
	var classes = $el.attr('class');
	classes = strClass + ' ' + classes;
	$el.attr('class', classes);
}

$.fn.alterClass = function (removals, additions) {

	var self = this;

	if (removals.indexOf('*') === -1) {
		// Use native jQuery methods if there is no wildcard matching
		self.removeClass(removals);
		return !additions ? self : self.addClass(additions);
	}

	var patt = new RegExp('\\s' +
		removals.replace(/\*/g, '[A-Za-z0-9-_]+').split(' ').join('\\s|\\s') +
		'\\s', 'g');

	self.each(function (i, it) {
		var cn = ' ' + it.className + ' ';
		while (patt.test(cn)) {
			cn = cn.replace(patt, ' ');
		}
		it.className = $.trim(cn);
	});

	return !additions ? self : prependClass(self, additions);
};

function saveLayout(data) {
	$('.demo .column').resizable('destroy');
	tinymce.remove('.demo h3, .demo p');

	var pageSource = $.htmlClean($(".demo").html(), {
		format: false,
		allowedAttributes: [
            ['id'],
            ['src'],
            ['title'],
            ['style'],
            ['data-toggle'],
            ['data-template'],
            ['data-target'],
            ['data-selector'],
            ['data-attr'],
            ['data-label'],
            ['required'],
            ['placeholder']
        ]
	});

	var pageStyle = $('.page-container style').html();

	// saving in Local Storage
	localStorage.setItem('pageSource', pageSource);
	localStorage.setItem('pageStyle', pageStyle);

	$.ajax({
		url: '/app/emails/saveRawContentAndStyle.php',
		type: 'POST',
		async: false,
		data: {
			rawContent: pageSource,
			rawStyle: pageStyle,
			standardEmailId: data
		},
		success: function (data) {},
		error: function () {
			alert("error, could not save email content");
		}
	});

	makeColumnResizable('.demo .column');
	tinyMCE.remove();
	initTinyMCE();

	return false;
}

function saveLayoutLandingPage(data) {
	$('.demo .column').resizable('destroy');
	tinymce.remove('.demo h3, .demo p');

	var pageSource = $.htmlClean($(".demo").html(), {
		format: false,
		allowedAttributes: [
            ['id'],
            ['src'],
            ['title'],
            ['style'],
            ['data-toggle'],
            ['data-template'],
            ['data-target'],
            ['data-selector'],
            ['data-attr'],
            ['data-label'],
            ['required'],
            ['placeholder']
        ]
	});

	var pageStyle = $('.page-container style').html();

	// saving in Local Storage
	localStorage.setItem('pageSource', pageSource);
	localStorage.setItem('pageStyle', pageStyle);

	$.ajax({
		url: '/app/landingPages/saveRawContentAndStyle.php',
		type: 'POST',
		async: false,
		data: {
			rawContent: pageSource,
			rawStyle: pageStyle,
			microSiteId: data
		},
		success: function (data) {},
		error: function () {
			alert("error, could not save landing page content");
		}
	});

	makeColumnResizable('.demo .column');
	tinyMCE.remove();
	initTinyMCE();

	return false;
}

function loadLayoutLandingPage(pageSource, pageStyle) {
	$(document).ready(function () {
		$('.demo').html(pageSource);
		$('.page-container style').html(pageStyle);

		makeColumnResizable('.demo .column');
		initTinyMCE();
	});
}

//function loadLayout() {
//    // load from Local Storage
//    var pageSource = localStorage.getItem('pageSource');
//    var pageStyle = localStorage.getItem('pageStyle');
//
//    $(document).ready(function () {
//        $('.demo').html(pageSource);
//        $('.page-container style').html(pageStyle);
//
//        makeColumnResizable('.demo .column');
//        tinyMCE.remove();
//        initTinyMCE();
//    });
//}

function loadLayout(pageSource, pageStyle) {
	$(document).ready(function () {
		$('.demo').html(pageSource);
		$('.page-container style').html(pageStyle);
		$('#bodyProp-save').trigger('show.bs.modal');

		makeColumnResizable('.demo .column');
		tinyMCE.remove();
		initTinyMCE();
	});
}

function configurationElm(e, t) {
	$(".demo").on("click", ".configuration > a.configuration-btn", function (e) {
		e.preventDefault();
		var t = $(this).parent().parent().children('.view').children();
		$(this).toggleClass("active");
		t.toggleClass($(this).attr("rel"))
	});
	$(".demo").on("click", ".configuration .dropdown-menu a", function (e) {
		e.preventDefault();
		var t = $(this).parent().parent();
		var n = t.closest('.widget').children('.view').children();
		console.log(t.attr('class'));
		if (t.hasClass('dynamic_menu'))
			n = t.closest('.dynamic_row').children('.view').children();

		console.log(n.attr('class'));
		t.find("li").removeClass("active");
		$(this).parent().addClass("active");
		var r = "";
		t.find("a").each(function () {
			r += $(this).attr("rel") + " "
		});
		t.parent().removeClass("open");
		n.removeClass(r);
		n.addClass($(this).attr("rel"))
	});

	return false;
}

function removeElm() {
	$(".demo").on("click", ".remove", function (e) {
		e.preventDefault();
		$(this).parent().remove();
		if (!$(".demo .lyrow, .demo .widget").length > 0) {
			clearDemo();
		}
		if ($(this).parent().hasClass('widget')) {
			tinymce.remove('#' + $(this).parent().find('[id^=mce]').attr('id'));
		}
	})

	return false;
}

function clearDemo() {
	$(".demo").empty();
}

function cleanHtml(e) {
	$(e).parent().append($(e).children().html());
}

function downloadLayoutSrc(render) {
	$("#download-layout>.container").html($(".demo").html());
	var t = $("#download-layout>.container");
	t.find(".widget-name, .configuration, .drag, .remove, .add-column, .editsource, .gallery-modal-btn, .dynamic_info").remove();
	t.find(".lyrow, .widget").addClass("removeClean");

	t.find(".lyrow .lyrow .lyrow .lyrow .lyrow .removeClean").each(function () {
		cleanHtml(this)
	});
	t.find(".lyrow .lyrow .lyrow .lyrow .removeClean").each(function () {
		cleanHtml(this)
	});
	t.find(".lyrow .lyrow .lyrow .removeClean").each(function () {
		cleanHtml(this)
	});
	t.find(".lyrow .lyrow .removeClean").each(function () {
		cleanHtml(this)
	});
	t.find(".lyrow .removeClean").each(function () {
		cleanHtml(this)
	});
	t.find(".removeClean").each(function () {
		cleanHtml(this)
	});
	t.find(".removeClean").remove();

	$("#download-layout .column").removeClass("ui-sortable").removeClass('ui-resizable');
	$('#download-layout .ui-resizable-handle, #download-layout .edit-column, #download-layout .remove-column, #download-layout .move-column').remove();
	$("#download-layout .row").removeClass("clearfix").children().removeClass("column");
	$("#download-layout .mce-content-body").removeClass('mce-content-body');
	$("#download-layout a").removeClass('img-url');
	$("#download-layout form, #download-layout form *").alterClass('ui-dform-*', '');
	$('#download-layout [id^="mce_"]').css('position', '').removeAttr('id');
	$('#download-layout [class^="col-md-"]').css('display', '');
	if ($("#download-layout .container").length > 0) {
		$("#download-layout .row-fluid").removeClass("row-fluid").addClass("row");
	}


	var formatSrc = '';

	$("#downloadModal textarea").empty();

	if (render == "email") {
		$(function () {
			$("#download-layout>.container").addClass('demo');
			$("#download-layout").find('.row').each(function () {
				$(this).wrapInner('<table><tr class="tr"></tr></table>');
			});

			$("#download-layout").find('[class^="col-md-"]').each(function () {
				var colSize = parseInt($(this).attr('class').match(/col-md-([0-9]+)/)[1]);
				var desiredColWidth = ($('.demo').outerWidth() / 12) * colSize;
				if ($(this).is('[class^="col-md-"] [class^="col-md-"]')) {
					desiredColWidth = (parseInt($(this).parents('[class^="col-md-"]').attr('width')) / 12) * colSize;
				}
				if (($(this).css('box-shadow') != 'none')) {
					var shadow = $(this).css('box-shadow').match(/(-?\d+px)|(rgb\(.+\))/g);
					$(this).css('border', shadow[4] + ' solid ' + rgb2hex(shadow[0]));
					$(this).css('box-shadow', '');
					if (colSize != 12) {
						desiredColWidth -= parseInt(shadow[4]) * 2;
					}
					if ($(this).is('[class^="col-md-"] [class^="col-md-"]')) {
						desiredColWidth -= parseInt(shadow[4]) / 2;
					}
				}
				$(this).attr('width', desiredColWidth.toString());

				$(this).wrap('<td class="td" style="vertical-align: top;"><table align="' + $(this).css('text-align') + '" cellspacing="0" cellpadding="0" width="' + desiredColWidth.toString() + '" style="table-layout: fixed;background-color:' + $(this).css('background-color') + ';width:' + desiredColWidth.toString() + 'px;" border="0" align="left"><tr><td></td></tr></table></td>');
			});

			$("#download-layout").find('a.btn').each(function () {
				var align = "left";
				if ($(this).parent().hasClass('text-center'))
					align = "center";
				if ($(this).parent().hasClass('text-right'))
					align = "right";

				$(this).wrap('<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td><table align="' + align + '" border="0" cellspacing="0" cellpadding="0"><tr><td></td></tr></table></td></tr></table>');
			});

			$("#download-layout").find('img').each(function () {
				var divWidth = $(this).closest('div[class^="col-md-"]').attr('width');
				$(this).attr('width', divWidth);
				$(this).attr('style', 'border-radius:' + $(this).css('border-radius'));
			});
		});

		formatSrc = $.htmlClean($("#download-layout").html(), {
			format: false,
			allowedAttributes: [
                ["id"],
                ["class"],
                ["style"],
                ["src"],
                ["role"],
                ["type"],
                ["align"],
                ["width"],
                ["bgcolor"],
                ["cellpadding"],
                ["title"]
            ]
		});

		$("#download-layout").html(formatSrc);
		var styles = $('.page-container>style').html();

		var emailBodyHead = '<style>' + styles + '</style></head><body bgcolor="' + $('#bgcolor').val() + '" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">' +
			'<table cellspacing="0" cellpadding="0" width="100%" class="body-wrap" style="background: ' + $('#bgcolor').val() + ' url(' + $('#bgimg').val() + ')" bgcolor="' + $('#bgcolor').val() + '">' +
			'<tr>' +
			'<td></td>' +
			'<td class="container" align="">';

		$("#downloadModal textarea").val(emailHead + emailBodyHead + $("#download-layout").html() + emailBodyFoot + emailFoot);
	} else {

		formatSrc = $.htmlClean($("#download-layout").html(), {
			format: true,
			allowedAttributes: [
                ["id"],
                ["class"],
                ["style"],
                ["src"],
                ["data-toggle"],
                ["data-target"],
                ["data-parent"],
                ["role"],
                ["type"],
                ["title"],
                ["frameborder"],
                ["placeholder"],
                ["required"]

            ]
		});

		$("#download-layout").html(formatSrc);

		var styles = $('.page-container>style').html().replace('.demo', '').replace('width', 'max-width');
		$("#downloadModal textarea").val('<style>' + styles + '</style>\n\r' + formatSrc);
	}
}

$(window).resize(function () {
	$("body").css("min-height", $(window).height() - 90);
	$(".demo").css("min-height", $(window).height() - 160)
});

$('.demo').on('click', "[contenteditable]", function () {
	$(this).focus();

	return false;
});

$(document).ready(function () {

	$('#downloadModal').on('show.bs.modal', function () {
		if ($('.demo').hasClass('email')) {
			downloadLayoutSrc('email');
		} else {
			downloadLayoutSrc('lp');
		}
	});

	// Editor page
	$("#edit").click(function () {
		$("body").removeClass("sourcepreview");
		$("body").addClass("edit");
		$('.preview-btn').addClass('hide');
		$(this).addClass("active");

		return false;
	});

	// Preview page
	$("#sourcepreview").click(function () {
		$("body").removeClass("edit");
		$("body").addClass("sourcepreview");
		$('.preview-btn').removeClass('hide');
		$(this).addClass("active");
		return false;
	});

	// Preview page, viewport buttons
	$('.preview-btn .btn-primary').on('click', function () {
		$('.demo').removeClass('desktop tablet mobile');
		$('.demo').addClass($(this).find('input').attr('id'));
		return false;
	});

	// Clear the whole page
	$("#clear").click(function (e) {
		e.preventDefault();
		clearDemo();
		return false;
	});

	removeElm();


	$(".demo").on("click", ".add-column:not(.add-row)", function (e) {
		e.preventDefault();

		var desiredColumnCount = $(this).siblings('.view').children().children('.column').length + 1;
		var rowWidth = $(this).parent().width() - 28; //28px = padding both sides

		var columnsWidth = 0;
		$(this).siblings('.view').children().children('.column').each(function () {
			columnsWidth += $(this).outerWidth();
		});

		// jesli wszystkie maja w sumie rozpietosc 12 jednostek
		var desiredColumnWidth = columnsWidth / desiredColumnCount;

		var desiredColumnClass = widthToColumn(desiredColumnWidth, rowWidth);
		var rest = 12 - (desiredColumnCount * desiredColumnClass);

		if (widthToColumn(columnsWidth, rowWidth) < 12) {
			var newCol = 12 - widthToColumn(columnsWidth, rowWidth);
			$(this).parent().find('.row').eq(0).append('<div class="col-md-' + newCol + ' column">');
		} else {
			$(this).siblings('.view').children().children('.column').each(function () {
				$(this).alterClass('col-md-*', 'col-md-' + desiredColumnClass);
			});

			if ((12 % desiredColumnCount) / 2 == 1) {
				$(this).parent().find('.row').eq(0).append('<div class="col-md-' + (desiredColumnClass + rest) + ' column">');
			} else {
				$(this).parent().find('.row').eq(0).append('<div class="col-md-' + desiredColumnClass + ' column">');
			}
		}

		if (desiredColumnCount == 6) {
			$(this).hide();
		}

		makeColumnResizable('.demo .column');

		addColumnControls($(this).parent().find('.row').eq(0).find('.column:last'))


		// webkit hack for moving columns
		$('.move-column').css('z-index', '1000');
	});

	$(".demo").on("click", ".add-row", function (e) {
		e.preventDefault();

		$('#tab-layout .owl-item:first-child .lyrow').clone().insertAfter($(this).parent());

		makeColumnResizable($(this).parent().parent().find('.column'));
		addColumnControls($(this).parent().parent().find('.column'));

		$('.move-column').css('z-index', '1000');

	});

	configurationElm();

	initTinyMCE();

	$('[data-toggle="tooltip"]').tooltip({
		placement: 'bottom'
	});

	// setInterval(function() {
	//     saveLayout();
	// }, 2e3);
})
