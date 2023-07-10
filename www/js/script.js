const theme = localStorage.getItem('theme');
const body = document.body;

function setTheme(newTheme) {
    switch (newTheme) {
        case "dark": 
            if(body.classList.contains('light')) {
                body.classList.add('dark')
                body.classList.remove('light')
                localStorage.setItem('theme', 'dark')
            }
            break;
        
        case "light":
            if(body.classList.contains('dark')) {
                body.classList.add('light')
                body.classList.remove('dark')
                localStorage.setItem('theme', 'light')
            }
    }
}

switch (theme) {
    case "dark":
        setTheme('dark')
        break;

    case "light":
        setTheme('light')
        break;

}

