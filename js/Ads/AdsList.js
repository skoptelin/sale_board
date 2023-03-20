(function(app) {
    app.adsList = {
        draw: function() {
            createContentContainer();
            createAdsList();
        }
    }

    async function createAdsList() { // Создание списка объявлений полученных с сервера
        try {
            let response = await fetch("php/ads.php", {
                method: "GET"
            });
            let json = await response.json();
    
            for(let i = 0; i < json.length; i++) {
                let arr = json[i];
    
                createAd(i, arr.picture, arr.phone_num, arr.title, arr.discription, arr.name, arr.price);
            }
    
            let buttons = document.querySelectorAll(".adButton"); // Находим все кнопки объявлений на странице
    
            for(let i = 0; i < buttons.length; i++){ // Навешиваем на каждую кнопку EventListener для для показа номера телефона
                buttons[i].addEventListener('click', showTelNum);
            }
        }
        catch (error) {
            showPopup("Упс, что-то пошло не так! Ошибка: " + error.name.value);
        }
        
    }

    function createAd(i, picture, phone_num, titleValue, discriptionValue, nameValue, price) {
        let content                 = document.querySelector(".adsList");

        let adBox                   = addElement("div", "adBox", i, content);

        let pictureAndTelephoneBox  = addElement("div", "fotoAndTel", i, adBox);

        let adPicture               = addElement("img", "adImg", i, pictureAndTelephoneBox);
        adPicture.src               = picture;

        let adTelephoneNumber       = addElement("div", "adTel", i, pictureAndTelephoneBox);
        adTelephoneNumber.classList.add("adTelHidden");
        adTelephoneNumber.innerHTML = phone_num;
     
        let adShowTelephoneButton   = createButton("adButton", i, "Показать телефон");
        pictureAndTelephoneBox.append(adShowTelephoneButton);

        let detailBox               = addElement("div", "detail", i, adBox);
        let adDetailInformation     = addElement("div", "adInfo", i, detailBox);
        let titleAndDiscription     = addElement("div", "titleAndDiscription", i, adDetailInformation);
        let title                   = createText("title", i, titleValue);
        titleAndDiscription.append(title);
        let discription             = createText("discription", i, discriptionValue);
        titleAndDiscription.append(discription);

        let adPriceBox              = addElement("div", "adPrice", i, adDetailInformation);
        let priceValue              = createText("priceValue", i, formattingPriceValue(price));
        adPriceBox.append(priceValue);
        let currencyValue           = "₽";
        let currency                = createText("currency", i, currencyValue);
        adPriceBox.append(currency);

        let salesmanInformationBox  = addElement("div", "salesmanInfo", i, detailBox);
        let salesmanTitle           = createText("salesmanTitle", i, "Продавец: ");
        salesmanInformationBox.append(salesmanTitle);
        let salesmanValue           = createText("salesmanValue", i, nameValue);
        salesmanInformationBox.append(salesmanValue);
    }

    function showPopup(textValue) {
        let content        = document.querySelector(".myAdsList");
        let popupBox       = addElement("div", "popupBoxShow", "", content);
        let popupText      = createText("popupText", "", textValue);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox", "", popupBox);
        let buttonAccept   = createButton("popupButtonYes", "popupButton", "", "OK", buttonPopupBox);

        buttonAccept.addEventListener("click", goToAdsList);
    }

    function showTelNum() {
        let targetIdName = `${this.id}`;
        document.getElementById(targetIdName).classList.add("adButtonHidden");
        let adTel = document.getElementById("adTel" + targetIdName.slice(-1));
        adTel.classList.remove("adTelHidden");
        if (adTel.textContent == "") {
            adTel.innerHTML = "№ телефона не указан";
        }
    }

    function formattingPriceValue(priceValue) { // Форматирование чисел: добавить пробелы между разрядами до точки или запятой
        priceValue = priceValue.toString();
        let formattingPrice = priceValue.match(/^(.*?)((?:[,.]\d+)?|)$/);
        if (formattingPrice) {
            let formattingPriceValue = formattingPrice[1].replace(/\B(?=(?:\d{3})*$)/g, ' ') + formattingPrice[2];
            return formattingPriceValue;
        } else {
            return formattingPrice;
        }
    }

    function createContentContainer(){
        let content = document.createElement("div");
        content.classList.add("adsList", "container");
        document.body.append(content);
    }

    function addElement(elementName, className, i, whereToAdd) {
        let element = document.createElement(elementName);
        element.classList.add(className);
        element.id = className + i;
        whereToAdd.append(element);

        return element;
    }

    function createText(className, i, textValue) {
        let text = document.createElement("div");
        text.classList.add(className);
        text.id = className + i;
        text.append(document.createTextNode(textValue));

        return text;
    }

    function createButton(id, i, text) {
        let button = document.createElement("button");
        button.id = id + i;
        button.classList.add("adButton");
        button.append(document.createTextNode(text));
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

})(SaleBoard);