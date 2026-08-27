document.addEventListener('DOMContentLoaded', () => {
  const filter = document.querySelector('.catalog-filter');
  const cardsContainer = document.querySelector('.catalog-cards');
  const resultCount = document.querySelector('.catalog-results-count');
  const emptyState = document.querySelector('.catalog-empty');
  const sortSelect = document.querySelector('.catalog-toolbar select');
  if (!filter || !cardsContainer) return;

  const filterNames = ['model', 'year', 'body', 'transmission', 'city'];
  const cards = [...cardsContainer.querySelectorAll('.catalog-card')];
  const getChecked = (name) =>
    [...filter.querySelectorAll(`input[name="${name}"]:checked`)].map((input) => input.value);
  const setPanelState = (button, open) => {
    button.setAttribute('aria-expanded', String(open));
    document.getElementById(button.getAttribute('aria-controls'))?.classList.toggle('is-open', open);
  };

  filter.querySelectorAll('.catalog-filter__row').forEach((button, index) => {
    const panel = button.nextElementSibling;
    if (!panel) return;
    panel.id ||= `catalog-filter-panel-${index + 1}`;
    button.setAttribute('aria-controls', panel.id);
    button.addEventListener('click', () => setPanelState(button, button.getAttribute('aria-expanded') !== 'true'));
  });

  const updateUrl = () => {
    const params = new URLSearchParams();
    filterNames.forEach((name) => getChecked(name).forEach((value) => params.append(name, value)));
    if (sortSelect?.value && sortSelect.value !== 'newest') params.set('sort', sortSelect.value);
    const query = params.toString();
    history.replaceState(null, '', `${location.pathname}${query ? `?${query}` : ''}${location.hash}`);
  };

  const render = ({ syncUrl = true, track = false } = {}) => {
    const groups = filterNames.map((name) => ({ name, values: getChecked(name) }));
    const filtered = cards.filter((card) =>
      groups.every(({ name, values }) => !values.length || values.includes(card.dataset[name])),
    );
    const sorted = [...filtered].sort((a, b) => {
      if (sortSelect?.value === 'oldest') return Number(a.dataset.year) - Number(b.dataset.year);
      if (sortSelect?.value === 'name') return a.querySelector('h3').textContent.localeCompare(b.querySelector('h3').textContent, 'ru');
      return Number(b.dataset.year) - Number(a.dataset.year);
    });
    sorted.forEach((card) => cardsContainer.append(card));
    cards.forEach((card) => { card.hidden = !filtered.includes(card); });
    if (resultCount) resultCount.textContent = `Найдено: ${filtered.length}`;
    if (emptyState) emptyState.hidden = filtered.length !== 0;
    if (syncUrl) updateUrl();
    if (track) window.trackGoal?.('catalog_filter', { result_count: filtered.length });
  };

  const reset = () => {
    filter.querySelectorAll('input[type="checkbox"]').forEach((input) => { input.checked = false; });
    filter.querySelectorAll('.catalog-filter__row').forEach((button) => setPanelState(button, false));
    if (sortSelect) sortSelect.value = 'newest';
    render({ track: true });
    window.trackGoal?.('catalog_filter_reset');
  };

  const params = new URLSearchParams(location.search);
  filterNames.forEach((name) => params.getAll(name).forEach((value) => {
    const input = [...filter.querySelectorAll(`input[name="${name}"]`)].find((item) => item.value === value);
    if (input) input.checked = true;
  }));
  const sort = params.get('sort');
  if (sortSelect && [...sortSelect.options].some((option) => option.value === sort)) sortSelect.value = sort;

  filter.querySelector('.catalog-filter__reset')?.addEventListener('click', reset);
  filter.querySelectorAll('input[type="checkbox"]').forEach((input) => input.addEventListener('change', () => render({ track: true })));
  sortSelect?.addEventListener('change', () => {
    render();
    window.trackGoal?.('catalog_sort', { sort: sortSelect.value });
  });
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') filter.querySelectorAll('.catalog-filter__row').forEach((button) => setPanelState(button, false));
  });
  render({ syncUrl: false });
});
