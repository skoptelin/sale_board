(function(app) {
    app.regPage = {
        draw: function() {
            createRegPage();
        }
    }

    async function createUser() { // Создание юзера

        let user = new FormData();
        user.set("name", document.getElementById("name").value);
        user.set("email", document.getElementById("email").value);
        user.set("phone_num", document.getElementById("phone_num").value);
        user.set("password", document.getElementById("password").value);

        try {
            let create = await fetch("php/users.php", {
                method: "POST",
                body: user
            });
            let response = await create.json();
    
            if (response == "true") {
                showPopupUserCreate("Пользователь " + document.getElementById("name").value + " создан");
            } else {
                let message = JSON.stringify(response);
                showPopup(message);
            }
        } catch (error) {
            showPopup("Упс, что-то пошло не так! Ошибка: " + error.name.value);
        }
    }

    function minInputPasswordValue() {
        let password          = document.getElementById("password");
        let minPasswordLenght = 8;
        if (password.value.length < minPasswordLenght) {
            showPopup("Пароль слишком короткий");      
        } else {
            applyPassword();
        }
        
    }

    function applyPassword() {
        let password      = document.getElementById("password");
        let applyPassword = document.getElementById("applyPassword");
        if(password.value == applyPassword.value) {
            createUser();
        } else {
            showPopup("Подтверждение не совпадает с паролем");
        }
    }

    function createRegPage() {
        let content            = createContent();
        let pageTitleText      = createText("regText", "Регистрация");
        let inputEmail         = createInput("inputText", "email", "E-mail");
        let inputName          = createInput("inputText", "name", "Имя");
        let inputPhoneNumber   = createInput("inputText", "phone_num", "Телефон");
        let inputPassword      = createInput("inputText", "password", "Пароль");
        let inputApplyPassword = createInput("inputText", "applyPassword", "Подтверждение пароля");
        let registerButton     = createButton("reg", "Зарегистрироваться");
        let loginButton        = createButton("login", "Войти");

        content.append(pageTitleText, inputEmail, inputName, inputPhoneNumber, inputPassword, inputApplyPassword, registerButton, loginButton);

        let password       = document.getElementById("password");
        let applyPassword  = document.getElementById("applyPassword");
        let phoneNumber    = document.getElementById("phone_num");
        password.type      = "password";
        applyPassword.type = "password";

        //Действие при нажатии на кнопку Войти
        loginButton.addEventListener("click", goToLogin);

        //Действие при нажатии на кнопку Зарегистрироваться
        registerButton.addEventListener("click", minInputPasswordValue);

        //Действие при получении фокуса на инпут телефона
        phoneNumber.addEventListener("focus", createTelPrefix);
    }

    function showPopupUserCreate(textValue) {
        let content        = document.querySelector(".content");
        let popupBox       = addElement("div", "popupBoxShow");
        content.append(popupBox);
        let popupText      = createText("popupText", textValue);
        popupBox.append(popupText);
        let buttonPopupBox = addElement("div", "buttonPopupBox");
        popupBox.append(buttonPopupBox);
        let buttonAccept   = createButton("popupButtonOk", "OK");
        buttonPopupBox.append(buttonAccept);

        buttonAccept.addEventListener("click", function() {
            hidePopup();
            goToLogin();
        });
    }

    function showPopup(textValue) {
        let content       = document.querySelector(".content");
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

    function addElement(elementName, className) {
        let element = document.createElement(elementName);
        element.classList.add(className);
        element.id = className;

        return element;
    }

    function createContent(){
        let content = document.createElement("div");
        content.classList.add("content");
        document.body.append(content);

        return content;
    }

    function createText(className, textValue) {
        let text = document.createElement("div");
        text.classList.add(className);
        text.append(document.createTextNode(textValue));

        return text;
    }
    
    function createInput(className, id, textValue) {
        let input = document.createElement("div");

        let inputCreate = document.createElement("input");
        inputCreate.id = id;
        input.append(inputCreate);

        let inputText = createText(className, textValue);
        input.append(inputText);

        return input;
    }

    function createButton(id, text) {
        let button = document.createElement("button");
        button.id = id;
        button.append(document.createTextNode(text));
        return button;
    }

    function createTelPrefix() {
        document.getElementById("phone_num").value = "+7";
    }

    function goToLogin() {
        document.querySelector(".content").parentNode.removeChild(document.querySelector(".content"));
        app.loginPage.draw();
    }
})(SaleBoard);