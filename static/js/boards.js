function boardId() {
    ret=$('input[name=board_id]').val();
    if(typeof ret==='undefined') {
        return '';
    } else {
        return ret;
    }
}

function replyId() {
    ret=$('input[name=reply_id]').val();
    if(typeof ret==='undefined') {
        return '';
    } else {
        return ret;
    }
}


function loadTopicList() {
    
    $.ajax({
       url: url_root+"?controller=boards&board_id="+boardId()+"&action=topiclistAjax",
       method: 'post',
       success: function (data) {
           $('#topicsContaner').html(data);
       }
    });
}

function loadTopic(topic_id) {
   $.ajax({
       url: url_root+"?controller=boards&action=topicAjax&post_id="+topic_id,
       method: 'post',
       success: function (data) {
           $('#topicContainer').html(data);
       }
    });
}

function writePost(reply_id) {
    
  if(typeof(reply_id)==='undefined') {
      reply_id='';
  }
    $.ajax({
       url: url_root+"?controller=boards&action=writePost&board_id="+boardId()+"&reply_id="+reply_id,
       method: 'post',
       success: function (data) {
          $('#writeContainer').html(data);
          
           $('#writeModal').modal();
          
       }
    }); 
}

function sendPost(reply_id) {
   if(typeof(reply_id)==='undefined') {
       reply_id=false;
   }
    var data=$('form[name=writePost]').serialize();
   console.log(data);
   $.ajax({
    url: url_root+'?controller=boards&action=writePostAjax',
    data: data,
    
    success: function (data) {
        $('#writeModal').modal('toggle');
        
        if(reply_id) {
         loadTopic(replyId());   
        } else {
        loadTopicList();
        }
            // console.log(data);
    }
    });
}