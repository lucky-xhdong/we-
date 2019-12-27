function deleteForm(id) {
  bootbox.dialog({
    message : "确认删除?",
    title : "确认",
    buttons : {
      cancel : {
        label : "取消",
        className : "btn-success",
        callback : function() {
        }
      },
      confirm : {
        label : "确定",
        className : "btn-danger",
        callback : function() {
          $.ajax({
            url : deleteUrl + "/" + id,
            type : "post",
            data : {
              "action" : "delete"
            },
            success : function(response) {
              $("#submitted_forms").jtable("reload");
            }
          });
        }
      }
    }
  });
}
$(document)
    .ready(

        function() {
          $("#export")
              .click(
                  function(e) {
                    e.preventDefault();
                    var url = listUrl + "?export=true";
                    $(
                        "<form action=\""
                            + url
                            + "\" method=\"post\" ><input type=\"hidden\" name=\"action\" value=\"listsubmited\" /></form>")
                        .submit();
                  });

          function getColumns() {
            var colums = {};
            $.each(formItems, function(index, item) {
              if (item.field_type == "section_break") {
                return;
              }
              console.log(item);
              colums["input-" + index] = {
                visibility : index >= 6 ? "hidden" : "visible",
                title : item.label,
                width : "200px"
              };
            });

            colums["author"] = {
              visibility : 'fixed',
              title : "提交人",
              width : "200px"
            };

            colums["date"] = {
              visibility : 'fixed',
              title : "提交时间",
              width : "200px"
            };
            colums["id"] = {
              visibility : 'fixed',
              title : "操作",
              width : "200px",
              display : function(data) {
                console.log(data);
                return "<a onclick=\"deleteForm(" + data.record.id
                    + ")\">删除</a>";// + "<a onclick=\"previewForm("
                // + data.record.id + ")\">预览</a>";
              }
            };
            return colums;

            // {
            // PersonId : {
            // key : true,
            // list : false
            // },
            // Name : {
            // title : 'Author Name',
            // },
            // Age : {
            // title : 'Age',
            // },
            // RecordDate : {
            // title : 'Record date',
            // type : 'date',
            // create : false,
            // edit : false
            // }
            // }
          }
          if (!isAdmin) {
            return;
          }
          $("#submitted_forms")
              .jtable(
                  {
                    title : '已提交列表',
                    actions : {
                      listAction : listUrl,
                      creatAction : ''
                    },
                    ajaxSettings : {
                      type : 'POST',
                      dataType : 'json'
                    },
                    paging : true,
                    columnResizable : true,
                    columnSelectable : true,
                    fields : getColumns(),
                    toolbar : {
                      items : [ {
                        icon : '/images/excel.png',
                        text : '导出到Excel',
                        click : function() {
                          var url = listUrl + "?export=true";
                          $(
                              "<form action=\""
                                  + url
                                  + "\" method=\"post\" ><input type=\"hidden\" name=\"action\" value=\"listsubmited\" /></form>")
                              .submit();
                        }
                      } ]
                    },
                  });

          $("#submitted_forms").jtable("load", {
            action : "listsubmited",
            id : pid
          });

          function setupColumns() {
            var checkboxes = [];
            $.each(formItems, function(index, item) {
              if (item.field_type == "section_break") {
                return;
              }
              var option = $("<option value='" + index + "' "
                  + ((index >= 6) ? "" : "selected") + ">" + item.label
                  + "</option>");
              $('#column_selection').append(option);

              $("#submitted_forms").jtable('changeColumnVisibility',
                  "input-" + index, (index < 6 ? "visible" : "hidden"));
            });
            $('#column_selection').multiselect(
                {
                  onChange : function(option, checked) {
                    if (checked) {
                      $("#submitted_forms").jtable('changeColumnVisibility',
                          "input-" + option.val(), "visible");
                    } else {
                      $("#submitted_forms").jtable('changeColumnVisibility',
                          "input-" + option.val(), "hidden");
                    }
                  },
                  nonSelectedText : '未选择',
                  nSelectedText : '选中'
                });
          }
          setupColumns();
        });