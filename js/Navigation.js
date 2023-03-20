(function(app) {
    app.createNav = {
        draw: function() {
            createNav();
        }
    }

    function createNav() {
        let header           = document.querySelector(".header");

        let mobileNav        = addElement("div", "mobileNav", "", header);
        let burger           = addElement("div", "burger", "", mobileNav);

        let burgerButton     = document.createElement("button");
        burgerButton.classList.add("burgerButton");
        burger.append(burgerButton);

        let burgerLineTop    = document.createElement("div");
        burgerLineTop.classList.add("burgerLine");
        burgerButton.append(burgerLineTop);

        let burgerLineMiddle = document.createElement("div");
        burgerLineMiddle.classList.add("burgerLine");
        burgerButton.append(burgerLineMiddle);

        let burgerLineBottom = document.createElement("div");
        burgerLineBottom.classList.add("burgerLine");
        burgerButton.append(burgerLineBottom);

        let navList          = addElement("nav", "navList", "", mobileNav);
        document.querySelector(".navList").classList.add("showNavList");

        let navItemAllAds = createLink("navItemSelected", "navItemAllAds", "Лента", navList);
        let navItemMyAds  = createLink("navItem", "navItemMyAds", "Мои объявления", navList);
        let navItemExit   = createLink("navItem", "navItemExit", "Выход", navList);

        navItemAllAds.addEventListener("click", goToAdsList);
        navItemAllAds.addEventListener("click", showHideNav);

        navItemMyAds.addEventListener("click", goToMyAdsList);
        navItemMyAds.addEventListener("click", showHideNav);

        navItemExit.addEventListener("click", showPopupLogout);
        
        burgerButton.addEventListener("click", showHideNav);
    }

    function showPopupLogout() {
        let content       = document.querySelector(".container");
        let popupBox      = addElement("div", "popupBoxShow", "", content);
        let text          = "Вы действительно хотите выйти из профиля?";
        let popupText     = createText("popupText", "", text);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox", "", popupBox);
        let buttonAccept   = createButton("popupButtonAccept", "popupButton", "", "Да", buttonPopupBox);
        let buttonReject   = createButton("popupButtonNo", "popupButton", "", "Нет", buttonPopupBox);

        buttonReject.addEventListener("click", hidePopupDelete);
        buttonAccept.addEventListener("click", logout);
    }

    function hidePopupDelete() {
        document.querySelector(".popupBoxShow").parentNode.removeChild(document.querySelector(".popupBoxShow"));
    }

    async function logout() {
        try {
            await fetch("php/Classes/Auth/Logout.php");
            document.querySelector(".header").parentNode.removeChild(document.querySelector(".header"));
            document.querySelector(".container").parentNode.removeChild(document.querySelector(".container"));
            app.Header.draw();
            app.loginPage.draw();
        } catch (error) {
            showPopup("Упс, что-то пошло не так! Ошибка: " + error.name.value);
        }
        
    }

    function showPopup(textValue) {
        let content       = document.querySelector(".container");
        let popupBox      = addElement("div", "popupBoxShow", "", content);
        let popupText     = createText("popupText", "", textValue);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox", "", popupBox);
        let buttonAccept   = createButton("popupButtonOk", "popupButtonOk", "", "OK", buttonPopupBox);

        buttonAccept.addEventListener("click", hidePopup);
    }

    function hidePopup() {
        document.querySelector(".popupBoxShow").parentNode.removeChild(document.querySelector(".popupBoxShow"));
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

    function createText(className, i, textValue) {
        let text = document.createElement("div");
        text.classList.add(className);
        text.id = className + i;
        text.append(document.createTextNode(textValue));

        return text;
    }

    function createButton(id, className, i, text, whereToAdd) {
        let button = document.createElement("button");
        button.id = id + i;
        button.classList.add(className);
        button.append(document.createTextNode(text));
        whereToAdd.append(button);

        return button;
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