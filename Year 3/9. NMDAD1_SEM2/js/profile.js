var profileId;


  $(".profileLink").click(function()
     {
        profileId = $(this).attr("id");
        localStorage.setItem('clickId', profileId);
     });
