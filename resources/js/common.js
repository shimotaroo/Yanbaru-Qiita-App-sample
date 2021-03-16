(function() {
    'use strict';

    // フラッシュメッセージのfadeout
    $(function(){
        $('.flash_message').fadeOut(3000);
    });

    // 削除の事前確認
    $('#delete-btn').on('click', function() {
        const deleteTarget = $(this).data('deleteTarget');
        // キャンセル
        if (!confirm(deleteTarget + 'を削除してもよろしいですか？')) {
            // 削除しない
            return false;
        // OK
        } else {
            // 削除    
            $('#delete-form').submit();
        }
    });

    // CSVダウンロードのAPIをajaxで呼び出す
    // 今は使わない
    // $('#csv-download-button').on('click', function() {
    //     $.ajax({
    //         url: "/articles/csv_download",
    //         type: "GET",
    //         dataType: "json"
    //     }).done(function (result) {
    //
    //     }).fail(function () {
    //     });
    // });
})();