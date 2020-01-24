const addSched = document.querySelector("#addSched");
const addSchedModal = document.querySelector("#addSchedule");
const closeModal = document.querySelectorAll(".close");

// MODAL
addSched.addEventListener("click", () => {
  addSchedModal.classList.add("show-modal");
});

for (let i = 0; i < closeModal.length; i++) {
  closeModal[i].addEventListener("click", () => {
    addSchedModal.classList.remove("show-modal");
  });
}
// end modal
