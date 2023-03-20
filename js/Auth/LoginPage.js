(function(app) {
    app.loginPage = {
        draw: function() {
            createLoginPage();
        }
    }

    function createLoginPage() {
        let content        = createContent();
        let loginText      = createText("loginText", "Вход");
        let inputEmail     = createInput("inputText", "email", "E-mail");
        let inputPassword  = createInput("inputText", "password", "Пароль");
        let loginButton    = createButton("login", "Войти");
        let registerButton = createButton("reg", "Зарегистрироваться");
        
        content.append(loginText, inputEmail, inputPassword, loginButton, registerButton);

        let password    = document.getElementById("password");
        password.type   = "password";
        
        registerButton.addEventListener("click", goToRegister);
        loginButton.addEventListener("click", login);
    }

    async function login() {

        let user = new FormData();
        user.set("email", document.getElementById("email").value);
        user.set("password", document.getElementById("password").value);

        try {
            let auth = await fetch("php/Classes/Auth/Login.php", {
                method: "POST",
                body: user
            });
            let response = await auth.json();
    
            if (response == "true") {
                goToAdsList();
            } else if(response == "false") {
                showPopup("Неверный логин или пароль");
            } else if(response == "data empty") {
                showPopup("Введите логин и пароль");
            }
        } catch(error) {
            showPopup("Упс, что-то пошло не так! Ошибка: " + error.name.value);
        }
        
    }

    function showPopup(textValue) {
        let content        = document.querySelector(".content");
        let popupBox       = addElement("div", "popupBoxShow");
        content.append(popupBox);
        let popupText      = createText("popupText", textValue);
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

    function goToRegister() {
        document.querySelector(".content").parentNode.removeChild(document.querySelector(".content"));
        app.regPage.draw();
    }

    function goToAdsList() {
        document.querySelector(".content").parentNode.removeChild(document.querySelector(".content"));
        SaleBoard.createNav.draw();
        app.adsList.draw();
    }
})(SaleBoard);