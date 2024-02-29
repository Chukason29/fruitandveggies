const productDisplay = document.getElementById("product-display");
const lettuce = document.getElementById("lettuce");
const stoneFruits= document.getElementById("stone-fruits");
const berries = document.getElementById("berries");
const melon = document.getElementById("melon");
const nuts = document.getElementById("nuts");
const grapes = document.getElementById("grapes");
const pepper = document.getElementById("pepper");
const dates = document.getElementById("dates");
const herbs = document.getElementById("herbs");
const seeds = document.getElementById("seeds");
const tropicalFruit = document.getElementById("tropical-fruits");


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
        const displayProduct = (categoryElement, category) => {
            categoryElement.innerHTML = `<h2>${category}</h2>`;
            productArray.filter(product => {
                return product.category == category;
            }).forEach(element => {
                categoryElement.innerHTML +=
                `
                    <div class = "product-card">
                        <div class = "product-image">
                        <img src="" alt="">
                        </div>
                        <div class = "product-name-category">
                            
                        </div>
                        <div class = "product-price">
                            
                        </div>
                        <div class = "product-shop-now">
                            
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
