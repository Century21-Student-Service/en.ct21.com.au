/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
  
  // KCFinder
  config.filebrowserBrowseUrl = '/libraries/kcfinder/browse.php?opener=ckeditor&type=files';
  config.filebrowserImageBrowseUrl = '/libraries/kcfinder/browse.php?opener=ckeditor&type=images';
  config.filebrowserFlashBrowseUrl = '/libraries/kcfinder/browse.php?opener=ckeditor&type=flash';
  config.filebrowserUploadUrl = '/libraries/kcfinder/upload.php?opener=ckeditor&type=files';
  config.filebrowserImageUploadUrl = '/libraries/kcfinder/upload.php?opener=ckeditor&type=images';
  config.filebrowserFlashUploadUrl = '/libraries/kcfinder/upload.php?opener=ckeditor&type=flash';
};
