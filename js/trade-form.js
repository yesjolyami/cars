document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('[data-lead-form]');
  if (!form) return;

  // The static page is not connected to a lead-delivery backend yet.
  form.addEventListener('submit', (event) => event.preventDefault());
});
