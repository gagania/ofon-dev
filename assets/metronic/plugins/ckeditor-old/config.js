/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
//		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];
        
        config.toolbar = 'Full';
//        config.toolbarGroups = [
//	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
//	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
//	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
//	{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
//	'/',
//	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
//	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
//	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
//	{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
//	'/',
//	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
//	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
//	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
//	{ name: 'others', items: [ '-' ] },
//	{ name: 'about', items: [ 'About' ] }
//        ];

        // Toolbar groups configuration.
//        config.toolbarGroups = [
//                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
//                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
//                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
//                { name: 'forms' },
//                '/',
//                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
//                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
//                { name: 'links' },
//                { name: 'insert' },
//                '/',
//                { name: 'styles' },
//                { name: 'colors' },
//                { name: 'tools' },
//                { name: 'others' },
//                { name: 'about' }
//        ];
	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
//	config.removeButtons = 'Underline,Subscript,Superscript';
//	config.removeDialogTabs = 'image:advanced;link:advanced';
        config.filebrowserBrowseUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/index.html',
        config.filebrowserImageBrowseUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/index.html',
        config.filebrowserFlashBrowseUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/index.html',
        config.filebrowserUploadUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/connectors/php/upload.php?Type=File',
        config.filebrowserImageUploadUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/connectors/php/upload.php?Type=Image',
        config.filebrowserFlashUploadUrl = 'http://localhost/csis/assets/metronic/plugins/ckeditor/fileman/connectors/php/upload.php?Type=Flash';
};
