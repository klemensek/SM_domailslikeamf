function rgb2hex(rgba) {
    rgb = rgba.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
    if ((rgba != 'rgba(0, 0, 0, 0)') && (rgba != 'rgba(0,0,0,0)')) {
        return (rgb && rgb.length === 4) ? "#" +
        ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) +
        ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) +
        ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2) : '';
    }
    else {
        return 'transparent';
    }
}

$(document).ready(function () {
    var widgetView;
    var widgetBackColor;

    $('#configurationModal').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        var inputs = $invoker.closest('.widget').find('.configuration-options').get(0);
        var attrs = $invoker.closest('.widget').find('.configuration .btn-group');
        widgetView = $invoker.closest('.widget').find('.view');

        modalForm = $('#configurationModal .modal-body .form-horizontal');
        modalForm.empty();

        $(inputs).find('input').each(function (i, obj) {
            selector = $(this).data('selector');
            attr = $(this).data('attr');
            label = $(this).data('label');
            type = $(this).attr('type');
            placeholder = typeof $(this).attr('placeholder') != "undefined" ? $(this).attr('placeholder') : '';

            modalForm.append('<div class="form-group"><label for="input' + type + i + '" class="col-sm-4 control-label">' + label + '</label><div class="col-sm-8"><input type="' + type + '" class="form-control" name="input' + type + i + '" id="input' + type + i + '" data-selector="' + selector + '" data-attr="' + attr + '" placeholder="' + placeholder + '"></div></div>');

            $('#input' + type + i).val(widgetView.find(selector).attr(attr));
        });
    });

    $("#configuration-save").click(function (e) {
        e.preventDefault();

        modalForm = $('#configurationModal .modal-body .form-horizontal');

        $(modalForm).find('input').each(function (i, obj) {
            selector = $(this).data('selector');
            attribute = $(this).data('attr');
            value = $(this).val();

            $(widgetView).find(selector).removeAttr(attribute).attr(attribute, value);

            if ((selector == 'a.img-url') && (attribute == 'href')) {
                if ((value == '#') || (value == '')) {
                    $(widgetView).find(selector).removeAttr(attribute)
                }
            }
        });

        FB.XFBML.parse();

        gapi.plusone.go();

        $('#configurationModal').modal('hide');
        return false;
    });

    $('#editSourceModal').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        widgetView = $invoker.closest('.widget').find('.view');

        modalTextarea = $('#editSourceModal .modal-body textarea');

        modalTextarea.html(widgetView.html());
    });

    $('#editsource-save').click(function (e) {
        e.preventDefault();

        modalTextarea = $('#editSourceModal .modal-body textarea');

        $(widgetView).empty();
        $(widgetView).append(modalTextarea.val());

        $('#editSourceModal').modal('hide');
        return false;
    });

    $('.colorinput').ColorPicker({
        color: '#ffffff',
        livePreview: true,
        onSubmit: function (hsb, hex, rgb, el) {
            $(el).val('#' + hex);
            $(el).prev('.input-group-addon').css('background', '#' + hex);
            $(el).ColorPickerHide();
        },
        onBeforeShow: function () {
            $(this).ColorPickerSetColor(this.value);
        }
    })
        .bind('keyup', function () {
            $(this).ColorPickerSetColor(this.value);
        });

    $('#columnSettings').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        widgetView = $invoker.closest('.column');

        $('#columnColor').val(rgb2hex(widgetView.css('background-color')))
            .prev('.input-group-addon').css('background', widgetView.css('background-color'));

        if (widgetView.css('box-shadow') !== 'none') {
            var shadow = widgetView.css('box-shadow').match(/(-?\d+px)|(rgb\(.+\))/g);

            $('#columnBorderColor').val(rgb2hex(shadow[0]))
                .prev('.input-group-addon').css('background', shadow[0]);

            $('#columnBorderSize').val(parseInt(shadow[4]));
        }
        else {
            $('#columnBorderColor').val('#FFFFFF')
                .prev('.input-group-addon').css('background', '#FFFFFF');
            $('#columnBorderSize').val('0');
        }
    });

    $('#columnSettingsSave').click(function (e) {
        $(widgetView).css('background-color', $('#columnColor').val());

        if ($('#columnBorderSize').val() > 0) {
            $(widgetView).css('box-shadow', 'inset 0 0 0 ' + $('#columnBorderSize').val() + 'px ' + $('#columnBorderColor').val());
        }
        else {
            $(widgetView).css('box-shadow', '');
        }
        $('#columnSettings').modal('hide');
        return false;
    });

    $('#dividerSettings').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        widgetView = $invoker.closest('.widget').find('.view hr');

        $('#dividerColor').val(rgb2hex(widgetView.css('border-color')))
            .prev('.input-group-addon').css('background', widgetView.css('border-color'));

        $('#dividerStroke').find('option[value="' + widgetView.css('border-style') + '"]').prop('selected', true);

        $('#dividerSize').val(parseInt(widgetView.css('border-width')));
    });

    $('#dividerSettingsSave').click(function (e) {

        $(widgetView).css('border-color', $('#dividerColor').val());
        $(widgetView).css('border-style', $('#dividerStroke').val());

        $(widgetView).css('border-width', $('#dividerSize').val() + 'px');
        $('#dividerSettings').modal('hide');
        return false;
    });


    $('#buttonSettings').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        widgetView = $invoker.closest('.widget').find('.view a.btn');

        if (!widgetView.hasClass('btn-custom')) {
            $('#buttonColor, #buttonBorderColor, #buttonTextColor').closest('.form-group').hide();
        }

        $('#buttonLabel').val(widgetView.html());
        $('#buttonUrl').val(widgetView.attr('href'));
        $('#buttonColor').val(rgb2hex(widgetView.css('background-color')))
            .prev('.input-group-addon').css('background', widgetView.css('background-color'));

        $('#buttonBorderColor').val(rgb2hex(widgetView.css('border-color')))
            .prev('.input-group-addon').css('background', widgetView.css('border-color'));

        $('#buttonTextColor').val(rgb2hex(widgetView.css('color')))
            .prev('.input-group-addon').css('background', widgetView.css('color'));

        $('#buttonBorder').val(parseInt(widgetView.css('border-radius')));

        $('#buttonMargin').val(parseInt(widgetView.css('margin-top')));
    });

    $('#buttonStyle').change(function () {
        var selectedVal = $(this).val();

        if (selectedVal == 'btn-custom') {
            $('#buttonColor, #buttonBorderColor, #buttonTextColor').closest('.form-group').show();
        }
        else {
            $('#buttonColor, #buttonBorderColor, #buttonTextColor').closest('.form-group').hide();
        }
    });

    // Prevent bootstrap dialog from blocking focusin
    $(document).on('focusin', function (e) {
        if ($(e.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
        }
    });

    $('#buttonSettingsSave').click(function (e) {
        $(widgetView).html($('#buttonLabel').val());

        $(widgetView).attr('href', $('#buttonUrl').val());

        widgetView.removeClass().addClass('btn');

        if ($('#buttonStyle').val() == 'btn-custom') {
            $(widgetView).css('background-color', $('#buttonColor').val());
            $(widgetView).css('border-color', $('#buttonBorderColor').val());
            $(widgetView).css('color', $('#buttonTextColor').val());
        }
        else {
            $(widgetView).css('background-color', '');
            $(widgetView).css('border-color', '');
            $(widgetView).css('color', '');
        }

        $(widgetView).addClass($('#buttonStyle').val());


        $(widgetView).addClass($('#buttonSize').val());

        $(widgetView).css('border-radius', $('#buttonBorder').val() + 'px');

        $(widgetView).css('margin-top', $('#buttonMargin').val() + 'px');

        $('#buttonSettings').modal('hide');
        return false;
    });

    $('.demo').on('click', 'a', function (e) {
        e.preventDefault();
    });

    $('.demo').on('click', '.gallery-modal-btn', function (e) {
        galleryMCE = false;
    });

    $('.edit .demo').on('click', 'img', function (e) {
        $(this).closest('.widget').find('.gallery-modal-btn').click();
    });

    $('#galleryModal').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        widgetView = $invoker.closest('.widget').find('.view');


        var currentSrc = widgetView.find('img').attr('src');
        $('.galleryImage input[type="radio"][value="' + currentSrc + '"]').prop('checked', true);

    });

    $('#galleryModalPick').click(function (e) {
        if ($('.galleryImage input[type="radio"]').is(':checked')) {
            if (galleryMCE) {
                tinyMCE.activeEditor.insertContent('<img src="' + $('.galleryImage input[type="radio"]:checked').val() + '" class="img-responsive"/>');
            }
            else {
                widgetView.find('img').attr('src', $('.galleryImage input[type="radio"]:checked').val());
            }

            $('#galleryModal').modal('hide');
        }
    });

    $('#bodyPropModal').on('show.bs.modal', function (e) {
        if ($('body').css('background-image') != 'none') {
            $('#bodyPropModal #bgimg').val($('body').css('background-image').replace('url(', '').replace(')', ''));
        }

        $('#bodyPropModal #bgcolor').val(rgb2hex($('body').css('background-color')))
            .prev('.input-group-addon').css('background', $('body').css('background-color'));
        ;

        $('#bodyPropModal #containerwidth').val($('.demo').css('width'));

        $('#bodyPropModal #containercolor').val(rgb2hex($('.demo').css('background-color')))
            .prev('.input-group-addon').css('background', $('.demo').css('background-color'));
        ;

        if ($('.demo').css('border-style') != 'dashed') { // container has solid border

            $('#bodyPropModal #containerBorderSize').val(parseInt($('.demo').css('border-width')));

            $('#bodyPropModal #containerBorderColor').val(rgb2hex($('.demo').css('border-color')))
                .prev('.input-group-addon').css('background', $('.demo').css('border-color'));
        }

    });

    $('#bodyProp-save').click(function (e) {
        e.preventDefault();

        var style = "";

        if ($('#bodyPropModal #bgcolor').val() || $('#bodyPropModal #bgimg').val()) {
            style += 'body { ';
            style += 'background: ';
            if ($('#bodyPropModal #bgcolor').val()) {
                style += $('#bodyPropModal #bgcolor').val();
            }
            if ($('#bodyPropModal #bgimg').val()) {
                style += ' url(' + $('#bodyPropModal #bgimg').val() + ')';
            }
            style += ';';
            style += ' }';
        }


        if ($('#bodyPropModal #containercolor').val() || $('#bodyPropModal #containerwidth').val()) {
            style += '.demo.container { ';
            if ($('#bodyPropModal #containercolor').val()) {
                style += 'background: ';
                if ($('#bodyPropModal #containercolor').val()) {
                    style += $('#bodyPropModal #containercolor').val();
                }
                style += ';';
            }
            if ($('#bodyPropModal #containerwidth').val()) {
                style += 'width: ';
                if ($('#bodyPropModal #containerwidth').val()) {
                    style += $('#bodyPropModal #containerwidth').val();
                }
                style += ';';
            }
            if ($('#bodyPropModal #marginTop').val()) {
                style += 'margin-top: ';
                style += $('#bodyPropModal #marginTop').val() + 'px';
                style += ';';
            }
            if ($('#bodyPropModal #marginBottom').val()) {
                style += 'margin-bottom: ';
                style += $('#bodyPropModal #marginBottom').val() + 'px';
                style += ';';
            }
            if ($('#bodyPropModal #marginLeft').val()) {
                style += 'margin-left: ';
                style += $('#bodyPropModal #marginLeft').val() + 'px';
                style += ';';
            }
            if ($('#bodyPropModal #marginRight').val()) {
                style += 'margin-right: ';
                style += $('#bodyPropModal #marginRight').val() + 'px';
                style += ';';
            }
            if ($('#bodyPropModal #containerBorderSize').val() > 0) {
                style += 'border: ';
                style += $('#bodyPropModal #containerBorderSize').val() + 'px ';
                style += 'solid ';
                if ($('#bodyPropModal #containerBorderColor').val()) {
                    style += $('#bodyPropModal #containerBorderColor').val();
                }
                style += ';';
            }
            style += '';

            style += ' }';
        }

        $('.page-container style').html(style);

        $('#bodyPropModal').modal('hide');
        return false;
    });

    $('#dynamicConfigurationModal').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        widgetView = $invoker.closest('.product');
        widgetBackColor = widgetView.closest('.column').css('background-color');
        widgetView.closest('.column').css('background-color', '#99CC66');
    });

    $('#dynamicConfiguration-save').on('click', function (e) {
        e.preventDefault();

        var holderType = $("#clickViewType input[type='radio']:checked").val();
        var prodNum = $("#numberOfProduct").val();
        var usePromoPrice = $("#clickViewType input[type='checkbox']").is(":checked");

        widgetView.find('.placeholder').each(function (i, v) {
            if ($(this).hasClass("placeholder_url"))
                $(this).attr("href", "{" + holderType + "." + prodNum + ".url}");
            if ($(this).hasClass("placeholder_imageUrl"))
                $(this).attr("src", "{" + holderType + "." + prodNum + ".imageUrl}");
            if ($(this).hasClass("placeholder_brand"))
                $(this).text("{" + holderType + "." + prodNum + ".brand}");
            if ($(this).hasClass("placeholder_name"))
                $(this).text("{" + holderType + "." + prodNum + ".name}");
            if ($(this).hasClass("placeholder_desc"))
                $(this).text("{" + holderType + "." + prodNum + ".desc}");
            /*if ($(this).hasClass("placeholder_price")) {
             $(this).text("{" + holderType + "." + prodNum + ".price}");
             }*/
            if (usePromoPrice) {
                if ($(this).hasClass("placeholder_price")) {
                    $(this).text("{" + holderType + "." + prodNum + ".price}");
                    $(this).remove();
                }
                if ($(this).hasClass("placeholder_promoPrice")) {
                    $(this).show();
                    $(this).find(".promoPrice").text("{" + holderType + "." + prodNum + ".promoPrice}");
                    $(this).find(".normalPrice").text("{" + holderType + "." + prodNum + ".price}");
                }
            } else {
                if ($(this).hasClass("placeholder_price")) {
                    $(this).text("{" + holderType + "." + prodNum + ".price}");
                }
                if ($(this).hasClass("placeholder_promoPrice")) {
                    $(this).remove();
                }
            }
        });
        widgetView.find('.product_info').text("Product number: " + prodNum + " product type: " + holderType);

        widgetView.closest('.column').css('background-color', widgetBackColor);
        $('#dynamicConfigurationModal').modal('hide');
        return false;
    });
    $('.dynamicConfiguration-cancel').on('click', function (e) {
        widgetView.closest('.column').css('background-color', widgetBackColor);
    });
});
