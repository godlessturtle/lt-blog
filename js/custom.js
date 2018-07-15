jQuery(document).ready(function($) {
    $(document).ready(function(){
      $("textarea").attr('class','form-control');
      $("textarea").attr('rows','8');
      $("#submit").attr('class','btn btn-primary');
      $("input#author").attr('class','form-control');
      $("input#email").attr('class','form-control');
      $("input#url").attr('class','form-control');
      $("form#commentform").attr('class','col-md-12');
      $("div.comment-author img.photo").css('border-radius','30px');
      $("div.comment-author img.photo").css('width','50px');
      $("div.comment-author img.photo").css('height','auto');
      $("cite.fn").css('font-size','18px');
      $("cite.fn").css('font-weight','bold');
      $("div.comment-meta a").css('font-size','12px');
      $("div.reply a").attr('class','btn btn-success btn-sm btn-custom');
      $("a.btn-custom").css('border-radius','30px');
      $("ol.commentlist").css('list-style','none');
      $("ol").css('-webkit-padding-start','0px');
      $("li.comment").css('padding-bottom','10px');
      $("ul li.comment").css('padding-top','15px');
      $("h3#comments").css('margin-bottom','30px');
      //$("li.menu-item").attr('class','nav-item');

    });
  });