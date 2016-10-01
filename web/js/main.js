$(function(){
   $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var title = button.data('title');
        var href = button.attr('href');
        var size =button.data('size');
        var icon =button.data('icon');        
        var iconHeader= (icon=='')? "fa-tag" : icon ;

        if (size==='lg') {
            modalSize='modal-lg';
        } else if (size==='sm') {
            modalSize='modal-sm';
        } else {
            modalSize='';
        };

        // modal.find('.modal-dialog').addClass('colored-header success');
        modal.find('.modal-dialog').addClass(modalSize);
        modal.find('.modal-title').html('<span class="glyphicon glyphicon-'+ iconHeader +'"></span> ' + title);
        modal.find('.modal-body').html('<div style="text-align: center"> <i class="fa fa-spinner fa-spin fa-3x"></i> </div>');
       

       $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
    })

});


