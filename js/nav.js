(function(app) {
    app.createNav = {
        draw: function() {
                createNav();
        }
    }

    function createNav() {
        let header        = document.querySelector(".header");

        let mobileNav     = addElement("div", "mobileNav", "", header);
        let burger        = addElement("div", "burger", "", mobileNav);

        let burgerButton  = document.createElement("button");
        burgerButton.classList.add("burgerButton");
        burger.append(burgerButton);

        let burgerLine1   = document.createElement("div");
        burgerLine1.classList.add("burgerLine");
        burgerButton.append(burgerLine1);

        let burgerLine2   = document.createElement("div");
        burgerLine2.classList.add("burgerLine");
        burgerButton.append(burgerLine2);

        let burgerLine3   = document.createElement("div");
        burgerLine3.classList.add("burgerLine");
        burgerButton.append(burgerLine3);

        let navList       = addElement("nav", "navList", "", mobileNav);
        document.querySelector(".navList").classList.add("showNavList");

        let navItemAllAds = createLink("navItem", "navItemAllAds", "Лента", navList);
        let navItemMyAds  = createLink("navItem", "navItemMyAds", "Мои объявления", navList);
        let navItemExit   = createLink("navItem", "navItemExit", "Выход", navList);

        navItemAllAds.addEventListener("click", goToAdsList);
        navItemAllAds.addEventListener("click", showHideNav);
        navItemMyAds.addEventListener("click", goToMyAdsList);
        navItemMyAds.addEventListener("click", showHideNav);
        navItemExit.addEventListener("click", logout);
        burgerButton.addEventListener("click", showHideNav);
    }

    async function logout() {
        await fetch("php/logout.php");
        document.querySelector(".header").parentNode.removeChild(document.querySelector(".header"));
        document.querySelector(".container").parentNode.removeChild(document.querySelector(".container"));
        app.Header.draw();
        app.loginPage.draw();
    }

    function showHideNav() {
        let showBurgerMenu = document.querySelector(".showNavList");
        showBurgerMenu.classList.toggle("navList");
    }

    function addElement(elementName, className, i, whereToAdd) {
        let element = document.createElement(elementName);
        element.classList.add(className);
        element.id = className + i;
        whereToAdd.append(element);

        return element;
    }

    function createLink(className, id, textValue, whereToAdd) {
        let link = document.createElement("a");
        link.classList.add(className);
        link.id = id;
        link.append(document.createTextNode(textValue));
        whereToAdd.append(link);

        return link;
    }

    function goToAdsList() {
        document.querySelector(".container").parentNode.removeChild(document.querySelector(".container"));
        app.adsList.draw();
        let adsList = document.getElementById("navItemAllAds");
        let myAdsList = document.getElementById("navItemMyAds");
            adsList.classList.remove("navItem");
            adsList.classList.add("navItemSelected");

        if(myAdsList.classList == "navItemSelected") {
            myAdsList.classList.remove("navItemSelected");
            myAdsList.classList.add("navItem");
        }
    }

    function goToMyAdsList() {
        document.querySelector(".container").parentNode.removeChild(document.querySelector(".container"));
        app.myAdsList.draw();
        let myAdsList = document.getElementById("navItemMyAds");
        let adsList = document.getElementById("navItemAllAds");
        myAdsList.classList.remove("navItem");
        myAdsList.classList.add("navItemSelected");

        if(adsList.classList == "navItemSelected") {
            adsList.classList.remove("navItemSelected");
            adsList.classList.add("navItem");
        }

    }

})(SaleBoard);