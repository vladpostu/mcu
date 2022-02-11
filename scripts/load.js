

let loaded = document.querySelector('.loaded');
let loader = document.querySelector('.loader');

loaded.classList.add('d-none');
loader.classList.add('d-block');

window.addEventListener('load', () => {
    setTimeout(() => {
        loader.classList.remove('d-block');
        loaded.classList.remove('d-none');
        loader.classList.add('d-none');
        loaded.classList.add('d-block');
    }, 1000);
})