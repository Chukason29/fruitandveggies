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
        formData.append('submit', $('input[name=submit]').val());
        formData.append('product_image', $('input[type=file]')[0].files[0]);   
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

