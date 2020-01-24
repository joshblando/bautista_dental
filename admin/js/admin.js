const addAdmin = document.querySelector("#addAdmin");
const addAdminModal = document.querySelector("#addAdminModal");
const closeModal = document.querySelectorAll(".close");

addAdmin.addEventListener("click", () => {
  addAdminModal.classList.add("show-modal");
});

for (let i = 0; i < closeModal.length; i++) {
  closeModal[i].addEventListener("click", () => {
    addAdminModal.classList.remove("show-modal");
  });
}
