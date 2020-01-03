jQuery(document).ready(function($){
  var target;
  var mediaUploader = wp.media.frames.file_frame = wp.media({
    title: 'Choose Image',
    button: {
    text: 'Choose Image'
  }, multiple: false });

  mediaUploader.on('select', function() {
    var attachment = mediaUploader.state().get('selection').first().toJSON();
    target.find('.image-url').val(attachment.url);
  });

  $('.csc-media-uploader').each(function(){
    var uploader = this;
    $(uploader).find('.upload-button').click(function(e) {
      e.preventDefault();
      target = $(uploader);
      if (mediaUploader) {
        mediaUploader.open();
        return;
      }
    });
  });
  $('.csc-color-field').wpColorPicker();
});
