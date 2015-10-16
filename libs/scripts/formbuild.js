formTemplates = [
  {
    "name": "Simple Contact Form",
    "code": "[{  \"type\": \"div\", \"class\": \"form-group\", \"html\": [{\"caption\":\"Name\",\"id\":\"sm-form-name\",\"name\":\"sm-form-name\",\"placeholder\":\"Please enter your name\",\"type\":\"text\",\"required\":\"true\"}]  }, {  \"type\": \"div\", \"class\": \"form-group\", \"html\": [{\"caption\":\"Email\",\"id\":\"sm-form-email\",\"name\":\"sm-form-email\",\"placeholder\":\"Please provide your email\",\"type\":\"email\",\"required\":\"true\"}]  }, {  \"type\": \"div\", \"class\": \"form-group\", \"html\": [{\"caption\":\"Phone\",\"id\":\"sm-form-phone\",\"name\":\"sm-form-phone\",\"placeholder\":\"Type your phone\",\"type\":\"tel\",\"required\":\"false\"}]  }, { \"type\": \"submit\", \"class\": \"btn btn-default\", \"value\": \"Submit\" }]"
  },
  {
    "name": "Empty",
    "code": "[{  \"type\": \"div\", \"class\": \"form-group\", \"html\": [{\"caption\":\"\",\"id\":\"sm-form-name\",\"name\":\"sm-form-name\",\"placeholder\":\"\",\"type\":\"text\"}]  }, { \"type\": \"submit\", \"class\": \"btn btn-default\", \"value\": \"Submit\" }]"
  }
]

