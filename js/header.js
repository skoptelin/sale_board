(function(app) {
    app.Header = {
        draw: function() {

            let header = document.createElement("div");
            header.classList.add("header");
            document.body.append(header);

            let name = document.createElement("div");
            name.classList.add("headerText");
            header.append(name);
            let nameText = document.createTextNode("GoodSale.ru");
            name.append(nameText);
        }
    }
})(SaleBoard);