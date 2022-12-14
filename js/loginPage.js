(function(app) {
    app.loginPage = {
        draw: function() {
            createLoginPage();
        }
    }

    function createLoginPage() {
        let content     = createContent();
        let loginText   = createText("loginText", "Вход");
        let input1      = createInput("inputText", "email", "E-mail");
        let input2      = createInput("inputText", "password", "Пароль");
        let loginButton = createButton("login", "Войти");
        let regButton   = createButton("reg", "Зарегистрироваться");
        
        content.append(loginText, input1, input2, loginButton, regButton);

        let password    = document.getElementById("password");
        password.type   = "password";
        
        regButton.addEventListener("click", goToRegister);
        loginButton.addEventListener("click", login);
    }

    async function login() {

        let user = new FormData();
        user.set("email", document.getElementById("email").value);
        user.set("password", document.getElementById("password").value);

        let auth = await fetch("php/login.php", {
            method: "POST",
            body: user
        });
        let response = await auth.json();

        if (response == "true") {
            goToAdsList();
        } else if(response == "false") {
            alert("Неверный логин или пароль");
        } else if(response == "data empty") {
            alert("Введите логин и пароль");
        }
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