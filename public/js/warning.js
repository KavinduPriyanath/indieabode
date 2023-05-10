//Loading the Modal
const openWarningButtons = document.querySelectorAll("[data-modal-target]");
const closeWarningButtons = document.querySelectorAll("[data-close-button]");
const warningoverlay = document.getElementById("overlay-warning");

openWarningButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const warning = document.querySelector(button.dataset.modalTarget);
    openModal(warning);
  });
});

// warningoverlay.addEventListener("click", () => {
//   const modals = document.querySelectorAll(".modal.active");
//   modals.forEach((modal) => {
//     closeModal(modal);
//   });
// });

closeWarningButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const warning = button.closest(".modal-warning");
    closeModal(warning);
  });
});

function openModal(warning) {
  if (warning == null) return;
  warning.classList.add("active");
  warningoverlay.classList.add("active");
}

function closeModal(warning) {
  if (warning == null) return;
  warning.classList.remove("active");
  warningoverlay.classList.remove("active");
}
