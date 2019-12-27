tinymce.PluginManager.add('idea_checkbox', function(editor) {
    var DomUtils = tinymce.ui.DomUtils;
    var each = tinymce.util.Tools.each;

    editor.addButton('idea_checkbox', {
        icon : "checkbox",
        fixedWidth : true,
        onclick : function() {
            editor.insertContent('<input type="checkbox">');
        }
    });

});
