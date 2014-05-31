function loadTopicList(board_id) {
    $.ajax({
       url: url_root+"?controller=boards&action=topiclistAjax",
       method: 'post',
       success: function (data) {
           $('#topicList').html(data);
       }
    });
}

function writePost(board_id) {
  $.ajax({
       url: url_root+"?controller=boards&action=writePost&board_id="+board_id,
       method: 'post',
       success: function (data) {
          $('#writeContainer').html(data);
          $('#writeContainer').dialog();
       }
    }); 
}