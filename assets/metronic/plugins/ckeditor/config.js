/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        
        config.filebrowserBrowseUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/index.html',
        config.filebrowserImageBrowseUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/index.html',
        config.filebrowserFlashBrowseUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/index.html',
        config.filebrowserUploadUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/connectors/php/upload.php?Type=File',
        config.filebrowserImageUploadUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/connectors/php/upload.php?Type=Image',
        config.filebrowserFlashUploadUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/connectors/php/upload.php?Type=Flash';
};
