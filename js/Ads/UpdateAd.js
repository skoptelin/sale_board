(function(app) {
    app.updateAd = {
        draw: function(id, title, description, price, picture) {
            createContent();
            createAdPage(id, title, description, price, picture);
        }
    }

    async function updateAd(id) { // Обновление объявления
        let ad = new FormData();
        ad.set("id", id);
        ad.set("title", (document.getElementById("titleUpdateAd").value));
        ad.set("discription", (document.getElementById("descriptionUpdateAd").value));
        ad.set("price", (document.getElementById("priceUpdateAd").value));
        ad.set("picture", (document.getElementById("inputUpload").files[0]));
        ad.set("method", "PUT");

        let update = await fetch("php/ads.php", {
            method: "POST",
            body: ad
        });
        let response = await update.json();

        if (response == "true") {
            showPopupUpdate("Объявление " + document.getElementById("titleUpdateAd").value + " обновлено");
        } else if (response == "false") {
            showPopupNotice("Заполните обязательные поля: название, описание, цена");
        }
    }

    function showPopupUpdate(textValue) {
        let content       = document.querySelector(".container");
        let popupBox      = addElement("div", "popupBoxShow");
        content.append(popupBox);
        let popupText     = createText("popupText", textValue);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox");
        popupBox.append(buttonPopupBox);
        let buttonAccept   = createButton("popupButtonOk", "OK");
        buttonPopupBox.append(buttonAccept);

        buttonAccept.addEventListener("click", function(){
            hidePopup();
            goToMyAdsList();
        });
    }

    function showPopupNotice(textValue) {
        let content       = document.querySelector(".container");
        let popupBox      = addElement("div", "popupBoxShow");
        content.append(popupBox);
        let popupText     = createText("popupText", textValue);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox");
        popupBox.append(buttonPopupBox);
        let buttonAccept   = createButton("popupButtonOk", "OK");
        buttonPopupBox.append(buttonAccept);

        buttonAccept.addEventListener("click", hidePopup);
    }

    function hidePopup() {
        document.querySelector(".popupBoxShow").parentNode.removeChild(document.querySelector(".popupBoxShow"));
    }

    function createAdPage(id, title, description, price, picture) {
        let content          = document.querySelector(".container");
        let inputList        = addElement("div", "inputList");
        let inputTitle       = createInput("titleUpdateAd", "titleUpdateAd", "Название:");
        let inputDescription = createTextArea("descriptionUpdateAd", "descriptionUpdateAd", "Описание:");
        let inputPrice       = createInput("priceUpdateAd", "priceUpdateAd", "Цена:");
        let uploadBox        = addElement("div", "uploadBox");
        let pictureUploadBox = addElement("div", "imgUploadBox");
        let pictureBox       = addElement("img", "hideImgUpdateAd");
        let labelInputUpload = addElement("label", "inputUploadLabel");
        labelInputUpload.setAttribute("for","inputUpload");

        let labelText        = document.createTextNode("Загрузить фото");
        labelInputUpload.append(labelText);
        
        let inputUpload      = createInputButton("inputUpload", "file");
        let buttonSave       = createButton("buttonSave", "Сохранить");

        content.append(inputList);
        inputList.append(inputTitle, inputDescription, inputPrice);
        content.append(uploadBox);
        uploadBox.append(pictureUploadBox, buttonSave);
        pictureUploadBox.append(pictureBox, labelInputUpload, inputUpload);

        let titleValue       = document.getElementById("titleUpdateAd");
        let descriptionValue = document.getElementById("descriptionUpdateAd");
        let priceValue       = document.getElementById("priceUpdateAd");
        let pictureValue     = document.getElementById("hideImgUpdateAd");

        titleValue.value       = title;
        descriptionValue.value = description;
        priceValue.value       = deleteSpace(price);
        pictureValue.src       = picture;

        showAdPicture();

        inputUpload.addEventListener("change", previewFile);
        buttonSave.addEventListener("click", function() {
            updateAd(id);
        });
    }

    function showAdPicture() {
        let pictureValue = document.getElementById("hideImgUpdateAd");
        if (pictureValue.src != "") {
            pictureValue.classList.remove("hideImgUpdateAd");
            pictureValue.classList.add("imgUpdateAd");
        }
    }

    function createContent(){
        let content = document.createElement("div");
        content.classList.add("container");
        document.body.append(content);
    }

    function addElement(elementName, className) {
        let element = document.createElement(elementName);
        element.classList.add(className);
        element.id = className;

        return element;
    }
    
    function createText(className, textValue) {
        let text = document.createElement("div");
        text.classList.add(className);
        text.append(document.createTextNode(textValue));

        return text;
    }
    
    function createInput(className, id, textValue) {
        let input = document.createElement("div");
        input.classList.add(className);

        let inputText = createText(className + "Text", textValue);
        input.append(inputText);

        let inputCreate = document.createElement("input");
        inputCreate.id = id;
        inputCreate.classList.add(className + "Input");
        input.append(inputCreate);

        return input;
    }

    function createTextArea(className, id, textValue) {
        let input = document.createElement("div");
        input.classList.add(className);

        let inputText = createText(className + "Text", textValue);
        input.append(inputText);

        let inputCreate = document.createElement("textarea");
        inputCreate.id = id;
        inputCreate.classList.add(className + "Input");
        input.append(inputCreate);

        return input;
    }

    function createInputButton(className, type) {
        let inputCreate = document.createElement("input");
        inputCreate.id = className;
        inputCreate.classList.add(className);
        inputCreate.type = type;
        inputCreate.name = className;

        return inputCreate;
    }

    function createButton(id, text) {
        let button = document.createElement("button");
        button.id = id;
        button.classList.add("buttonSave");
        button.append(document.createTextNode(text));
        return button;
    }

    function goToMyAdsList() {
        document.querySelector(".container").parentNode.removeChild(document.querySelector(".container"));
        app.myAdsList.draw();
    }

    function previewFile() {
        let preview = document.querySelector('img');
        let file    = document.querySelector('input[type=file]').files[0];
        let reader  = new FileReader();
      
        reader.onloadend = function () {
          preview.src = reader.result;
        }
      
        if (file) {
          reader.readAsDataURL(file);
          let pictureValue = document.getElementById("hideImgUpdateAd");
            if (pictureValue.src != "") {
                preview.classList.remove("hideImgUpdateAd");
                preview.classList.add("imgUpdateAd");
            }
        } else {
          preview.src = "";
        }
    }

    function deleteSpace(str) {
        let array = str.split(" ").join("");
        return array;
    }

})(SaleBoard);