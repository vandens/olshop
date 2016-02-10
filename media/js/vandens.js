function proses(xuri,xdata,xdiv,tipe){

	$.ajax({
		url 	: xuri,
		type 	: 'post',
		data 	: xdata,
		cache 	: false,
		success : function(param){
			if(tipe == 1){ //add
				$("#"+xdiv).html(param);

			}else{
				var x = eval('('+param+')');
				if(x.error == 1){

					$("#"+xdiv).removeClass('alert-danger');
					$("#"+xdiv).removeClass('alert-success');
					$("#"+xdiv).addClass('alert-danger');
					$("#"+xdiv).html(x.msg).show();
				}else{

					$("#"+xdiv).removeClass('alert-danger');
					$("#"+xdiv).removeClass('alert-success');
					$("#"+xdiv).addClass('alert-success');
					$("#"+xdiv).html(x.msg).show();
				}

			}
		}
	})
}


  function add(key){
    $.ajax({
        url    : 'add',
        type   : 'post',
        cache  : false,
        data   : 'view='+key,
        success: function(param){
            $("#myModal").html(param);
        }

    })
  } 

  function cat_to_merek(key){
    $.ajax({
        url    : 'cat_to_merk',
        type   : 'post',
        cache  : false,
        data   : 'key='+key,
        success: function(param){
            $("#merk").html(param);
        }

    })
  }  