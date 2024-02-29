const productDisplay = document.getElementById("product-display");
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
        const productCategory = ["Lettuce", "Stone Fruits", "Berries", "Melon", "Nuts", "Grapes", "Pepper", "Dates", "Herbs", "Seeds"];
        productCategory.forEach(category => {
           productDisplay.innerHTML += `
                <div class = "product-categories">
                    <h2>${category}</h2>
                </div>
           `
        });
    })
})
