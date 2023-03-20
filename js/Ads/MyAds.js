(function(app) {
    app.myAdsList = {
        draw: function() {
            createAdsList();
            createAddButton();
            createMyAds();
        }
    }

    async function createMyAds() { // Создание списка объявлений полученных с сервера
        try {
            let response = await fetch("php/ads.php?user_id=N", {
                method: "GET"
            });
            let json = await response.json();
            
            if (json != "false") {
                for(let i = 0; i < json.length; i++) {
                    let arr = json[i];
        
                    createAd(i, arr.id, arr.picture, arr.title, arr.discription, arr.price);
                }
    
                let buttonDelete = document.querySelectorAll(".buttonDelete");
                let buttonUpdate = document.querySelectorAll(".buttonChange");
                
                for(let i = 0; i < buttonDelete.length; i++){
                    buttonDelete[i].addEventListener("click", showPopupDelete);
                    buttonUpdate[i].addEventListener("click", goToUpdatePage);
                }
            } else {
                emptyAdsList();
            }
        }
        catch (e) {
            showPopup("Упс, что-то пошло не так! Ошибка: " + e.name.value);
        }
    }

    async function deleteAd(targetIdName) {
        let id = document.getElementById("id" + targetIdName.slice(-1));
        
        let response = await fetch("php/ads.php?id=" + id.textContent, {
            method: "DELETE"
        });
        let answer = await response.json();

        if (answer == "true") {
            hidePopupDelete();
            showPopupDeleted("Объявление " + document.getElementById("title" + targetIdName.slice(-1)).textContent + " удалено");
        } else {
            showPopupDeleted("Упс... что-то пошло не так!");
        }
    }

    function createAd(i, id, picture, titleValue, discriptionValue, price) {
        let content       = document.querySelector(".myAdsList");
        let adBox         = addElement("div", "adBox", i, content);
        let adPicture     = addElement("img", "myAdImg", i, adBox);
        adPicture.src     = picture;
        let detailBox     = addElement("div", "detail", i, adBox);
        let idText        = createText("id", i, id);
        detailBox.append(idText);

        let adInformationBox       = addElement("div", "adInfo", i, detailBox);
        let titleAndDiscriptionBox = addElement("div", "titleAndDiscription", i, adInformationBox);
        let title                  = createText("title", i, titleValue);
        titleAndDiscriptionBox.append(title);
        let discription            = createText("discription", i, discriptionValue);
        titleAndDiscriptionBox.append(discription);

        let adPriceBox    = addElement("div", "adPrice", i, adInformationBox);
        let priceValue    = createText("priceValue", i, formattingPriceValue(price));
        adPriceBox.append(priceValue);
        let currencyValue = "₽";
        let currency      = createText("currency", i, currencyValue);
        adPriceBox.append(currency);

        let buttonsBox    = addElement("div", "buttons", i, detailBox);
        createButton("buttonChange", "buttonChange", i, "Изменить", buttonsBox);
        createButton("buttonDelete", "buttonDelete", i, "Удалить", buttonsBox);
    }

    function showPopupDelete() {
        let content       = document.querySelector(".myAdsList");
        let popupBox      = addElement("div", "popupBoxShow", "", content);
        let targetIdName  = `${this.id}`;
        let text          = "Вы действительно хотите удалить объявление " + document.getElementById("title" + targetIdName.slice(-1)).textContent + " ?";
        let popupText     = createText("popupText", "", text);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox", "", popupBox);
        let buttonAccept   = createButton("popupButtonYes", "popupButton", "", "Да", buttonPopupBox);
        let buttonReject   = createButton("popupButtonNo", "popupButton", "", "Нет", buttonPopupBox);

        buttonReject.addEventListener("click", hidePopupDelete);
        buttonAccept.addEventListener("click", function() {
            deleteAd(targetIdName);
        });
    }

    function hidePopupDelete() {
        document.querySelector(".popupBoxShow").parentNode.removeChild(document.querySelector(".popupBoxShow"));
    }

    function showPopupDeleted(textValue) {
        let content       = document.querySelector(".myAdsList");
        let popupBox      = addElement("div", "popupBoxShow", "", content);
        let popupText     = createText("popupText", "", textValue);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox", "", popupBox);
        let buttonAccept   = createButton("popupButtonYes", "popupButton", "", "OK", buttonPopupBox);

        buttonAccept.addEventListener("click", goToMyAdsList);
    }

    function showPopup(textValue) {
        let content       = document.querySelector(".myAdsList");
        let popupBox      = addElement("div", "popupBoxShow", "", content);
        let popupText     = createText("popupText", "", textValue);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox", "", popupBox);
        let buttonAccept   = createButton("popupButtonYes", "popupButton", "", "OK", buttonPopupBox);

        buttonAccept.addEventListener("click", goToAdsList);
    }

    function emptyAdsList() {
        let content       = document.querySelector(".myAdsList");
        let description   = createText("emptyMyAdsListText", "", "У вас пока нет объявлений");
        content.append(description);
    }

    function createAddButton() {
        let addButtonBox = addElement("div", "addButton", "", document.querySelector(".adsList"));
        let addButton    = createButton("addButton", "myAdButton", "", "Добавить", addButtonBox);

        addButton.addEventListener("click", goToCreateAd);
    }

    function formattingPriceValue(priceValue) { // Форматирование чисел: добавить пробелы между разрядами до точки или запятой
        priceValue = priceValue.toString();
        let formattingPrice  = priceValue.match(/^(.*?)((?:[,.]\d+)?|)$/);
        if (formattingPrice) {
            let formattingPriceValue = formattingPrice[1].replace(/\B(?=(?:\d{3})*$)/g, ' ') + formattingPrice[2];
            return formattingPriceValue;
        } else {
            return formattingPrice;
        }
    }

    function createAdsList(){
        let content = document.createElement("div");
        content.classList.add("myAdsList", "adsList", "container");
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

    function createButton(id, className, i, text, whereToAdd) {
        let button = document.createElement("button");
        button.id = id + i;
        button.classList.add(className);
        button.append(document.createTextNode(text));
        whereToAdd.append(button);

        return button;
    }

    function goToMyAdsList() {
        document.querySelector(".adsList").parentNode.removeChild(document.querySelector(".adsList"));
        app.myAdsList.draw();
    }

    function goToCreateAd() {
        document.querySelector(".container").parentNode.removeChild(document.querySelector(".container"));
        app.createAd.draw();
    }

    function goToUpdatePage() {
        let targetIdName = `${this.id}`;
        let id           = document.getElementById("id" + targetIdName.slice(-1)).textContent;
        let title        = document.getElementById("title" + targetIdName.slice(-1)).textContent;
        let description  = document.getElementById("discription" + targetIdName.slice(-1)).textContent;
        let price        = document.getElementById("priceValue" + targetIdName.slice(-1)).textContent;
        let picture      = document.getElementById("myAdImg" + targetIdName.slice(-1)).src;
        
        document.querySelector(".container").parentNode.removeChild(document.querySelector(".container"));
        app.updateAd.draw(id, title, description, price, picture);
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