$(document).ready(function() {
    fieldTypes = {
      "text"     : "Name",
      "email"    : "Email",
      "tel"      : "Phone"
//      "textarea" : "Text",
//      "number"   : "Number",
//      "url"      : "URL",
//      "checkbox" : "Checkbox"
    }
    
    $.dform.addType("textarea", function(options) {
      return $('<textarea rows="5">').dform('attr', options);
    });
    
    $.each(fieldTypes, function(value, caption) {   
      $('#field0 select')
          .append($('<option>', { value : value })
          .text(caption)); 
      
      $.dform.addType(value, function(options) {
        return $(this).addClass('form-control');
      });
    });
    
    $.dform.addType("checkbox", function(options) {
        return $(this).removeClass('form-control');
        return $(this).addClass('checkbox');
    });

    $.fn.serializeObject = function(id, type)
    {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name.substr(0,this.name.length-1)] = [o[this.name.substr(0,this.name.length-1)]];
                }
                o[this.name.substr(0,this.name.length-1)].push(this.value || '');
            } else {
                o[this.name.substr(0,this.name.length-1)] = this.value || '';
            }
            
            o['id'] = 'sm-form-'+type;
            o['name'] = 'sm-form-'+type;
        });
        return o;
    };

    // Add field to the table
    function addField(){
        var newid = 0;
        $.each($("#fields tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "field"+newid,
            "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#fields tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                var td = $("<td></td>", {
                    'text': $('#fields tr').length
                }).appendTo($(tr));
            }
        });
        
        // add the new row
        $(tr).appendTo($('#fields'));
        $('#fields tr:last input').first().focus();

        return false;
    }

    // Add field button
    $("#addField").on("click", function() {
      addField(); 
      if(($('#fields tr').length-1)==9){
        $(this).hide();  
      }
      return false;
    });

    
    // Remove field
    $('#fields').on('click', '.row-remove', function() {
      $(this).closest("tr").remove();
      $('#fields tr:last input').first().focus();
      $('#addField').show();
      return false;
    });

    // Mark field as Required
    $("#fields").on("click", ".req", function(){
      $(this).nextAll().remove();
      if($(this).hasClass('active')) {
        $(this).parent().append('<input type="hidden">');
      } 
      else {
        // 
        $(this).parent().append('<input type="hidden" name="'+$(this).attr('name')+'" value="true">');
      }
    });   
    

    var jsondata = {};
    
    function generateBuilder(input){
      var jsoninput = $.parseJSON(input);
      
      $('#fields #field0').nextAll().remove();
      
      $.each(jsoninput, function(j, field) {
        var i = j+1;

        // don't need to parse submit button, so we're considering only divs
        if(field.type=='div') {
          var $tr = $('<tr id="field'+i+'" data-id="'+i+'">').append(
              $('<td data-name="move"><span class="btn btn-default" type="button" title="Drag"><i class="fa fa-arrows"></i></span></td>'),
              $('<td data-name="caption"><input type="text" name="caption'+i+'" placeholder="Field Label" class="form-control" value="'+field.html[0].caption+'"/>'),
              $('<td data-name="placeholder"> <input type="text" name="placeholder'+i+'" placeholder="Field Placeholder" class="form-control" value="'+field.html[0].placeholder+'"/>'),
              $('<td data-name="type"> <select name="type'+i+'" class="form-control"></select>'),
              $('<td data-name="required"> <button class="btn btn-default req" name="required'+i+'" data-toggle="button">Required</button><input type="hidden" value="false" />'),
              $('<td data-name="del"><button name="del'+i+'" class="btn btn-danger row-remove"><i class="fa fa-trash-o"></i></button></td>')
          );
          
          $tr.appendTo('#fields');
        
          $.each(fieldTypes, function(value, caption) {   
            $('#field'+i+' select')
              .append($('<option>', { value : value })
              .text(caption)); 
          });
          
          $('#field'+i+' option[value="'+field.html[0].type+'"]').prop('selected', true);
            
          if(field.html[0].required) {
            $('#field'+i+' .req').addClass('active', true);
            $('#field'+i+' .req').next('input').prop('name', 'required'+i).val('true');
          }
        }
        if(field.type=='submit') {
          $('#formSubmitLabel').val(field.value);
          $('#formSubmitBorder').val(parseInt(field.css['border-radius']));
          $('#formSubmitStyle').find('option[value="'+field['class'].substr('4')+'"]').prop('selected', true);
          if(field['class'].substr('4')=='btn-custom'){
            $('.formSubmitColorDiv').show();
            $('#formSubmitColor').val(field.css['background-color']);
            $('#formSubmitTextColor').val(field.css['color']);
          }
          else {
            $('.formSubmitColorDiv').hide();
          }
        }
      });

      return false;
    }
    
    // Generate Form Builder from JSON input
    $('#generateBuilderBtn').click(function(){
      if($('#jsonresult').val().trim().length > 0){
        generateBuilder($('#jsonresult').val());
      }
      return false;
    });
    
    $('.formSubmitColorDiv').hide();

    $('#formSubmitStyle').change(function(){
      var selectedVal = $(this).val();
      
      if(selectedVal=='btn-custom'){
         $('.formSubmitColorDiv').show();
      }
      else {
         $('.formSubmitColorDiv').hide();
      }
    });

  
    function tableToJson(){
      $('#fields tbody').trigger('sortupdate');

        var data = $('#fields tr:not(#field0) :input:not([type=checkbox])').serializeArray();
        jsondata = '[';

        $('#fields').find('tr').each(function(){
            var id=$(this).data('id');
            if(id>0){
//              var type = $(this).find('select option:selected').val();
              var type = $(this).find('select option:selected').text().toLowerCase();
              jsondata += '{  "type": "div", "class": "form-group", "html": [';
              jsondata +=  JSON.stringify($('#fields tr#field'+id+' :input').serializeObject(id, type));
              jsondata += ']  }, ';
            }
        });

        var contactFormId = "default_formId";
        if($('#contactFormId').val()) {
            contactFormId = $('#contactFormId').val();
        }
        var language = $('#language').val();
        jsondata += '{ "type": "hidden", "id" : "formId", "name" : "formId", "value": "' + contactFormId + '" }, ';
        jsondata += '{ "type": "hidden", "value": "' + language + '", "name" : "lang" }, ';

        if($.trim($('#formSubmitLabel').val())){
          jsondata += '{ "type": "submit", "class": "btn '+$('#formSubmitStyle').val()+'", ';

          if($('#formSubmitStyle').val()=='btn-custom'){
            jsondata += '"css": { "background-color": "'+$('#formSubmitColor').val()+'", "border-radius": "'+$('#formSubmitBorder').val()+'px", "border-color": "'+$('#formSubmitColor').val()+'", "color": "'+$('#formSubmitTextColor').val()+'" },';
          }
          else {
            jsondata += '"css": { "border-radius": "'+$('#formSubmitBorder').val()+'px" },';
          }

          jsondata += '"value": "'+$.trim($('#formSubmitLabel').val())+'" }';
        }
        else {
          jsondata += '{ "type": "submit", "class": "btn btn-default", "value": "Submit" }';
        }

        jsondata += ']';

//        $('#jsonresult').val();

        return jsondata;
      }
    

    // Create JSON input string for dForm
    $('#btnGo').click(function(){
      $('#jsonresult').val(tableToJson());
      return false;
    });
    

    function generateForm(url, form){
      var form = JSON.parse(form);
    
      $('#myform').empty();
    
      $("#myform").dform(
        {
          "type": "form",
          "method": "post",
          "action": url,
          "html": form
      });

      return false;
    }

    // Load Templates to the form builder
    $.each(formTemplates, function(arrayID,template) {
     $('#loadsample ul').append("<li> <a href=\"#\" data-template='"+template.code+"'>"+template.name);
    });

    $('#loadsample ul li a').click(function(e){
      e.preventDefault();
      var templateData = $(this).attr('data-template');
      
      generateBuilder(templateData);
      generateForm('/', templateData);
      return false;
    });


    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $("#fields tbody").sortable({
        helper: fixHelperModified,
        scroll: false
    }).disableSelection();

    var widgetView; 

    // Add initial empty field to Form Builder
    $("#addField").trigger("click");

    $('#formBuildModal').on('show.bs.modal', function (e) {
      var $invoker = $(e.relatedTarget);   
      widgetView = $invoker.closest('.widget').find('.view');      
      
      generatedForm = $('#formBuildModal .modal-body #myform');

      formData = widgetView.find('form').attr('data-template');

      if(formData){
        generateBuilder(formData);
      }

    });

    $('.demo [type=submit]').attr('disabled', 'disabled');
    
    $('.demo form').submit(function(e){
      return false;
    });


    $('#formbuild-save').click(function(e){
        e.preventDefault();

        var templateData = tableToJson();

        var formAction = $('#formAction').val();
        generateForm(formAction, templateData);

        generatedForm = $('#formBuildModal .modal-body #myform');

        $(widgetView).empty();
        $(widgetView).append(generatedForm.clone());

        widgetView.find('form').attr('data-template', templateData);
        widgetView.find('form').attr('id', '000');

        initTinyMCE();

        $('#formBuildModal').modal('hide');
        return false;
    });
});