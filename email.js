var flag = 0;
function checkEmail(){
	let email = document.getElementById("email");
	let emailValid = 1;

	if (!email.value.includes('@')) {
		flag = 1;
		document.getElementById("emailValidation").innerHTML =("email must contain @");
	}else{

		let split = email.value.split('@');
		
		if(split.length > 2){
			flag = 1;
			document.getElementById("emailValidation").innerHTML = ("email must contain only 1 @")
		}else{
			let split1 = split[0];
			let split2 = split[1];

			if(split1.length == 0){
				flag = 1;
				document.getElementById("emailValidation").innerHTML = ("no content before @");
			}
			else if(!split2.includes('.')){
				flag = 1;
				document.getElementById("emailValidation").innerHTML = ("dot missing");
			}else{
				let dotsplit = split2.split('.');

				if(dotsplit[0].length == 0){
					flag = 1;
					document.getElementById("emailValidation").innerHTML = ("No content between @ and .");
				}else if (dotsplit[1].length < 2 || dotsplit[1].length > 3){
					flag = 1;
					document.getElementById("emailValidation").innerHTML = ("Invalid content after .");
				}else{
					flag = 0;
					document.getElementById("emailValidation").innerHTML = "";
				}
			}
		}

	}
	if (flag == 0) {
		document.getElementById('button').style.backgroundColor="#008096";
		document.getElementById('button').disabled = false;
	}
	else{
		document.getElementById('button').style.backgroundColor="grey";
		document.getElementById('button').disabled = true;
	}
	email.focus();
}

function go(){
	if (flag == 0) {
		window.location.href = 'votepage.php'
	}
}
