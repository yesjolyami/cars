document.addEventListener('DOMContentLoaded', () => {
  const filter = document.querySelector('.catalog-filter');
  const cardsContainer = document.querySelector('.catalog-cards');
  const resultCount = document.querySelector('.catalog-results-count');
  const sortSelect = document.querySelector('.catalog-toolbar select');

  if (!filter || !cardsContainer) return;

  const cards = [...cardsContainer.querySelectorAll('.catalog-card')];
  const getChecked = (name) =>
    [...filter.querySelectorAll(`input[name="${name}"]:checked`)].map(
      (input) => input.value,
    );

  filter.querySelectorAll('.catalog-filter__row').forEach((button) => {
    button.addEventListener('click', () => {
      const panel = button.nextElementSibling;
      const open = button.getAttribute('aria-expanded') !== 'true';
      button.setAttribute('aria-expanded', String(open));
      panel?.classList.toggle('is-open', open);
    });
  });

  const reset = () => {
    filter.querySelectorAll('input[type="checkbox"]').forEach((input) => {
      input.checked = false;
    });
    filter.querySelectorAll('.catalog-filter__row').forEach((button) => {
      button.setAttribute('aria-expanded', 'false');
    });
    filter.querySelectorAll('.catalog-filter__panel').forEach((panel) => {
      panel.classList.remove('is-open');
    });
    if (sortSelect) sortSelect.value = 'newest';
    render();
  };

  filter.querySelector('.catalog-filter__reset')?.addEventListener('click', reset);
  filter.querySelectorAll('input[type="checkbox"]').forEach((input) => {
    input.addEventListener('change', render);
  });
  sortSelect?.addEventListener('change', render);

  function render() {
    const groups = ['model', 'year', 'body', 'transmission', 'city'].map(
      (name) => ({ name, values: getChecked(name) }),
    );
    const filtered = cards.filter((card) =>
      groups.every(({ name, values }) => {
        if (!values.length) return true;
        return values.includes(card.dataset[name]);
      }),
    );

    const sorted = [...filtered].sort((a, b) => {
      if (sortSelect?.value === 'oldest') {
        return Number(a.dataset.year) - Number(b.dataset.year);
      }
      if (sortSelect?.value === 'name') {
        return a.querySelector('h3').textContent.localeCompare(
          b.querySelector('h3').textContent,
          'ru',
        );
      }
      return Number(b.dataset.year) - Number(a.dataset.year);
    });

    sorted.forEach((card) => cardsContainer.append(card));
    cards.forEach((card) => {
      card.hidden = !filtered.includes(card);
    });
    if (resultCount) resultCount.textContent = `Найдено: ${filtered.length}`;
  }

  render();
});
