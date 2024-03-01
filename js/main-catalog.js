const productDisplay = document.querySelector("#product-display .product-categories");
const lettuce = document.querySelector("#lettuce .product-categories");
const stoneFruits= document.querySelector("#stone-fruits .product-categories");
const berries = document.querySelector("#berries .product-categories");
const melon = document.querySelector("#melon .product-categories");
const nuts = document.querySelector("#nuts .product-categories");
const grapes = document.querySelector("#grapes .product-categories");
const pepper = document.querySelector("#pepper .product-categories");
const dates = document.querySelector("#dates .product-categories");
const herbs = document.querySelector("#herbs .product-categories");
const seeds = document.querySelector("#seeds .product-categories");
const tropicalFruit = document.querySelector("#tropical-fruits .product-categories");


$(document).ready(function(){
    $.ajax({
        url: './catalog/query_products.php',
        method: 'post',
        cache: false,
        contentType: false,
        processData: false,
        data : "",
        beforeSend: function(){
            // $('#loader').show();
        }
    }).done(function(result){       
        $('#start-display').hide();
        const productArray = JSON.parse(result);
        const displayProduct = (categoryElement, productCategory) => {
            productArray.filter(product => {
                return product.category == productCategory;
            }).forEach(({
                id, productName,
                category, subCategory, 
                lowPrice, highPrice,
                imageLink
                }) => {
                let myProductName = productName.charAt(0).toUpperCase() + productName.slice(1).toLowerCase();
                categoryElement.innerHTML +=
                `
                   <div id="${id}" class = "product-card">
                        <div class = "product-image">
                            <img src="https://${imageLink}" alt="">
                        </div>
                        <div class = "product-name-category">
                            <h2>${myProductName}</h2>
                            <p>${subCategory} - ${category}</p>
                        </div>
                        <!--s<div class = "product-price">
                            <del>&#x20A6;${lowPrice}</del>
                            <strong>&#x20A6;${highPrice}</strong>
                        </div>-->
                        <div class = "product-shop-now">
                            <a href="http://"><i class="fa-brands fa-whatsapp"></i>BUY NOW</a>
                        </div>
                    </div>
                `;
            });
         }
        displayProduct(stoneFruits, "STONE FRUITS");
        displayProduct(tropicalFruit, "TROPICAL FRUITS");
        displayProduct(berries, "BERRIES");
        displayProduct(melon, "MELON");
        displayProduct(grapes, "GRAPES");
        displayProduct(pepper, "PEPPER");
        displayProduct(dates, "DATES");
        displayProduct(herbs, "HERBS");
        displayProduct(seeds, "SEEDS");
    })
})
