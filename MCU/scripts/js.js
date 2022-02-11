
let ajaxButtons = document.querySelectorAll(".ajax-button");
let rows, trs;
let searchbar = document.querySelector('#searchbar');

ajaxButtons.forEach(button => {
    button.addEventListener('click', () => {
        setTimeout(() => {
            rows = document.querySelectorAll(".row-table");
        }, 500);
    })
});

searchbar.addEventListener('keyup', (e) => {
    let content = e.target.value;

    if(rows.length > 0) {
        rows.forEach(row => {
            row.classList.add('d-none');
            if(row.textContent.includes(content)) {
                row.classList.remove("d-none");
            }
        });
    }
});
