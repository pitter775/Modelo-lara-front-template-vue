/*=========================================================================================
	File Name: blog-edit.js
	Description: Blog edit field select2 and quill editor JS
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
  'use strict';


  var blogFeatureImage = $('#blog-feature-image');
  var blogImageText = document.getElementById('blog-image-text');
  var blogImageInput = $('#blogCustomFile');



  // Snow Editor



  // Change featured image
  if (blogImageInput.length) {
    $(blogImageInput).on('change', function (e) {
      var reader = new FileReader(),
        files = e.target.files;
        if(files){
          reader.onload = function () {
            if (blogFeatureImage.length) {
              blogFeatureImage.attr('src', reader.result);
            }
          };
          reader.readAsDataURL(files[0]);
          blogImageText.innerHTML = blogImageInput.val();
        }
    });
  }


  $(document).ready( function () {
    $('#example').DataTable();
} );


})(window, document, jQuery);
