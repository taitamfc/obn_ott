function getAjaxTable(url,target,positionUrl = '',params = {}){
    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        data: params,
        url: url,
        success: function (res) {
            jQuery(target).html(res);
            sortableTable(positionUrl,".sortable-table");
        }
    });
}

function sortableTable(url,target){
    jQuery(target).sortable({
        update: function (event, ui) {
            var data = $(this).sortable('serialize');
            // POST to server using $.post or $.ajax
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                type: 'POST',
                url: url
            })
        }
    });
}

function showAlertSuccess(msg){
    toastr.success(msg, '')
}
function showAlertError(msg){
    toastr.error(msg, '')
}

function handleDelete(url,targetElm, parentElm = '.item'){
    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: "POST",
        data: {
            _method: 'DELETE',
        },
        success: function (res) {
            showAlertSuccess(res.message);
            // getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
            targetElm.closest(parentElm).remove(); // Xóa phần tử khỏi DOM
        }
    });
}

function preventEnter(){
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });
}