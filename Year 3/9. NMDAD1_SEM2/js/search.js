/*
*Helper downloaded from github
*/
function tplawesome(e,t){res=e;for(var n=0;n<t.length;n++){res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){return t[n][r]})}return res}

$(function() {
    $("form").on("submit", function(e) {
       e.preventDefault();
       /*
       *prepare the request
       */
       var request = gapi.client.youtube.search.list({
            part: "snippet",
            type: "video",
            q: encodeURIComponent($("#search").val()).replace(/%20/g, "+"),
            maxResults: 6,
            order: "viewCount"
       });
       /*
      *execute the request
      */
       request.execute(function(response) {
          var results = response.result;
          $("#results").html("");
          $.each(results.items, function(index, item) {
            $.get("../assets/item.html", function(data) {
                $("#results").append(tplawesome(data, [{"title":item.snippet.title, "videoid":item.id.videoId}]));
            });
          });
          resetVideoHeight();
       });
    });

    $(window).on("resize", resetVideoHeight);
});

/*
*Make video's responsive and keep the 16:9 ratio
*/
function resetVideoHeight() {
    $(".video").css("height", $("#results").width() * 9/16);
}

/*
*Load the youtube API, set key with personal Google API key
*/
function init() {
    gapi.client.setApiKey("AIzaSyCURMTPIYp_C6-AxsCI8OtRnvT4KHCNHtQ");
    gapi.client.load("youtube", "v3", function() {
        // yt api is ready
    });
}
