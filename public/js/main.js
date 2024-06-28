document.addEventListener("DOMContentLoaded", function () {
  const link = document.querySelector(".gallery__main-img");
  const linkMob = document.querySelector(".gallery__main-img-mob"); // Новый элемент для мобильной версии
  const modal = document.getElementById("galleryModal");
  const overlay = document.getElementById("galleryOverlay");
  const closeButton = document.querySelector(".modal-close");

  function openModal() {
    modal.classList.add("visible");
    overlay.classList.add("visible");
    document.body.classList.add("modal-open");
  }

  function closeModal() {
    modal.classList.remove("visible");
    overlay.classList.remove("visible");
    document.body.classList.remove("modal-open");
  }

  link.addEventListener("click", function () {
    openModal();
  });

  linkMob.addEventListener("click", function () {
    openModal();
  });

  closeButton.addEventListener("click", function () {
    closeModal();
  });

  document.addEventListener("click", function (event) {
    if (
      !modal.contains(event.target) &&
      !link.contains(event.target) &&
      !linkMob.contains(event.target)
    ) {
      closeModal();
    }
  });
});

("use strict");
//==========================================

const titles = document.querySelectorAll(".accordion__title");
const contents = document.querySelectorAll(".accordion__content");

titles.forEach((item) =>
  item.addEventListener("click", () => {
    const activeContent = document.querySelector("#" + item.dataset.tab);

    if (activeContent.classList.contains("active")) {
      activeContent.classList.remove("active");
      item.classList.remove("active");
      activeContent.style.maxHeight = 0;
    } else {
      contents.forEach((element) => {
        element.classList.remove("active");
        element.style.maxHeight = 0;
      });

      titles.forEach((element) => element.classList.remove("active"));

      item.classList.add("active");
      activeContent.classList.add("active");
      activeContent.style.maxHeight = activeContent.scrollHeight + "px";
    }
  })
);

// document.querySelector('[data-tab="tab-3"]').classList.add('active');
// document.querySelector('#tab-3').classList.add('active');
// document.querySelector('#tab-3').style.maxHeight = document.querySelector('#tab-3').scrollHeight + 'px';
