(function( $ ) {
	'use strict';
	 $('.pf-number').keydown(function(event) {
       if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9
           || event.keyCode == 27 || event.keyCode == 13
           || (event.keyCode == 65 && event.ctrlKey === true)
           || (event.keyCode >= 35 && event.keyCode <= 39)){
               return;
       }else{
           if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
               event.preventDefault();
           }
       }
   });
   tinymce.PluginManager.add( 'custom_class', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton('custom_class', {
            title: 'Insert CSS Class',
            cmd: 'custom_class',
            icon: 'icon dashicons-wordpress',
        });
 
        // Add Command when Button Clicked
        editor.addCommand('custom_class', function() {
            // Check we have selected some text selected
            var text = editor.selection.getContent({
                'format': 'html'
            });
            if ( text.length === 0 ) {
                alert( 'Please select some text.' );
                return;
            }

            // Ask the user to enter a CSS class
            var result = prompt('Enter the CSS class');
            if ( !result ) {
                // User cancelled - exit
                return;
            }
            if (result.length === 0) {
                // User didn't enter anything - exit
                return;
            }

            // Insert selected text back into editor, wrapping it in an anchor tag
            editor.execCommand('mceReplaceContent', false, '<span class="' + result + '">' + text + '</span>');
        });

        // Enable/disable the button on the node change event
        editor.onNodeChange.add(function( editor ) {
            // Get selected text, and assume we'll disable our button
            var selection = editor.selection.getContent();
            var disable = true;

            // If we have some text selected, don't disable the button
            if ( selection ) {
                disable = false;
            }

            // Define whether our button should be enabled or disabled
            editor.controlManager.setDisabled( 'custom_class', disable );
        });
    });
})( jQuery );
