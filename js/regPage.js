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

        let create = await fetch("php/users.php", {
            method: "POST",
            body: user
        });
        let response = await create.json();

        if (response == "true") {
            alert("Пользователь " + document.getElementById("name").value + " создан");
            goToLogin();
        } else {
            let message = alert(JSON.stringify(response));
        }
        
    }

    function minInputPassValue() {
        let strPass = document.getElementById("password");
        let minPassLenght = 8;
        if (strPass.value.length < minPassLenght) {
            alert("Пароль слишком короткий");           
        } else {
            applyPassword();
        }
        
    }

    function applyPassword() {
        let password = document.getElementById("password");
        let applyPassword = document.getElementById("applyPassword");
        if(password.value == applyPassword.value) {
            createUser();
        } else {
            alert("Подтверждение не совпадает с паролем");
        }
    }

    function createRegPage() {
        let content     = createContent();
        let reg         = createText("regText", "Регистрация");
        let input1      = createInput("inputText", "email", "E-mail");
        let input2      = createInput("inputText", "name", "Имя");
        let input3      = createInput("inputText", "phone_num", "Телефон");
        let input4      = createInput("inputText", "password", "Пароль");
        let input5      = createInput("inputText", "applyPassword", "Подтверждение пароля");
        let regButton   = createButton("reg", "Зарегистрироваться");
        let loginButton = createButton("login", "Войти");

        content.append(reg, input1, input2, input3, input4, input5, regButton, loginButton);

        let password       = document.getElementById("password");
        let applyPassword  = document.getElementById("applyPassword");
        let telNum         = document.getElementById("phone_num");
        password.type      = "password";
        applyPassword.type = "password";

        //Действие при нажатии на кнопку Войти
        loginButton.addEventListener("click", goToLogin);

        //Действие при нажатии на кнопку Зарегистрироваться
        regButton.addEventListener("click", minInputPassValue);

        //Действие при получении фокуса на инпут телефона
        telNum.addEventListener("focus", createTelPrefix);
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