var ajaxReqeuest = '';
var dev = {
    ready: function () {
        $(document).on('click', '.listManageSection .moveItem', dev.listManageSection);
        $(document).on('click', '.listManageSection .moveItem', dev.addNewItem);
    },
    addNewItem: function () {
        var getNewNameItem
    },
    listManageSection: function () {
        var getAction = $(this).data('action');
        if (getAction == 'left') {
            var getRightSelected = $('.rightItemList option:selected');
            var itemList = $('.rightItemList').val();
            if (getRightSelected.length == 0) {
                phpdev.notify('info', 'Please select Item from list.');
                return false;
            }
            if (getRightSelected.length > 1) {
                phpdev.notify('info', 'Only 1 Item allow at a time.');
                return false;
            }
            /*Insert To first select list*/
            //get copy of list selected
            var getCloneOfRight = getRightSelected.clone();
            //insert to first list
            $('.leftItemList').append(getCloneOfRight);
            //remove from list
            getRightSelected.remove();
        } else if (getAction == 'right') {
            var getLeftSelected = $('.leftItemList option:selected');
            var itemList = $('.leftItemList').val();
            if (getLeftSelected.length == 0) {
                phpdev.notify('info', 'Please select Item from list.');
                return false;
            }
            if (getLeftSelected.length > 1) {
                phpdev.notify('info', 'Only 1 Item allow at a time.');
                return false;
            }
            /*Insert To first select list*/
            //get copy of list selected
            var getCloneOfLeft = getLeftSelected.clone();
            //insert to first list
            $('.rightItemList').append(getCloneOfLeft);
            //remove from list
            getLeftSelected.remove();
            //start Ajex
        } else {
            phpdev.notify('info', 'Invalid Action.');
        }
        dev.sendAjexRequest(itemList, getAction);
    },
    sendAjexRequest: function (itemList, action) {
        var token = $('meta[name="csrf-token"]').attr('content');
        var data = {};
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });
        data['_token'] = token;
        data['items'] = itemList;
        data['action'] = action;
        var url = $('.listManageSection').data('url');

        if (ajaxReqeuest) {
            ajaxReqeuest.abort();
        }
        ajaxReqeuest = $.post(url, data, function (response) {
            if (response.status) {
                phpdev.notify('info', response.message);
            }
        });
    }
};
/*custom function*/
function addNewItem(data) {
    var html = '<option value="' + data.id + '">' + data.name + '</option>';
    $('.leftItemList').append(html);
    $('.newItemName').val('');
}

$(document).ready(function () {
    dev.ready();
    phpdev.setup({
        underfieldError: false,
        showBorderError: true,
//        refreshCsrfToken: true,
//    csrfTokenUrl: 'refreshToken', //this must be full url
        notifyError: true,
        debug: true,
        loaderClass: 'screenLoader'
    });
});