document.addEventListener("DOMContentLoaded", () => {
  const gallery = document.querySelector(".detail-gallery");
  const main = gallery?.querySelector(".detail-gallery__main");
  const mainImage = main?.querySelector("img");
  const thumbs = [...(gallery?.querySelectorAll(".gallery-thumb") || [])];

  if (!gallery || !main || !mainImage || !thumbs.length) return;

  let currentIndex = 0;
  let lastFocusedElement = null;
  let suppressMainClick = false;

  const lightbox = document.createElement("div");
  lightbox.className = "gallery-lightbox";
  lightbox.hidden = true;
  lightbox.innerHTML = `
    <div class="gallery-lightbox__dialog" role="dialog" aria-modal="true" aria-label="Просмотр фотографий автомобиля" tabindex="-1">
      <button class="gallery-lightbox__button gallery-lightbox__button--close" type="button" aria-label="Закрыть просмотр">×</button>
      <button class="gallery-lightbox__button gallery-lightbox__button--previous" type="button" aria-label="Предыдущая фотография">‹</button>
      <div class="gallery-lightbox__viewport">
        <img class="gallery-lightbox__image" alt="" draggable="false" />
      </div>
      <button class="gallery-lightbox__button gallery-lightbox__button--next" type="button" aria-label="Следующая фотография">›</button>
      <p class="gallery-lightbox__counter" aria-live="polite"></p>
    </div>`;
  document.body.append(lightbox);

  const viewport = lightbox.querySelector(".gallery-lightbox__viewport");
  const lightboxImage = lightbox.querySelector(".gallery-lightbox__image");
  const counter = lightbox.querySelector(".gallery-lightbox__counter");
  const closeButton = lightbox.querySelector(".gallery-lightbox__button--close");
  const previousButton = lightbox.querySelector(".gallery-lightbox__button--previous");
  const nextButton = lightbox.querySelector(".gallery-lightbox__button--next");

  const show = (index) => {
    currentIndex = (index + thumbs.length) % thumbs.length;
    const activeThumb = thumbs[currentIndex];
    const image = activeThumb.dataset.image || "";

    thumbs.forEach((thumb, thumbIndex) => {
      const isActive = thumbIndex === currentIndex;
      thumb.classList.toggle("is-active", isActive);
      thumb.setAttribute("aria-pressed", String(isActive));
    });

    if (image) mainImage.src = image;
    mainImage.alt = activeThumb.dataset.alt || "Фотография автомобиля";
    main.setAttribute(
      "aria-label",
      `Открыть фотографию ${currentIndex + 1} из ${thumbs.length}. Используйте стрелки для листания`,
    );
    if (lightboxImage) {
      lightboxImage.src = image;
      lightboxImage.alt = mainImage.alt;
    }
    if (counter) counter.textContent = `${currentIndex + 1} / ${thumbs.length}`;
  };

  const closeLightbox = () => {
    if (lightbox.hidden) return;
    lightbox.hidden = true;
    document.body.classList.remove("gallery-lightbox-open");
    if (lastFocusedElement instanceof HTMLElement) lastFocusedElement.focus();
  };

  const openLightbox = () => {
    lastFocusedElement = document.activeElement;
    show(currentIndex);
    lightbox.hidden = false;
    document.body.classList.add("gallery-lightbox-open");
    closeButton?.focus();
  };

  const onLightboxKeydown = (event) => {
    if (lightbox.hidden) return;
    if (event.key === "Escape") {
      event.preventDefault();
      closeLightbox();
      return;
    }
    if (event.key === "ArrowLeft" || event.key === "ArrowRight") {
      event.preventDefault();
      show(currentIndex + (event.key === "ArrowRight" ? 1 : -1));
    }
  };

  thumbs.forEach((thumb, index) => {
    thumb.addEventListener("click", () => show(index));
  });

  main.addEventListener("keydown", (event) => {
    if (event.key === "Enter" || event.key === " ") {
      event.preventDefault();
      openLightbox();
      return;
    }
    if (event.key !== "ArrowLeft" && event.key !== "ArrowRight") return;
    event.preventDefault();
    show(currentIndex + (event.key === "ArrowRight" ? 1 : -1));
  });

  main.addEventListener("click", () => {
    if (suppressMainClick) {
      suppressMainClick = false;
      return;
    }
    openLightbox();
  });

  closeButton?.addEventListener("click", closeLightbox);
  previousButton?.addEventListener("click", () => show(currentIndex - 1));
  nextButton?.addEventListener("click", () => show(currentIndex + 1));
  viewport?.addEventListener("click", (event) => {
    if (event.target === viewport) closeLightbox();
  });
  document.addEventListener("keydown", onLightboxKeydown);

  const addSwipe = (element) => {
    let touchStartX = null;
    let touchStartY = null;

    element.addEventListener(
      "touchstart",
      (event) => {
        touchStartX = event.changedTouches[0]?.clientX ?? null;
        touchStartY = event.changedTouches[0]?.clientY ?? null;
      },
      { passive: true },
    );

    element.addEventListener(
      "touchend",
      (event) => {
        if (touchStartX === null || touchStartY === null) return;
        const touch = event.changedTouches[0];
        const distanceX = (touch?.clientX ?? touchStartX) - touchStartX;
        const distanceY = (touch?.clientY ?? touchStartY) - touchStartY;
        touchStartX = null;
        touchStartY = null;
        if (Math.abs(distanceX) < 45 || Math.abs(distanceX) < Math.abs(distanceY)) return;
        if (element === main) {
          suppressMainClick = true;
          window.setTimeout(() => {
            suppressMainClick = false;
          }, 500);
        }
        show(currentIndex + (distanceX < 0 ? 1 : -1));
      },
      { passive: true },
    );
  };

  addSwipe(main);
  if (viewport) addSwipe(viewport);
  show(0);
});
