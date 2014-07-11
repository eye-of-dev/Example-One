$(document).ready(function() {
    
    $('.libs-add .button').bind('click', function (){
        
        var title = $.trim($('.libs-add input[name=lib_name]').val());
        var desc = $.trim($('.libs-add textarea[name=lib_desc]').val());
        
        var counter = 0;
        
        if (title.length < 1)
        {
            $('#lib_name_error').text('Поле не должно быть пустым');
            counter++;
        }
        else
        {
            $('#lib_name_error').text('');
        }
        
        if( counter === 0){
            $.ajax({
                type: 'POST',
                url: '/libs/add',
                data:'title=' + title + '&desc=' + desc,
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('.libs-add input[name=lib_name]').val('');
                    $('.libs-add textarea[name=lib_desc]').val('');
                    
                    if(data)
                    {
                        $("select[name=lib_id]").append( $('<option value="' + data['id'] + '">' + data['title'] + '</option>'));
                    }
                    
                }
            });
        }
        
    });
    
    
    $('.books-add .button').bind('click', function (){
        
        var title = $.trim($('.books-add input[name=book_name]').val());
        var author = $.trim($('.books-add input[name=book_author]').val());
        var libs_id = $('.books-add select[name=libs_id] :selected').val();
        var price = $.trim($('.books-add input[name=book_price]').val());
        
        var counter = 0;
        
        if (title.length < 1)
        {
            $('#book_name_error').text('Поле не должно быть пустым');
            counter++;
        }
        else
        {
            $('#book_name_error').text('');
        }
        
        if (author.length < 1)
        {
            $('#book_author_error').text('Поле не должно быть пустым');
            counter++;
        }
        else
        {
            $('#book_author_error').text('');
        }
        
        if (price.length < 1)
        {
            $('#book_price_error').text('Поле не должно быть пустым');
            counter++;
        }
        else
        {
            $('#book_price_error').text('');
        }
        
        if( counter === 0){
            $.ajax({
                type: 'POST',
                url: '/libs/book',
                data:'title=' + title + '&author=' + author + '&libs_id=' + libs_id + '&price=' + price,
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('.books-add input[name=book_name]').val('');
                    $('.books-add input[name=book_author]').val('');
                    $('.books-add select[name=libs_id]:selected').val('');
                    $('.books-add input[name=book_price]').val('');
                    
                    if(data)
                    {
                        
                        var html = '<div class="bookBox">';
                            html += '<div class="bookBox_inner">';
                            html += '<div class="book_name">' + data['title'] + '</div>';
                            html += '<div class="book_image">';
                            html += '<img src="img/books/example.jpg" align="none" alt="Example" title="Example">';
                            html += '</div>';
                            html += '<div class="book_price">' + data['price'] + ' руб.</div>';
                            html += '<div class="book_author">' + data['author'] + '</div>';
                            html += '</div>';
                            html += '</div>';
                        
                        $(".books-list").append(html);
                    }
                    
                }
            });
        }
        
    });

});