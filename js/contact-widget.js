document.addEventListener("DOMContentLoaded", () => {
  document
    .querySelectorAll(".hero-contact-dock, .selection-hero-contact-dock")
    .forEach((widget) => widget.remove());

  document.body.insertAdjacentHTML(
    "beforeend",
    `
    <div class="hero-contact-dock" aria-label="Быстрая связь">
      <div class="hero-contact-dock__channels" id="contact-widget-channels">
        <a href="tel:+79132431855" aria-label="Позвонить"
          ><img src="img/phone.svg" alt="" /></a
        ><a href="#" aria-label="WhatsApp"
          ><img src="img/figma-catalog/wa.svg" alt="" /></a
        ><a href="https://max.ru/join/EWPVYaIlt0f9tMCa6J70Ku7pZ2C29zFgSnmHaHLv4g0" target="_blank" rel="noopener noreferrer" aria-label="MAX"
          ><img src="img/figma-catalog/max.svg" alt="" /></a
        ><a href="https://t.me/tvoeavtosibir" target="_blank" rel="noopener noreferrer" aria-label="Telegram"
          ><img src="img/figma-catalog/tg.svg" alt="" /></a
        ><a href="https://vk.ru/tvoeavtosibir" target="_blank" rel="noopener noreferrer" aria-label="ВКонтакте"
          ><img src="img/figma-catalog/vk.svg" alt="" /></a>
      </div>
      <button
        class="hero-contact-dock__label"
        type="button"
        aria-controls="contact-widget-channels"
        aria-expanded="true"
        aria-label="Скрыть способы связи"
      ><img src="img/figma-catalog/double-chat.svg" alt="" />Связаться</button>
    </div>
  `,
  );

  const widget = document.querySelector("body > .hero-contact-dock");
  const toggle = widget.querySelector(".hero-contact-dock__label");

  toggle.addEventListener("click", () => {
    const isOpen = toggle.getAttribute("aria-expanded") === "true";
    widget.classList.toggle("is-collapsed", isOpen);
    toggle.setAttribute("aria-expanded", String(!isOpen));
    toggle.setAttribute(
      "aria-label",
      isOpen ? "Показать способы связи" : "Скрыть способы связи",
    );
  });
});
