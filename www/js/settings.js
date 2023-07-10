const lightButton = document.querySelector('.light-theme');
const darkButton = document.querySelector('.dark-theme');

darkButton.addEventListener('click', () => {
    setTheme('dark')
})

lightButton.addEventListener('click', () => {
    setTheme('light')
})