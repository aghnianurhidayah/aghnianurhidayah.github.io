const menuIcon = document.getElementById("menu-icon");
const menuList = document.getElementById("menu-list");

menuIcon.addEventListener("click", () => {
    menuList.classList.toggle("d-none");
});

function toggleAddmenu() {
    document.getElementById("popup-add-menu").classList.toggle("active");
}

function toggleEditmenu() {
    document.getElementById("popup-edit-menu").classList.toggle("active");
}
