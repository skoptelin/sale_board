(function(app) {
    app.Header = {
        draw: function() {

            let header = document.createElement("div");
            header.classList.add("header");
            document.body.append(header);

            document.querySelector(".header").append(document.createTextNode("GoodSale.ru"));
        }
    }
})(SaleBoard);