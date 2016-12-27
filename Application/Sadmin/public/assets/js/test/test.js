$(document).ready(function() {
	// alert(get_projectList_url);
    $('#example').dataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": get_projectList_url
    } );
} );