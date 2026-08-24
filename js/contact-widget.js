document.addEventListener("DOMContentLoaded", () => {
  if (document.querySelector(".global-contact-widget")) return;

  document.body.insertAdjacentHTML(
    "beforeend",
    `
    <aside class="global-contact-widget is-open" aria-label="Быстрая связь" aria-expanded="true">
      <div class="global-contact-widget__channels">
        <a href="tel:+79000000000" aria-label="Позвонить"><img src="img/phone.svg" alt=""></a>
        <a href="#" aria-label="WhatsApp"><img src="img/figma-catalog/wa.svg" alt=""></a>
        <a href="#" aria-label="MAX"><img src="img/figma-catalog/max.svg" alt=""></a>
        <a href="#" aria-label="Telegram"><img src="img/figma-catalog/tg.svg" alt=""></a>
        <a href="#" aria-label="ВКонтакте"><img src="img/figma-catalog/vk.svg" alt=""></a>
      </div>
      <button class="global-contact-widget__label" type="button"><img src="img/figma-catalog/double-chat.svg" alt="">Связаться</button>
    </aside>
  `,
  );

  const widget = document.querySelector(".global-contact-widget");
  const contactToggle = widget?.querySelector(".global-contact-widget__label");

  contactToggle?.addEventListener("click", () => {
    const isOpen = widget.classList.toggle("is-open");
    widget.setAttribute("aria-expanded", String(isOpen));
  });

  const leadForms = document.querySelectorAll(
    "[data-lead-form], .contact-form",
  );
  if ("IntersectionObserver" in window && leadForms.length) {
    const observer = new IntersectionObserver(
      (entries) => {
        document.body.classList.toggle(
          "lead-form-visible",
          entries.some((entry) => entry.isIntersecting),
        );
      },
      { threshold: 0.15 },
    );
    leadForms.forEach((form) => observer.observe(form));
  }
});
