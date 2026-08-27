document.addEventListener('DOMContentLoaded', () => {
  const filters = [...document.querySelectorAll('[data-faq-filter]')];
  const items = [...document.querySelectorAll('[data-faq-categories]')];
  const emptyState = document.querySelector('[data-faq-empty]');
  if (!filters.length || !items.length) return;

  const applyFilter = (category, { syncUrl = true, track = true } = {}) => {
    const validCategory = filters.some((button) => button.dataset.faqFilter === category)
      ? category
      : 'all';
    filters.forEach((button) => {
      const active = button.dataset.faqFilter === validCategory;
      button.classList.toggle('is-active', active);
      button.setAttribute('aria-pressed', String(active));
    });

    const visibleItems = items.filter((item) => {
      const categories = item.dataset.faqCategories.split(/\s+/);
      return validCategory === 'all' || categories.includes(validCategory);
    });
    items.forEach((item) => {
      item.hidden = !visibleItems.includes(item);
      if (item.hidden) {
        const trigger = item.querySelector('.accordion-trigger');
        trigger?.setAttribute('aria-expanded', 'false');
        trigger?.nextElementSibling?.classList.remove('is-open');
      }
    });
    if (emptyState) emptyState.hidden = visibleItems.length !== 0;

    if (syncUrl) {
      const url = new URL(location.href);
      if (validCategory === 'all') url.searchParams.delete('category');
      else url.searchParams.set('category', validCategory);
      history.replaceState(null, '', `${url.pathname}${url.search}${url.hash}`);
    }
    if (track) window.trackGoal?.('faq_filter', { category: validCategory, result_count: visibleItems.length });
  };

  filters.forEach((button) => {
    button.addEventListener('click', () => applyFilter(button.dataset.faqFilter));
  });
  applyFilter(new URLSearchParams(location.search).get('category') || 'all', {
    syncUrl: false,
    track: false,
  });
});
