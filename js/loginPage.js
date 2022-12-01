(function(app) {
    app.loginPage = {
        draw: function() {

            let content = createContent();

            let login = createText("loginText", "Вход");

            let input1 = createInput("inputText", "E-mail");
            
            let input2 = createInput("inputText", "Пароль");

            let loginButton = createButton("login", "Войти");

            let regButton = createButton("reg", "Зарегистрироваться");
            
            content.append(login, input1, input2, loginButton, regButton);
            
            regButton.addEventListener("click", goToRegister);
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

    function goToRegister() {
        document.querySelector(".content").parentNode.removeChild(document.querySelector(".content"));
        app.regPage.draw();
    }
})(SaleBoard);