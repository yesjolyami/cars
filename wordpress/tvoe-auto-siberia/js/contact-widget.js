const initScrollReveal = () => {
  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

  const targets = [
    ...document.querySelectorAll(
      "main > :not(script):not(style), main [data-reveal], .rent-final, .site-footer",
    ),
  ].filter((element, index, elements) => elements.indexOf(element) === index);

  if (!targets.length) return;

  const show = (element) => element.classList.add("is-visible");
  document.documentElement.classList.add("reveal-ready");
  targets.forEach((element) => element.classList.add("scroll-reveal"));

  if (!("IntersectionObserver" in window)) {
    targets.forEach(show);
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        show(entry.target);
        observer.unobserve(entry.target);
      });
    },
    { rootMargin: "0px 0px -6%", threshold: 0.08 },
  );

  targets.forEach((element) => observer.observe(element));
};

document.addEventListener("DOMContentLoaded", () => {
  initScrollReveal();

  const assetUrl = (path) => {
    const base = window.tvoeAuto?.assetBase;
    return base ? `${base.replace(/\/$/, "")}/${path}` : path;
  };

  document
    .querySelectorAll(".hero-contact-dock, .selection-hero-contact-dock")
    .forEach((widget) => widget.remove());

  document.body.insertAdjacentHTML(
    "beforeend",
    `
    <div class="hero-contact-dock" aria-label="Быстрая связь">
      <div class="hero-contact-dock__channels" id="contact-widget-channels">
        <a href="tel:+79132431855" aria-label="Позвонить"
          ><img src="${assetUrl("img/phone.svg")}" alt="" /></a
        ><a href="https://wa.me/79132431855" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"
          ><img src="${assetUrl("img/figma-catalog/wa.svg")}" alt="" /></a
        ><a href="https://max.ru/u/f9LHodD0cOIUivXn20beSQhbKedn7hrTKBBsMGf1t2Tjr3zL1KJ-W_a5pi0" target="_blank" rel="noopener noreferrer" aria-label="MAX"
          ><img src="${assetUrl("img/figma-catalog/max.svg")}" alt="" /></a
        ><a href="https://t.me/zaurguliev" target="_blank" rel="noopener noreferrer" aria-label="Telegram"
          ><img src="${assetUrl("img/figma-catalog/tg.svg")}" alt="" /></a
        ><a href="https://vk.ru/tvoeavtosibir" target="_blank" rel="noopener noreferrer" aria-label="ВКонтакте"
          ><img src="${assetUrl("img/figma-catalog/vk.svg")}" alt="" /></a>
      </div>
      <button
        class="hero-contact-dock__label"
        type="button"
        aria-controls="contact-widget-channels"
        aria-expanded="true"
        aria-label="Скрыть способы связи"
      ><img src="${assetUrl("img/figma-catalog/double-chat.svg")}" alt="" />Связаться</button>
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
