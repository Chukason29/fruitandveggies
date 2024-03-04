$(document).ready(function(){
    $('#add-submit').click(function(event){
        $('#add-submit').attr('disabled', 'disabled');
        event.preventDefault();
        var formData = new FormData();
        formData.append('product_name', $('input[name=product-name]').val());
        formData.append('product_category', $('#product-category option:selected').val());
        formData.append('sub_category', $('#sub-category option:selected').val());
        formData.append('high_price', $('input[name=high-price]').val());
        formData.append('low_price', $('input[name=low-price]').val());
        formData.append('image_link', $('input[name=image-link]').val());
        formData.append('submit', $('input[name=submit]').val());  
        $.ajax({
            url: 'add-product.php',
            method: 'post',
            cache: false,
            contentType: false,
            processData: false,
            data : formData,
            beforeSend: function(){
                $('#loader').show();
            }
        }).done(function(result){       
            $('#loader').hide();
            $('#result').html(result);
            $('#add-submit').removeAttr('disabled');
        })
        event.stopImmediatePropagation();
        return false;
    })   
})
const edit = (e) => {
    $(document).ready(function(){
        const productId = e.parentNode.id;
        const formData = {};
        formData.productID = productId;
        $.ajax({
            url: "get_product.php",
            method: "post",
            data: formData,
            beforeSend: function(){
                $('#start-display-manage').show();
            }
        }).done(function(result){
            $('#start-display-manage').hide();
            const productArray = JSON.parse(result);
            const dialog = document.querySelector("#manage-dialog");
            $("#manage-product-id").val(productArray[0].id);
            $("#manage-product-name").val(productArray[0].productName);
            $("#manage-product-category").val(productArray[0].category);
            $("#manage-sub-category").val(productArray[0].subCategory);
            $("#manage-high-price").val(productArray[0].highPrice);
            $("#manage-low-price").val(productArray[0].lowPrice);
            $("#manage-image-link").val(productArray[0].imageLink);
            console.log(productArray[0].subCategory);
            dialog.showModal();
        })
    })
}

$(document).ready(function(){
    $('#update').click(function(event){
        $('#update').attr('disabled', 'disabled');
        event.preventDefault();
        var formData = new FormData();
        formData.append('product_id', $('input[name=manage-product-id]').val());
        formData.append('manage_product_name', $('input[name=manage-product-name]').val());
        formData.append('manage_product_category', $('#manage-product-category option:selected').val());
        formData.append('manage_sub_category', $('#manage-sub-category option:selected').val());
        formData.append('manage_high_price', $('input[name=manage-high-price]').val());
        formData.append('manage_low_price', $('input[name=manage-low-price]').val());
        formData.append('manage_image_link', $('input[name=manage-image-link]').val());
        formData.append('update', $('input[name=update]').val());  
        $.ajax({
            url: 'update_product.php',
            method: 'post',
            cache: false,
            contentType: false,
            processData: false,
            data : formData,
            beforeSend: function(){
                $('#manage-loader').show();
            }
        }).done(function(result){       
            $('#manage-loader').hide();
            $('#manage-result').html(result);
            $('#update').removeAttr('disabled');
        })
        event.stopImmediatePropagation();
        return false;
    })   
})