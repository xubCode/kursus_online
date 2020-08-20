/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.filebrowserBrowseUrl = 'http://localhost/BeLon/assets/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = 'http://localhost/BeLon/assets/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = 'http://localhost/BeLon/assets/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = 'http://localhost/BeLon/assets/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = 'http://localhost/BeLon/assets/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = 'http://localhost/BeLon/assets/kcfinder/upload.php?type=flash';

	config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others', groups: [ 'others' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'indent', 'blocks', 'list', 'align', 'bidi', 'paragraph' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'EasyImageUpload', 'cloudservices';


	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';	
};
