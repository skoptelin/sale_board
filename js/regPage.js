(function(app) {
    app.regPage = {
        draw: function() {
            
            let content = createContent();

            let reg = createText("regText", "Регистрация");

            let input1 = createInput("inputText", "E-mail");

            let input2 = createInput("inputText", "Телефон");

            let input3 = createInput("inputText", "Пароль");            
            
            let input4 = createInput("inputText", "Подтверждение пароля");

            let regButton = createButton("reg", "Зарегистрироваться");

            let loginButton = createButton("login", "Войти");

            content.append(reg, input1, input2, input3, input4, regButton, loginButton);

            //Действие при нажатии на кнопку Войти
            loginButton.addEventListener("click", goToLogin);
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
    
    function createInput(className, textValue) {
        let input = document.createElement("div");

        //Создание инпута под email
        let inputCreate = document.createElement("input");
        input.append(inputCreate);

        //Создание текста под инпутом email
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

    function goToLogin() {
        document.querySelector(".content").parentNode.removeChild(document.querySelector(".content"));
        app.loginPage.draw();
    }
})(SaleBoard);