(function() {
    'use strict';

    // フラッシュメッセージのfadeout
    $(function(){
        $('.flash_message').fadeOut(3000);
    });

    // 削除の事前確認
    $('#delete-btn').on('click', function() {
        // キャンセル
        if (!confirm('記事を削除してもよろしいですか？')) {
            // 削除しない
            return false;
        // OK
        } else {
            // 削除    
            $('#delete-form').submit();
        }
    });
})();