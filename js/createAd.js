(function(app) {
    app.createAd = {
        draw: function() {
            createContent();
            createAdPage();

        }
    }

    async function createAd() { // Создание объявления

        let ad = new FormData();
        ad.set("title", document.getElementById("titleCreateAd").value);
        ad.set("discription", document.getElementById("descriptionCreateAd").value);
        ad.set("price", document.getElementById("priceCreateAd").value);
        ad.set("picture", document.getElementById("inputUpload").files[0]);
        ad.set("method", "POST");

        let create = await fetch("php/ads.php", {
            method: "POST",
            body: ad
        });
        let response = await create.json();

        if (response == "true") {
            showPopupCreate("Объявление " + document.getElementById("titleCreateAd").value + " создано");
        } else if (response == "false") {
            showPopupNotice("Заполните обязательные поля: название, описание, цена");
        }
        
    }

    function showPopupCreate(textValue) {
        let content       = document.querySelector(".container");
        let popupBox      = addElement("div", "popupBoxShow");
        content.append(popupBox);
        let popupText     = createText("popupText", textValue);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox");
        popupBox.append(buttonPopupBox);
        let buttonOk      = createButton("popupButtonOk", "OK");
        buttonPopupBox.append(buttonOk);

        buttonOk.addEventListener("click", function(){
            hidePopupUpdate();
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
        let buttonOk      = createButton("popupButtonOk", "OK");
        buttonPopupBox.append(buttonOk);

        buttonOk.addEventListener("click", function(){
            hidePopupUpdate();
        });
    }

    function hidePopupUpdate() {
        document.querySelector(".popupBoxShow").parentNode.removeChild(document.querySelector(".popupBoxShow"));
    }

    function createAdPage() {
        let content     = document.querySelector(".container");
        let inputList = addElement("div", "inputList");
        let inputTitle  = createInput("titleCreateAd", "titleCreateAd", "Название:");
        let inputDescription = createTextArea("descriptionCreateAd", "descriptionCreateAd", "Описание:");
        let inputPrice = createInput("priceCreateAd", "priceCreateAd", "Цена:");
        let uploadBox = addElement("div", "uploadBox");
        let imgUploadBox = addElement("div", "imgUploadBox");
        let Img = addElement("img", "hideImgCreateAd");
        let labelInputUpload = addElement("label", "inputUploadLabel");
        labelInputUpload.setAttribute("for","inputUpload");

        let labelText = document.createTextNode("Загрузить фото");
        labelInputUpload.append(labelText);
        
        let inputUpload = createInputButton("inputUpload", "file");
        let buttonSave = createButton("buttonSave", "Создать объявление");

        content.append(inputList);
        inputList.append(inputTitle, inputDescription, inputPrice);
        content.append(uploadBox);
        uploadBox.append(imgUploadBox, buttonSave);
        imgUploadBox.append(Img, labelInputUpload, inputUpload);

        inputUpload.addEventListener("change", previewFile);
        buttonSave.addEventListener("click", createAd);
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
          preview.classList.remove("hideImgCreateAd");
          preview.classList.add("imgCreateAd");
        } else {
          preview.src = "";
        }
      }

})(SaleBoard);