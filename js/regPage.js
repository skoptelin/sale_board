(function(app) {
    app.regPage = {
        draw: function() {
            let content = document.createElement("div");
            content.classList.add("content");
            document.body.append(content);

            let reg = document.createElement("div");
            reg.classList.add("regText");
            reg.append(document.createTextNode("Регистрация"));

            let input1 = document.createElement("div");

            let inputEmail = document.createElement("input");
            input1.append(inputEmail);

            let input1Text = document.createElement("div");
            input1Text.append(document.createTextNode("E-mail"));
            input1Text.classList.add("inputText");
            input1.append(input1Text);

            let input2 = document.createElement("div");

            let inputTel = document.createElement("input");
            input2.append(inputTel);

            let input2Text = document.createElement("div");
            input2Text.append(document.createTextNode("Телефон"));
            input2Text.classList.add("inputText");
            input2.append(input2Text);

            let input3 = document.createElement("div");

            let inputPass = document.createElement("input");
            input3.append(inputPass);

            let input3Text = document.createElement("div");
            input3Text.append(document.createTextNode("Пароль"));
            input3Text.classList.add("inputText");
            input3.append(input3Text);
            
            let input4 = document.createElement("div");

            let inputApplyPass = document.createElement("input");
            input4.append(inputApplyPass);

            let input4Text = document.createElement("div");
            input4Text.append(document.createTextNode("Подтверждение пароля"));
            input4Text.classList.add("inputText");
            input4.append(input4Text);

            let regButton = document.createElement("button");
            regButton.id = "reg";
            regButton.append(document.createTextNode("Зарегистрироваться"));

            let loginButton = document.createElement("button");
            loginButton.id = "login";
            loginButton.append(document.createTextNode("Войти"));

            content.append(reg, input1, input2, input3, input4, regButton, loginButton);

            loginButton.addEventListener("click", goToLogin);
        }
    }

    function goToLogin() {
        document.querySelector(".content").parentNode.removeChild(document.querySelector(".content"));
        app.loginPage.draw();
    }
})(SaleBoard);