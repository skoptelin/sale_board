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
    
            for(let i = 0; i < json.length; i++) {
                let arr = json[i];
    
                createAd(i, arr.picture, arr.title, arr.discription, arr.price);
            }
    
        }
        catch (e) {
            alert("Упс, что-то пошло не так! Ошибка: " + e.name.value);
        }
        
    }

    function createAd(i, picture, titleValue, discriptionValue, price) {
        
        let content       = document.querySelector(".myAdsList");

        let adBox         = addElement("div", "adBox", i, content);

        let adImg         = addElement("img", "myAdImg", i, adBox);
        adImg.src         = picture;

        let detail        = addElement("div", "detail", i, adBox);
        let adInfo        = addElement("div", "adInfo", i, detail);
        let titleAndDiscr = addElement("div", "titleAndDiscription", i, adInfo);
        let title         = createText("title", i, titleValue);
        titleAndDiscr.append(title);
        let discription   = createText("discription", i, discriptionValue);
        titleAndDiscr.append(discription);

        let adPrice       = addElement("div", "adPrice", i, adInfo);
        let priceValue    = createText("priceValue", i, formattingNum(price)); /* price */
        adPrice.append(priceValue);
        let currencyValue = "₽";
        let currency      = createText("currency", i, currencyValue);
        adPrice.append(currency);

        let buttons = addElement("div", "buttons", i, detail);
        let buttonChange = createButton("buttonChange", i, "Изменить", buttons);
        let buttonDelete = createButton("buttonDelete", i, "Удалить", buttons);
    }

    function createAddButton() {
        let addButtonBox = addElement("div", "addButton", "", document.querySelector(".adsList"));
        createButton("addButton", "", "Добавить", addButtonBox);
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

    function createButton(id, i, text, whereToAdd) {
        let button = document.createElement("button");
        button.id = id + i;
        button.classList.add("myAdButton");
        button.append(document.createTextNode(text));
        whereToAdd.append(button);

        return button;
    }

})(SaleBoard);