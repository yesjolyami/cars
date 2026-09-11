(function ($) {
  'use strict';

  $(document).on('click', '.tvoe-auto-select-image', function () {
    var button = $(this);
    var frame = wp.media({
      title: 'Выберите изображение',
      button: { text: 'Использовать изображение' },
      multiple: false,
      library: { type: 'image' }
    });
    frame.on('select', function () {
      var attachment = frame.state().get('selection').first().toJSON();
      $('#' + button.data('target')).val(attachment.id);
      button.next('.tvoe-auto-image-name').text(attachment.filename || attachment.title);
    });
    frame.open();
  });
})(jQuery);
