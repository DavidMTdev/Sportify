
const burgerFunction = document.querySelector('.menu-burger img');
const login = document.querySelectorAll('.nav-menu a');
burgerFunction.addEventListener('click', addLoginBurger);

burgerFunction.addEventListener('click', cancelLogin);

burgerFunction.addEventListener('click', menuBurgerVisible);

function cancelLogin() {
    const nav = document.querySelector('.nav');

    const navLogin = document.querySelector('.nav-login');
    nav.removeChild(navLogin);

}

function addLoginBurger() {
    var addLogin = document.querySelector('.nav-menu');

    var liLogin = document.createElement('li');
    var login = document.querySelectorAll('.nav-menu li');

    if (login.length == 3) {
        addLogin.appendChild(liLogin);

        var login = document.querySelectorAll('.nav-menu li');

        var aLogin = document.createElement('a');
        aLogin.setAttribute('href', 'login.php');
        aLogin.innerText = 'Se connecter';

        var a = login.length - 1;

        login[a].appendChild(aLogin);
    }

}

count = 0
function menuBurgerVisible() {
    const burger = document.querySelector(".menu-burger");
    const navmenu = document.querySelector(".nav");

    if (count == 0) {
        burger.classList.add("nav-menu-visible")
        navmenu.classList.add("nav-visible")
        count += 1
    }
    else if (count == 1) {
        burger.classList.remove("nav-menu-visible")
        navmenu.classList.remove("nav-visible")
        count -= 1
    }
}

