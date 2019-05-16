$(document).ready(function() {
	$(".btn-pref .btn").click(function () {
		$(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
		$(".tab").addClass("active"); // instead of this do the below 
		$(this).removeClass("btn-default").addClass("btn-primary");   
	});
});

function disableInput() {
	document.getElementById("txtPhone").disabled = true;
	document.getElementById("txtEmail").disabled = true;
	document.getElementById("txtCreditCard").disabled = true;
}

function enableInput(tabRole) {
	if (tabRole === "personal") {
		document.getElementById('txtPhone').disabled = false;
		document.getElementById('txtEmail').disabled = false;

		btnContainer = document.getElementById('btnContainer-personal');
		btnContainer.className = btnContainer.className.replace("d-none", " ");
	}
	else if (tabRole === "card") {
		document.getElementById('txtCreditCard').disabled = false;

		btnContainer = document.getElementById('btnContainer-card');
		btnContainer.className = btnContainer.className.replace("d-none", " ");
	}
}
