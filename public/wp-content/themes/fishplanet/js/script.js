;(jQuery)(function($){
  $(function(){

    // Отправка формы
    $('.call-back-form').submit(function(e){
      e.preventDefault();
      var m_method=$(this).attr('method');
      var m_action=$(this).attr('action');
      var m_data=$(this).serialize();
      $.ajax({
        type: m_method,
        url: m_action,
        data: m_data,
        success: function(result){
          $('.modal-title').css("visibility", "hidden");
          $('.call-back-form').css("display", "none");
          $('.form-result').css("display", "block");
        }
      });
    });
  
  })
});