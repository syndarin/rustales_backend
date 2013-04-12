$(document).ready(function(){

	$(".btn-danger").click(function(){
		var id = this.id;
		if(confirm("Вы действительно хотите удалить запись?")){
			window.location = "../index.php/main/delete/"+id;
		}
	});

	$("#add_book").click(function(){
		
		var title   = $.trim($("input[name=title]").val());
		var desc    = $.trim($("textarea[name=desc]").val());
		var url     = $.trim($("input[name=download_url]").val());
		var file    = $.trim($("input[name=userfile]").val());
		var process = $.trim($("input[name=process]").val());

		if(title==""){
			alert("Не указано название книги!");
			return false;
		}else if(desc==""){
			alert("Не указано описание книги!");
			return false;
		}else if(url==""){
			alert("Не указан URL для загрузки!");
			return false;
		}else if(file==""){
			alert("Не задана иконка!");
			return false;
		}else if(process==""){
			alert("Не указано имя пакета!");
			return false;
		}

		return true;
	});
});