//ready pour etre sur que le HTML a ete chargeé
$(document).ready(function () {

	var ul = $("#todo");

	function newTodo(id, name) {
		var li = document.createElement("li");
		li.id = id;

		var p = document.createElement("p");
		p.innerText = name;
		li.appendChild(p);

		li.onclick = function () { delTodo(id); };

		//inserer les balises ul avant les li
		ul.prepend(li);
	}

	function delTodo(id) {
		var elem = $('#' + id);

		if (confirm(`Voulez-vous vraiment supprimer ${elem.find("p").text()} ?`)) {
			$.ajax({
				type: "GET",
				url: `delete.php?id=${id}`,
				success: function (res) {
					ul.empty();
					for (var id in res) {
						newTodo(id, res[id]);
					}
				}
			});
		}
	}
	//Rafraichissemet auto
	$.ajax({
		type: "GET",
		url: "select.php",
		success: function (res) {
			for (var id in res)
				newTodo(id, res[id]);
		}
	})

	$("#new").click(function () {
		var val = prompt("Veuillez entrer votre nouveau todo");
		if (!val)
			return;
		$.ajax({
			type: "GET",
			url: `insert.php?val=${val}`,
			success: function (res) {
				newTodo(res["id"], val);
			}
		})
	});

});