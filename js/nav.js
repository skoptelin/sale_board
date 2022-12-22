(function(app) {
    app.createNav = {
        draw: function() {
                createNav();
        }
    }

    function createNav() {
        let header = document.querySelector(".header");

        let mobileNav = addElement("div", "mobileNav", "", header);
        let burger = addElement("div", "burger", "", mobileNav);

        let burgerButton = document.createElement("button");
        burgerButton.classList.add("burgerButton");
        burger.append(burgerButton);

        let burgerLine1 = document.createElement("div");
        burgerLine1.classList.add("burgerLine");
        burgerButton.append(burgerLine1);

        let burgerLine2 = document.createElement("div");
        burgerLine2.classList.add("burgerLine");
        burgerButton.append(burgerLine2);

        let burgerLine3 = document.createElement("div");
        burgerLine3.classList.add("burgerLine");
        burgerButton.append(burgerLine3);

        let navList = addElement("nav", "navList", "", mobileNav);
        document.querySelector(".navList").classList.add("showNavList");

        let navItemAllAds = createLink("navItem", "Лента", navList);
        let navItemMyAds = createLink("navItem", "Мои объявления", navList);
        let navItemExit = createLink("navItem", "Выход", navList);

        navItemAllAds.addEventListener("click", goToAdsList);
        burgerButton.addEventListener("click", showHideNav);
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

    function createLink(className, textValue, whereToAdd) {
        let link = document.createElement("a");
        link.classList.add(className);
        link.append(document.createTextNode(textValue));
        whereToAdd.append(link);

        return link;
    }

    function goToAdsList() {
        document.querySelector(".adsList").parentNode.removeChild(document.querySelector(".adsList"));
        app.adsList.draw();
    }

})(SaleBoard);