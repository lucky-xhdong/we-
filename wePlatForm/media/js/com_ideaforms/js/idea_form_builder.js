$.fn.buildForm = function(settings) {
  $.validator.addMethod('integer', function(value, element, param) {
    return value == parseInt(value, 10);
  }, '请输入一个整数');


  var submitted = settings.submitted;
  if (settings.submitted) {
    // this.append("您已经提交过此表单");
    // return;
  }

  var disabled = (settings.isAdmin || settings.submitted || settings.preview) ? " disabled "
      : "";

  var items = settings.items;
  //console.log(items);
  var _this = this;
  this.settings = settings;

  var $rules = [];
  var template = [];
  template["text"] = {
    generateHtml : function(settings) {
     // console.log($form);
      var html = "<div class=\"fb-field-wrapper fb-field-viewer response-field-"
          + settings.field_type + "\"><div class=\"subtemplate-wrapper\">"
      html += "<label><span>";
      html += settings.label;
      if (settings.required) {
        html += "<abbr title=\"required\">*</abbr>";
      }
      html += "</span></label>";

      html += "<input type=\"text\" class=\"rf-size-";
      html += settings.field_options.size;
      html += "\"";
      html += " data-input-index=\"" + settings.index + "\" ";
      if (settings.required)
        html += " required ";
      if (settings.field_options.minlength) {
        html += " minlength=\"" + settings.field_options.minlength + "\" ";
      }
      if (settings.field_options.maxlength) {
        html += " maxlength=\"" + settings.field_options.maxlength + "\" ";
      }
     // console.log(settings);
      var name = settings.name ? settings.name : settings.label;
      html += " name=\"" + name + "\" ";
      html += " value=\"" + (settings.value || "") + "\" "
      html += disabled;
      html += "/>";
      html += "<span class=\"help-block\">";
      html += settings.field_options.description || "";
      html += "</span>" + "</div>" + "</div>";
     // console.log(html);
      return html;
    },
    generateValue : function(settings) {
      var index = settings.index;
      var $input = $form.find("input[data-input-index='" + index + "']");
      settings.value = $input.val();
      //console.log(settings);
      return settings;
    }
  }

  template["checkboxes"] = {
    generateHtml : function(settings) {
      var html = "<div class=\"fb-field-wrapper fb-field-viewer response-field-"
          + settings.field_type + "\"><div class=\"subtemplate-wrapper\">"
      html += "<label><span>";
      html += settings.label;
      if (settings.required) {
        html += "<abbr title=\"required\">*</abbr>";
      }
      html += "</span></label>";

      // TODO how to set the required options?
      var name = settings.name ? settings.name : settings.label;
      $.each(settings.field_options.options, function(index, item) {
        if (item.other)
          return;
        //console.log(item);
        html += "<div>";
        html += "<label class=\"fb-option\">";
        html += "<input type=\"checkbox\" name=\"" + name + "\" value=\"";

        // TODO set checked options
        html += index + "\"";
        html += disabled;
        html += settings.required ? " required" : "";
        html += item.checked ? " checked " : "";
        html += " data-input-index=\"" + settings.index + "\" ";
        html += ">";
        html += item.label;
        html += "</label>";
        html += "</div>";
      });

      if (settings.field_options.include_other_option) {
        var lastOpt = settings.field_options.options[settings.field_options.options.length - 1];
        //console.log(lastOpt);
        html += "<div class=\"other-option\">";
        html += "<label class=\"fb-option\">";
        html += "<input type=\"checkbox\"  name=\""
            + name
            + "\"  data-input-index=\""
            + settings.index
            + "\"  value=\"other\" "
            + disabled
            + ((lastOpt && lastOpt.other && lastOpt.checked) ? " checked " : "")
            + ">";
        html += "其他";
        html += "</label>";
        html += "<input name=\"" + name + "\"";
        html += " data-input-index=\"" + settings.index + "\" ";
        html += " value=\"" + ((lastOpt && lastOpt.other) ? lastOpt.label : "")
            + "\"";
        html += " type=\"text\"" + disabled + ">";
        html += " </div>";
      }
      html += "<label for=\"" + name + "\" class=\"error\"></label>";

      html += "<span class=\"help-block\">";
      html += settings.field_options.description || "";
      html += "</span>";
      html += "</div>" + "</div>";
     // console.log(html);
      return html;
    },
    generateValue : function(settings) {
      var index = settings.index;
      var $input = $form.find("input[data-input-index='" + index + "']");
      var optionCounts = settings.field_options.options.length;
      if (settings.field_options.options[settings.field_options.options.length - 1].other) {
        optionCounts--;
      }
      $.each($input, function(index, checkbox) {
        if (index == optionCounts + 1) {
          // 最后一个，作为label加到前面去,input/text
          settings.field_options.options[index - 1].label = $(checkbox).val();
        } else if (index == optionCounts) {
          settings.field_options.options[index] = {
            checked : checkbox.checked,
            label : "",
            other : $(checkbox).val() == "other"
          };
        } else {
          settings.field_options.options[index].checked = checkbox.checked;
        }
      });
      // settings.value = $input.val();
      return settings;
    }
  }

  template["date"] = {
    generateHtml : function(settings) {

      var html = "<div class=\"fb-field-wrapper fb-field-viewer response-field-"
          + settings.field_type + "\"><div class=\"subtemplate-wrapper\">"
      html += "<label><span>";
      html += settings.label;
      if (settings.required) {
        html += "<abbr title=\"required\">*</abbr>";
      }
      html += "</span></label>";

      html += "<input type=\"text\" placeholder=\"yyyy-mm-dd\" class=\"rf-size-";
      html += settings.field_options.size;
      html += "\"";
      html += " data-input-index=\"" + settings.index + "\" ";
      if (settings.required)
        html += " required ";
      if (settings.field_options.minlength) {
        html += " minlength=\"" + settings.field_options.minlength + "\" ";
      }
      if (settings.field_options.maxlength) {
        html += " maxlength=\"" + settings.field_options.maxlength + "\" ";
      }
      var name = settings.name ? settings.name : settings.label;
      html += " name=\"" + name + "\" ";
      html += " value=\"" + (settings.value || "") + "\" "
      html += disabled;
      html += ">";

      html += "<span class=\"help-block\">";
      html += settings.field_options.description || "";
      html += "</span>" + "</div>" + "</div>";
      var $html = $(html);
      $html.find("input").datepicker({
        dateFormat : "yy-mm-dd"
      }, $.datepicker.regional['zh-CN']);
      // console.log(html);
      return $html;
    },
    generateValue : function(settings) {
      var index = settings.index;
      var $input = $form.find("input[data-input-index='" + index + "']");
      settings.value = $input.val();
      return settings;
    }
  }

  template["paragraph"] = {
    generateHtml : function(settings) {

      var html = "<div class=\"fb-field-wrapper fb-field-viewer response-field-"
          + settings.field_type + "\"><div class=\"subtemplate-wrapper\">"
      html += "<label><span>";
      html += settings.label;
      if (settings.required) {
        html += "<abbr title=\"required\">*</abbr>";
      }
      html += "</span></label>";

      html += "<textarea type=\"text\" class=\"rf-size-";
      html += settings.field_options.size;
      html += "\"";
      html += " data-input-index=\"" + settings.index + "\" ";
      if (settings.required)
        html += " required ";
      if (settings.field_options.minlength) {
        html += " minlength=\"" + settings.field_options.minlength + "\" ";
      }
      if (settings.field_options.maxlength) {
        html += " maxlength=\"" + settings.field_options.maxlength + "\" ";
      }
      var name = settings.name ? settings.name : settings.label;
      html += " name=\"" + name + "\" ";
      html += disabled;
      html += ">" + (settings.value || "") + "</textarea>";

      html += "<span class=\"help-block\">";
      html += settings.field_options.description || "";
      html += "</span>" + "</div>" + "</div>";
     // console.log(html);
      return html;
    },
    generateValue : function(settings) {
      var index = settings.index;
      var $input = $form.find("textarea[data-input-index='" + index + "']");
      settings.value = $input.val();
      return settings;
    }
  }

  template["radio"] = {
    generateHtml : function(settings) {
      var html = "<div class=\"fb-field-wrapper fb-field-viewer response-field-"
          + settings.field_type + "\"><div class=\"subtemplate-wrapper\">"
      html += "<label><span>";
      html += settings.label;
      if (settings.required) {
        html += "<abbr title=\"required\">*</abbr>";
      }
      html += "</span></label>";

      // TODO how to set the required options?
      var name = settings.name ? settings.name : settings.label;
      $.each(settings.field_options.options, function(index, item) {
        if (item.other)
          return;
       // console.log(item);
        html += "<div>";
        html += "<label class=\"fb-option\">";
        html += "<input type=\"radio\" name=\"" + name + "\" value=\"";

        // TODO set checked options
        html += index + "\"";
        html += disabled;
        html += settings.required ? " required" : "";
        html += item.checked ? " checked " : "";
        html += " data-input-index=\"" + settings.index + "\" ";
        html += ">";
        html += item.label;
        html += "</label>";
        html += "</div>";
      });

      if (settings.field_options.include_other_option) {
        var lastOpt = settings.field_options.options[settings.field_options.options.length - 1];
       // console.log(lastOpt);
        html += "<div class=\"other-option\">";
        html += "<label class=\"fb-option\">";
        html += "<input type=\"radio\"  name=\""
            + name
            + "\"  data-input-index=\""
            + settings.index
            + "\"  value=\"other\" "
            + disabled
            + ((lastOpt && lastOpt.other && lastOpt.checked) ? " checked " : "")
            + ">";
        html += "其他";
        html += "</label>";
        html += "<input name=\"" + name + "\"";
        html += " data-input-index=\"" + settings.index + "\" ";
        html += " value=\"" + ((lastOpt && lastOpt.other) ? lastOpt.label : "")
            + "\"";
        html += " type=\"text\"" + disabled + ">";
        html += " </div>";
      }
      html += "<label for=\"" + name + "\" class=\"error\"></label>";

      html += "<span class=\"help-block\">";
      html += settings.field_options.description || "";
      html += "</span>";
      html += "</div>" + "</div>";
     // console.log(html);
      return html;
    },
    generateValue : function(settings) {
      var index = settings.index;
      var $input = $form.find("input[data-input-index='" + index + "']");
      var optionCounts = settings.field_options.options.length;
      if (settings.field_options.options[settings.field_options.options.length - 1].other) {
        optionCounts--;
      }
      $.each($input, function(index, radio) {
        if (index == optionCounts + 1) {
          // 最后一个，作为label加到前面去,input/text
          settings.field_options.options[index - 1].label = $(radio).val();
        } else if (index == optionCounts) {
          settings.field_options.options[index] = {
            checked : radio.checked,
            label : "",
            other : $(radio).val() == "other"
          };
        } else {
          settings.field_options.options[index].checked = radio.checked;
        }
      });
      // settings.value = $input.val();
      return settings;
    }
  }
  template["dropdown"] = {
    generateHtml : function(settings) {
      var html = "<div class=\"fb-field-wrapper fb-field-viewer response-field-"
          + settings.field_type + "\"><div class=\"subtemplate-wrapper\">"
      html += "<label><span>";
      html += settings.label;
      if (settings.required) {
        html += "<abbr title=\"required\">*</abbr>";
      }
      html += "</span></label>";

      // TODO how to set the required options?
      var name = settings.name ? settings.name : settings.label;
      html += "<div class=\"select-con\"><select data-input-index=\"" + settings.index + "\"";
      //console.log(settings.preview)
      if (!_this.settings.preview) {
        html += disabled;
      }
      html += ">";

      if (settings.field_options.include_blank_option) {
        html += "<option></option>";
      }

      $.each(settings.field_options.options, function(index, item) {
        html += "<option value=\"" + item.label + "\"";
        html += item.label == settings.value ||  item.checked ? " selected " : "";
        html += ">" + item.label + "</option>";
      });
      html += "</select></div>";

      html += "<span class=\"help-block\">";
      html += settings.field_options.description || "";
      html += "</span>";
      html += "</div>" + "</div>";
     // console.log(html);
      return html;
    },
    generateValue : function(settings) {
      var index = settings.index;
      var $input = $form.find("select[data-input-index='" + index + "']");
      settings.value = $input.val();
      return settings;
    }
  }

  template["number"] = {
    generateHtml : function(settings) {

      var html = "<div class=\"fb-field-wrapper fb-field-viewer response-field-"
          + settings.field_type + "\"><div class=\"subtemplate-wrapper\">"
      html += "<label><span>";
      html += settings.label;
      if (settings.required) {
        html += "<abbr title=\"required\">*</abbr>";
      }
      html += "</span></label>";

      html += "<input class=\"rf-size-";
      html += settings.field_options.size;
      html += "\"";
      html += " data-input-index=\"" + settings.index + "\" ";
      if (settings.required)
        html += " required ";
      if (settings.field_options.min) {
        html += " min=\"" + settings.field_options.min + "\" ";
      }
      if (settings.field_options.maxlength) {
        html += " max=\"" + settings.field_options.max + "\" ";
      }
      var name = settings.name ? settings.name : settings.label;
      html += " name=\"" + name + "\" ";
      html += " value=\"" + (settings.value || "") + "\" ";
      html += disabled;
      html += " type=\"number\" "
      html += ">";
      html += settings.field_options.units || "";

      html += "<span class=\"help-block\">";
      html += settings.field_options.description || "";
      html += "</span>" + "</div>" + "</div>";
     // console.log(html);
      $rules[name] = {};
      if (settings.field_options.min && settings.field_options.max) {
        $rules[name] = {
          range : [ settings.field_options.min, settings.field_options.max ]
        };
      } else if (settings.field_options.min) {
        $rules[name] = {
          min : settings.field_options.min
        };
      } else if (settings.field_options.max) {
        $rules[name] = {
          max : settings.field_options.max
        };
      }

      if (settings.field_options.integer_only) {
        $.extend($rules[name], {
          integer : true
        });
       // console.log($rules[name]);
      }

      return html;
    },
    generateValue : function(settings) {
      var index = settings.index;
      var $input = $form.find("input[data-input-index='" + index + "']");
      settings.value = $input.val();
      return settings;
    }
  }

  template["email"] = {
    generateHtml : function(settings) {

      var html = "<div class=\"fb-field-wrapper fb-field-viewer response-field-"
          + settings.field_type + "\"><div class=\"subtemplate-wrapper\">"
      html += "<label><span>";
      html += settings.label;
      if (settings.required) {
        html += "<abbr title=\"required\">*</abbr>";
      }
      html += "</span></label>";

      html += "<input class=\"rf-size-";
      html += settings.field_options.size;
      html += "\"";
      html += " data-input-index=\"" + settings.index + "\" ";
      if (settings.required)
        html += " required ";
      if (settings.field_options.minlength) {
        html += " minlength=\"" + settings.field_options.minlength + "\" ";
      }
      if (settings.field_options.maxlength) {
        html += " maxlength=\"" + settings.field_options.maxlength + "\" ";
      }
      var name = settings.name ? settings.name : settings.label;
      html += " name=\"" + name + "\" ";
      html += " value=\"" + (settings.value || "") + "\" ";
      html += disabled;
      html += " type=\"email\" "
      html += ">";

      html += "<span class=\"help-block\">";
      html += settings.field_options.description || "";
      html += "</span>" + "</div>" + "</div>";
     // console.log(html);
      return html;
    },
    generateValue : function(settings) {
      var index = settings.index;
      var $input = $form.find("input[data-input-index='" + index + "']");
      settings.value = $input.val();
      return settings;
    }
  }

  template["section_break"] = {
    generateHtml : function(settings) {
      var html = "<div class=\"fb-field-wrapper fb-field-viewer response-field-"
          + settings.field_type + "\"><div class=\"subtemplate-wrapper\">"
      html += "<label>";
      html += settings.label;
      html += "</label>";

      html += "<p>";
      html += settings.field_options.description || "";
      html += "</p>";

      html += "</div>" + "</div>";
      return html;
    },
    generateValue : function(settings) {
      return settings;
    }
  }

  template["submit_buttons"] = function(settings) {
    // var html = "<div class=\"subtemplate-wrapper\">"
    // html += "<button type=\"submit\" data-action=\"submit\">提交</button>";
    // // html += "<button type=\"button\" data-action=\"show\">提交</button>";
    // html += "</div>";
    var html = "";
    html += '<a class="btn btn-success btn-submit-vote" data-action="submit">提交</a>';
    return html;
  }

  template["cancel_buttons"] = function(settings) {

    // var html = "<div class=\"subtemplate-wrapper\">"
    // html += "<button type=\"submit\" data-action=\"submit\">提交</button>";
    // // html += "<button type=\"button\" data-action=\"show\">提交</button>";
    // html += "</div>";
    var html = "";
    html += '<a class="btn btn-cancel btn-submit-vote" data-action="cancel">取消</a>';
   // console.log(html);
    return html;
  }

  template["preivew_buttons"] = function(settings) {
    var html = '<a class="btn btn-success btn-submit-vote">查看表单</a>';
    return html;
  }

  this.html("");
  var $form = $("<form />").appendTo(this);
  if (settings.isAdmin) {
    $form.hide();
  }
  $.each(items, function(index, item) {
    //console.log("Add Item" + index);
    var type = item.field_type;
    if (typeof (template[type])) {
      //console.log(item);
      item.index = index;
      item.name = "input-" + index;
      //console.log(item);
      var html = template[type].generateHtml(item);
      $form.append(html);
    }
  });
  $form.validate({
    rules : $rules
  });
  var submitable = true;
  var $buttons = $(template["submit_buttons"]());
  var $cancelbutton = $(template["cancel_buttons"]());
  if (settings.submitted) {
    $("#column_selection").hide();
    $buttons.text("重新提交");
    submitable = false;
  }
  //console.log(settings.expired);
  if (settings.expired) {
    $buttons.attr("disabled", "disabled");
  }
  var $previewButton = $(template["preivew_buttons"]());
  $previewButton.click(function() {
    $form.toggle();
    if ($form.is(":hidden")) {
      $previewButton.text("查看表单");
    } else {
      $previewButton.text("隐藏表单");
    }
  });

  $cancelbutton.click(function(e) {
    e.preventDefault();
    history.go(-1);
  });

  $buttons.click(function(e) {
    e.preventDefault();
    if (submitable) {
      if (!$form.valid()) {
        return;
      }
      $buttons.attr("disabled", "disabled");
      var obj = new Array();

      $.each(items, function(index, item) {
        var type = item.field_type;
        obj.push(template[type].generateValue(item));
      });
     // console.log(obj);

      $.ajax({
        url : settings.submitted ? settings.editUrl : settings.postUrl,
        type : 'POST',
        dateType : "json",
        data : {
          body : "body",
          title : settings.title,
          pid : settings.pid,
          action : settings.submitted ? "edit" : "add",
          meta_ideatree : JSON.stringify(obj),
          tagIds : $("#tagIds").val()
        },
        success : function(result) {
          console.log(result);
          $(".form-con").hide();
          $(".form-success").show();
         // window.location.reload();
        }
      });
    } else {
      $form.find("input").attr("disabled", false);
      $form.find("select").attr("disabled", false);
      $form.find("textarea").attr("disabled", false);
      submitable = true;
      $buttons.text("提交");
    }
  });
  // $form.append($buttons);
  if (settings.isAdmin) {
    $form.after($previewButton);
  } else if (!settings.preview) {
    $form.after($cancelbutton);
    $form.after($buttons);
  }

}