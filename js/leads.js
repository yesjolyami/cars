(() => {
  const endpoint = window.tvoeAuto?.leadEndpoint;
  const requestId = () => window.crypto?.randomUUID?.() || `${Date.now()}-${Math.random().toString(36).slice(2)}`;

  const showLeadSuccess = (form) => {
    const previouslyFocused = document.activeElement;
    const modal = document.createElement('div');
    modal.className = 'lead-success-modal';
    modal.setAttribute('role', 'presentation');
    modal.innerHTML = `
      <section class="lead-success-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="lead-success-title" tabindex="-1">
        <div class="lead-success-modal__mark" aria-hidden="true">✓</div>
        <h2 id="lead-success-title">Спасибо!</h2>
        <p>Заявка принята. Мы свяжемся с вами в ближайшее время и уточним все детали.</p>
        <button class="lead-success-modal__close" type="button">Понятно</button>
      </section>
    `;

    const closeButton = modal.querySelector('.lead-success-modal__close');
    const dialog = modal.querySelector('.lead-success-modal__dialog');
    const close = () => {
      document.body.classList.remove('lead-success-open');
      document.removeEventListener('keydown', onKeydown);
      modal.remove();
      (previouslyFocused instanceof HTMLElement ? previouslyFocused : form)?.focus?.();
    };
    const onKeydown = (event) => {
      if (event.key === 'Escape') close();
    };

    modal.addEventListener('click', (event) => {
      if (event.target === modal) close();
    });
    closeButton.addEventListener('click', close);
    document.addEventListener('keydown', onKeydown);
    document.body.append(modal);
    document.body.classList.add('lead-success-open');
    dialog.focus();
  };

  window.tvoeAutoSubmitLead = async (form, status, leadType) => {
    if (!endpoint) throw new Error('Адрес обработчика заявок не задан.');
    const button = form.querySelector('[type="submit"]');
    const data = { lead_type: leadType, started_at: Number(form.dataset.leadStarted || 0), request_id: form.dataset.leadRequestId || requestId() };
    new FormData(form).forEach((value, key) => { data[key] = key in data ? [data[key], String(value)].flat() : String(value); });
    form.dataset.leadSending = 'true';
    if (button) button.disabled = true;
    if (status) status.textContent = 'Отправляем заявку…';
    try {
      const response = await fetch(endpoint, { method: 'POST', credentials: 'same-origin', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) });
      const result = await response.json().catch(() => ({}));
      if (!response.ok) throw new Error(result.message || 'Не удалось отправить заявку.');
      form.reset();
      if (status) status.textContent = result.message || 'Спасибо! Заявка принята.';
      showLeadSuccess(form);
      return true;
    } catch (error) {
      if (status) status.textContent = error instanceof Error ? error.message : 'Ошибка отправки. Позвоните нам.';
      return false;
    } finally {
      form.dataset.leadSending = 'false';
      if (button) button.disabled = !form.querySelector('[name="personal-data-consent"]')?.checked;
    }
  };

  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('form[data-personal-data-form]').forEach((form) => {
      form.dataset.leadStarted = String(Math.floor(Date.now() / 1000));
      form.dataset.leadRequestId = requestId();
    });
  });
})();
