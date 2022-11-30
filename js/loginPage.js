(function(app) {
    app.loginPage = {
        draw: function() {

            let content = document.createElement("div");
            content.classList.add("content");
            document.body.append(content);

            let login = document.createElement("div");
            login.classList.add("loginText");
            login.append(document.createTextNode("Вход"));

            let input1 = document.createElement("div");

            let inputEmail = document.createElement("input");
            input1.append(inputEmail);

            let input1Text = document.createElement("div");
            input1Text.append(document.createTextNode("E-mail"));
            input1Text.classList.add("inputText");
            input1.append(input1Text);

            let input2 = document.createElement("div");

            let inputPass = document.createElement("input");
            input2.append(inputPass);

            let input2Text = document.createElement("div");
            input2Text.append(document.createTextNode("Пароль"));
            input2Text.classList.add("inputText");
            input2.append(input2Text);

            let loginButton = document.createElement("button");
            loginButton.id = "login";
            loginButton.append(document.createTextNode("Войти"));

            let regButton = document.createElement("button");
            regButton.id = "reg";
            regButton.append(document.createTextNode("Зарегистрироваться"));

            content.append(login, input1, input2, loginButton, regButton);
            
            regButton.addEventListener("click", goToRegister);
        }
    }

    function goToRegister() {
        document.querySelector(".content").parentNode.removeChild(document.querySelector(".content"));
        app.regPage.draw();
    }
})(SaleBoard);