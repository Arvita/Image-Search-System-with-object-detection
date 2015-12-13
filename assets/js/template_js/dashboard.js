$(function() {
  $('.visible-tooltip').tooltip('show');

  // Tasks list
  $('.tasks-list input[type="checkbox"]').change(function(){
    $(this).closest('li').toggleClass('task-done');
  })

    /**
     * Request data from the server, add it to the graph and set a timeout to request again
     */

    /*    
    $(document).ready(function(){
        $('#readcsvac81').load('http://localhost/sai/readcsv');
        var refreshId = setInterval(function() {
            $('#readcsvac81').fadeOut("fast").load('readcsv-AC81.php').fadeIn("slow");
        }, 1000);
    });
  */
});