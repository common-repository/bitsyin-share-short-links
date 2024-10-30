     jQuery(function($){
          $("#sharebox").show();


          $.ajax({
              url: "https://bitsy.in/Home/JsonIndex",
              type: "POST",
              data: { url: document.URL },
              dataType: "json",
              success: function (data) {

                  var favicon = "http://www.google.com/s2/favicons?domain_url=" + document.URL;
				  var Url="http://www."+data.ExceptionMessage;
                  $('#imgFavicon').attr("src", favicon);
                  $('#imgCopyFavicon').attr("src", favicon);

                  $("#hypgmail").attr("href", "https://mail.google.com/mail/u/0/?view=cm&cmid=0&fs=1&tearoff=1&su=" + data.ExceptionMessage + "&body=%0D%0AShortened By: www.bitsy.in");
                  $("#hypfacebook").attr("href", "https://www.facebook.com/dialog/feed?%20app_id=1617103571865815%20&display=popup&name=" + data.error + "&link=" + data.ExceptionMessage + "&redirect_uri=https://www.facebook.com");
                  $("#hyptwitter").attr("href", "https://twitter.com/intent/tweet?text=" + data.error + "-" + data.ExceptionMessage);
                  $("#hypgoogle").attr("href", "https://plus.google.com/share?url=" + data.ExceptionMessage);
                  $("#hyplinkedin").attr("href", "http://www.linkedin.com/shareArticle?mini=true&url=" + data.ExceptionMessage + "&title=" + data.error + "&ro=false");
                  $("#hypshortenurl").attr("href", Url);
                  $("#hypCopy").attr("data-copy", Url);
                 
                  $("a.copy").zclip({
                      path: "ZeroClipboard.swf",
                      copy: function () { return $(this).data('copy'); },
                      beforeCopy: function () { },
                      afterCopy: function () {


                      }
                  });



              },
              error: function (request, status, error) {

              }
          });


      });
      function getMetaDescription() {

          $("#hyphover").show();
          $("#hypshortenurl").hide();


      }

      function Copy() {


          $("#hyphover").hide();
          $("#hypCopy").show();



      }

    