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
            alert("Упс, что-то пошло не так! Ошибка: " + e.name.value);
        }
        
    }

    async function deleteAd(str) {
        /* let str = `${this.id}`; */
        let id = document.getElementById("id" + str.slice(-1));
        
        let response = await fetch("php/ads.php?id=" + id.textContent, {
            method: "DELETE"
        });
        let answer = await response.json();

        if (answer == "true") {
            alert("Объявление " + document.getElementById("title" + str.slice(-1)).textContent + " удалено");
            goToMyAdsList();    
        } else {
            alert("Error");
        }

    }

    function createAd(i, id, picture, titleValue, discriptionValue, price) {
        
        let content       = document.querySelector(".myAdsList");

        let adBox         = addElement("div", "adBox", i, content);

        let adImg         = addElement("img", "myAdImg", i, adBox);
        adImg.src         = picture;

        let detail        = addElement("div", "detail", i, adBox);

        let idText        = createText("id", i, id);
        detail.append(idText);

        let adInfo        = addElement("div", "adInfo", i, detail);
        let titleAndDiscr = addElement("div", "titleAndDiscription", i, adInfo);
        let title         = createText("title", i, titleValue);
        titleAndDiscr.append(title);
        let discription   = createText("discription", i, discriptionValue);
        titleAndDiscr.append(discription);

        let adPrice       = addElement("div", "adPrice", i, adInfo);
        let priceValue    = createText("priceValue", i, formattingNum(price));
        adPrice.append(priceValue);
        let currencyValue = "₽";
        let currency      = createText("currency", i, currencyValue);
        adPrice.append(currency);

        let buttons = addElement("div", "buttons", i, detail);
        let buttonChange = createButton("buttonChange", "buttonChange", i, "Изменить", buttons);
        let buttonDelete = createButton("buttonDelete", "buttonDelete", i, "Удалить", buttons);
    }

    function showPopupDelete() {
        let content       = document.querySelector(".myAdsList");
        let popupBox      = addElement("div", "popupBoxShow", "", content);
        let str           = `${this.id}`;
        let text          = "Вы действительно хотите удалить объявление " + document.getElementById("title" + str.slice(-1)).textContent + " ?";
        let popupText     = createText("popupText", "", text);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox", "", popupBox);
        let buttonYes      = createButton("popupButtonYes", "popupButton", "", "Да", buttonPopupBox);
        let buttonNo       = createButton("popupButtonNo", "popupButton", "", "Нет", buttonPopupBox);

        buttonNo.addEventListener("click", hidePopupDelete);
        buttonYes.addEventListener("click", function() {
            deleteAd(str);
        });
    }

    function hidePopupDelete() {
        document.querySelector(".popupBoxShow").parentNode.removeChild(document.querySelector(".popupBoxShow"));
    }

    function emptyAdsList() {
        let content       = document.querySelector(".myAdsList");
        let description   = createText("emptyMyAdsListText", "", "У вас пока нет объявлений");
        content.append(description);
    }

    function createAddButton() {
        let addButtonBox = addElement("div", "addButton", "", document.querySelector(".adsList"));
        let addButton = createButton("addButton", "myAdButton", "", "Добавить", addButtonBox);

        addButton.addEventListener("click", goToCreateAd);
    }

    function formattingNum(numValue) { // Форматирование чисел: добавить пробелы между разрядами до точки или запятой
        numValue = numValue.toString();
        let num = numValue.match(/^(.*?)((?:[,.]\d+)?|)$/);
        if (num) {
            let formattingNum = num[1].replace(/\B(?=(?:\d{3})*$)/g, ' ') + num[2];
            return formattingNum;
        } else {
            return num;
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
        let str         = `${this.id}`;
        let id          = document.getElementById("id" + str.slice(-1)).textContent;
        let title       = document.getElementById("title" + str.slice(-1)).textContent;
        let description = document.getElementById("discription" + str.slice(-1)).textContent;
        let price       = document.getElementById("priceValue" + str.slice(-1)).textContent;
        let picture     = document.getElementById("myAdImg" + str.slice(-1)).src;
        
        document.querySelector(".container").parentNode.removeChild(document.querySelector(".container"));
        app.updateAd.draw(id, title, description, price, picture);
    }

})(SaleBoard);