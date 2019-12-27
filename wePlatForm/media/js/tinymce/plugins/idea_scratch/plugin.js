tinymce.PluginManager.add('idea_scratch', function(editor) {
    var DomUtils = tinymce.ui.DomUtils;
    var each = tinymce.util.Tools.each;

    function toggleFormat(fmt) {

        if (fmt.control) {
            fmt = fmt.control.value();
        }
        console.log(fmt);
        if (fmt) {
            editor.execCommand('mceToggleFormat', false, fmt);
        }
    }


    editor.addButton('idea_scratch', function() {
        var items = [];
        // var blocks = createFormats(editor.settings.block_formats || 'Paragraph=p;' + 'Address=address;' + 'Pre=pre;' + 'Header 1=h1;' + 'Header 2=h2;' + 'Header 3=h3;' + 'Header 4=h4;' + 'Header 5=h5;' + 'Header 6=h6');
        var alignments = [["Align left", "alignleft"], ["Align center", "aligncenter"], ["Align right", "alignright"]];

        each(alignments, function(alignment) {
            items.push({
                text : alignment[0],
                value : alignment[1]
            });
        });

        return {
            type : 'listbox',
            text : "Alignment",
            values : items,
            fixedWidth : true,
            onselect : toggleFormat
            //onPostRender : createListBoxChangeHandler(items)
        };
    });

});
