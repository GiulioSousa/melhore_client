let metricMenu = document.querySelectorAll('.metric-menu');
let metricMenuBtn = document.querySelectorAll('.metric-menu__btn');
let metricMenuBtnClose = document.querySelectorAll('.metric-menu__btn-close');
let metricMenuEdit = document.querySelectorAll('.metric-menu__edit');
let metricMenuDelete = document.querySelectorAll('.metric-menu__delete');

function toggleMenu(button, classMod) {
    button.classList.toggle(classMod);
}

metricMenu.forEach((menu, i) => {
    menu.addEventListener('click', () => {
        toggleMenu(menu, 'metric-menu--active');
        toggleMenu(metricMenuBtn[i], 'metric-menu__btn--active');
        toggleMenu(metricMenuEdit[i], 'metric-menu__edit--active');
        toggleMenu(metricMenuDelete[i], 'metric-menu__delete--active');
        toggleMenu(metricMenuBtnClose[i], 'metric-menu__btn-close--active');
    });
});

