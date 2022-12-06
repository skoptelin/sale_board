let SaleBoard = {};
addEventListener("DOMContentLoaded", function() {
    SaleBoard.Header.draw();
    SaleBoard.adsList.draw();
    

});


(function(app) {
    app.adsList = {
        draw: function() {
            createAdsList();
        }
    }

    function createAdsList() { // Создание списка объявлений полученных с сервера
    
        fetch("php/ads.php", {
            method: "GET"
        })
        .then(respose => respose.json())
        .then(jsonObject => {
            for(let i = 0; i < jsonObject.length; i++) {
                let arr = jsonObject[i];

                createAd(i);
                let adImg = document.getElementById("adImg" + i);
                let adTel = document.getElementById("adTel" + i);
                let title = document.getElementById("title" + i);
                let discription = document.getElementById("discription" + i);
                let salesmanValue = document.getElementById("salesmanValue" + i);
                let priceValue = document.getElementById("priceValue" + i);

                adImg.src = arr.picture;
                adTel.innerHTML = arr.phone_num;
                title.innerHTML = arr.title;
                discription.innerHTML = arr.discription;
                salesmanValue.innerHTML = arr.name;
                priceValue.innerHTML = formattingNum(arr.price);
            }

            let buttons = document.querySelectorAll(".adButton"); // Находим все кнопки на странице
            for(let i = 0; i < buttons.length; i++){ // Навешиваем на каждую кнопку EventListener для для показа номера телефона
                buttons[i].addEventListener('click', showTelNum);
            }
        })
        
    }

    function createAd(i) {

        let content = createContent();

        let adBox = addElement("div", "adBox", i, content);

        let fotoAndTel = addElement("div", "fotoAndTel", i, adBox);
        
        let adImg = addElement("img", "adImg", i, fotoAndTel);

        let adTel = addElement("div", "adTel", i, fotoAndTel);
        adTel.classList.add("adTelHidden");
     
        let adButton = createButton("adButton", i, "Показать телефон");
        fotoAndTel.append(adButton);

        let detail = addElement("div", "detail", i, adBox);

        let adInfo = addElement("div", "adInfo", i, detail);

        let titleAndDiscr = addElement("div", "titleAndDiscription", i, adInfo);

        let title = createText("title", i, "Lorem ipsum dolor sit amet");
        titleAndDiscr.append(title);

        let discription = createText("discription", i, "Lorem ipsum dolor sit amet consectetur adipisicing elit. In explicabo atque omnis facere veniam voluptatibus ipsa qui, libero perspiciatis aliquam illum numquam deleniti adipisci rerum modi fugit cumque fugiat laborum?");
        titleAndDiscr.append(discription);

        let adPrice = addElement("div", "adPrice", i, adInfo);

        let priceValue = createText("priceValue", i, "3000");
        adPrice.append(priceValue);

        let currency = createText("currency", i, "₽");
        adPrice.append(currency);

        let salesmanInfo = addElement("div", "salesmanInfo", i, detail);
        
        let salesmanTitle = createText("salesmanTitle", i, "Продавец: ");
        salesmanInfo.append(salesmanTitle);

        let salesmanValue = createText("salesmanValue", i, "Lorem, ipsum.");
        salesmanInfo.append(salesmanValue);
    }

    function showTelNum() {
        let str = `${this.id}`;
        document.getElementById(str).classList.add("adButtonHidden");
        document.getElementById("adTel" + str.slice(-1)).classList.remove("adTelHidden");
    }

    function formattingNum(numValue) { // Форматирование чисел: добавить пробелы между разрядами до точки или запятой
        let num = numValue.match(/^(.*?)((?:[,.]\d+)?|)$/);
        if (num) {
            let formattingNum = num[1].replace(/\B(?=(?:\d{3})*$)/g, ' ') + num[2];
            return formattingNum;
        } else {
            return num;
        }
    }

    function createContent(){
        let content = document.createElement("div");
        content.classList.add("adsList");
        document.body.append(content);

        return content;
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

})(SaleBoard);