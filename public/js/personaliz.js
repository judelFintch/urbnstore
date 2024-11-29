function changeLanguage(select) {
    const selectedLanguage = select.value;
    window.location.href = `/change-language/${selectedLanguage}`;
}

function changeCurrency(select) {
    const selectedCurrency = select.value;
    fetch(`/change-currency/${selectedCurrency}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    }).then(() => location.reload());
}

document.getElementById('hamburger-menu').addEventListener('click', function () {
    const menuMobile = document.getElementById('menu-mobile');
    menuMobile.classList.toggle('show');
});
document.getElementById('hamburger-menu').addEventListener('click', function () {
    const menuMobile = document.getElementById('menu-mobile');
    menuMobile.classList.toggle('show');
});
