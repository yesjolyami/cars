document.addEventListener('DOMContentLoaded', () => {
  const gallery = document.querySelector('[data-gallery]');
  if (!gallery || !window.wp?.media) return;

  const items = gallery.querySelector('[data-gallery-items]');
  const input = gallery.querySelector('[data-gallery-input]');
  const add = gallery.querySelector('[data-gallery-add]');
  let frame;

  const ids = () => [...items.querySelectorAll('[data-id]')].map((item) => item.dataset.id);
  const sync = () => { input.value = ids().join(','); };
  const append = (attachment) => {
    if (!attachment?.id || ids().includes(String(attachment.id))) return;
    const button = document.createElement('button');
    const image = attachment.sizes?.thumbnail?.url || attachment.url;
    button.type = 'button';
    button.dataset.id = attachment.id;
    button.setAttribute('aria-label', 'Удалить фото');
    button.innerHTML = `<img src="${image}" alt=""><span>×</span>`;
    items.append(button);
  };

  items.addEventListener('click', (event) => {
    const button = event.target.closest('[data-id]');
    if (!button) return;
    button.remove();
    sync();
  });

  add.addEventListener('click', () => {
    frame ||= wp.media({ title: 'Фотографии автомобиля', button: { text: 'Добавить в галерею' }, multiple: true, library: { type: 'image' } });
    frame.off('select').on('select', () => {
      frame.state().get('selection').toJSON().forEach(append);
      sync();
    });
    frame.open();
  });
});
