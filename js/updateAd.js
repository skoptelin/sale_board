(function(app) {
    app.updateAd = {
        draw: function(id, title, description, price, picture) {
            createContent();
            createAdPage(id, title, description, price, picture);

        }
    }

    async function updateAd(id) { // Обновление объявления

        //Через formdata
        let ad = new FormData();
        ad.set("id", id);
        ad.set("title", (document.getElementById("titleUpdateAd").value));
        ad.set("discription", (document.getElementById("descriptionUpdateAd").value));
        ad.set("price", (document.getElementById("priceUpdateAd").value));
        ad.set("picture", (document.getElementById("inputUpload").files[0]));
        ad.set("method", "PUT");

        console.log(ad);

        let update = await fetch("php/ads.php", {
            method: "POST",
            body: ad
        });
        let response = await update.json();

        //Через json - работает, кроме картинки
       /*  let ad = {
            id: id,
            title: document.getElementById("titleUpdateAd").value,
            discription: document.getElementById("descriptionUpdateAd").value,
            price: document.getElementById("priceUpdateAd").value
        };
        console.log(ad);

        let update = await fetch("php/ads.php", {
            method: "PUT",
            headers: {
                'Content-Type': 'application/json;charset=utf-8;'
              },
            body: JSON.stringify(ad)
        });
        let response = await update.json();

        //Через json - картинка
        let adImg = {
            picture: document.getElementById("inputUpload").files[0]
        }

        console.log(adImg);

        let updateImg = await fetch("php/ads.php", {
            method: "PUT",
            headers: {
                'Content-Type': 'application/json;image;'
              },
            body: JSON.stringify(adImg)
        });
        let responseImg = await updateImg.json(); */

        //Через formdata - картинка
        /* let adImg = new FormData();
        adImg.set("picture", (document.getElementById("inputUpload").files[0]));

        console.log(adImg);

        let updateImg = await fetch("php/ads.php", {
            method: "PUT",
            body: adImg
        });
        let responseImg = await updateImg.json(); */

        //Через blob - картинка
        /* let adImg = document.getElementById("inputUpload").files[0]
        let blob = new Blob([adImg], {type: "image/png"});

        let response = await fetch("php/ads.php", {
            method: 'PUT',
            body: blob
        });
        let responseImg = await response.json(); */

        /* if (response == "true" && responseImg == "true") {
            alert("Объявление " + document.getElementById("titleUpdateAd").value + " обновлено");
            goToMyAdsList();
        } else if (response == "false" || responseImg == "false") {
            alert("Заполните обязательные поля: название, описание, цена");
        } */

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

        buttonOk.addEventListener("click", hidePopupUpdate);
    }

    function hidePopupUpdate() {
        document.querySelector(".popupBoxShow").parentNode.removeChild(document.querySelector(".popupBoxShow"));
    }

    function createAdPage(id, title, description, price, picture) {
        let content          = document.querySelector(".container");
        let inputList        = addElement("div", "inputList");
        let inputTitle       = createInput("titleUpdateAd", "titleUpdateAd", "Название:");
        let inputDescription = createTextArea("descriptionUpdateAd", "descriptionUpdateAd", "Описание:");
        let inputPrice       = createInput("priceUpdateAd", "priceUpdateAd", "Цена:");
        let uploadBox        = addElement("div", "uploadBox");
        let imgUploadBox     = addElement("div", "imgUploadBox");
        let Img              = addElement("img", "hideImgUpdateAd");
        let labelInputUpload = addElement("label", "inputUploadLabel");
        labelInputUpload.setAttribute("for","inputUpload");

        let labelText        = document.createTextNode("Загрузить фото");
        labelInputUpload.append(labelText);
        
        let inputUpload      = createInputButton("inputUpload", "file");
        let buttonSave       = createButton("buttonSave", "Сохранить");

        content.append(inputList);
        inputList.append(inputTitle, inputDescription, inputPrice);
        content.append(uploadBox);
        uploadBox.append(imgUploadBox, buttonSave);
        imgUploadBox.append(Img, labelInputUpload, inputUpload);

        let titleValue       = document.getElementById("titleUpdateAd");
        let descriptionValue = document.getElementById("descriptionUpdateAd");
        let priceValue       = document.getElementById("priceUpdateAd");
        let pictureValue     = document.getElementById("hideImgUpdateAd");

        titleValue.value       = title;
        descriptionValue.value = description;
        priceValue.value       = deleteSpace(price);
        pictureValue.src       = picture;

        showAdImg();

        inputUpload.addEventListener("change", previewFile);
        buttonSave.addEventListener("click", function() {
            updateAd(id);
        });
    }

    function showAdImg() {
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