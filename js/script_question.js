var count = 0,
	res_val = 0,
	magic_number = 0.2,
	answers = [];
var divs = document.getElementById("container").getElementsByTagName("DIV"),
	p_res = document.getElementById("result"),
	btn = document.getElementsByTagName("BUTTON")[0];


for (var i = 0; i < divs.length; i++)
	answers.push(atob(divs[i].getAttribute('answer')));


function next() {
	divs[count].style.display = "none";
	count++;
	if (count >= divs.length) {
		p_res.innerHTML = "The result is " + calc_result() + "/8";
		btn.style.display = "none";
	} else
		divs[count].style.display = "block";
}

function calc_result() {
	for (var i = 0; i < divs.length; i++) {
		if (divs[i].getAttribute('data-type') == "single") {
			if (divs[i].getElementsByTagName('input')[answers[i] - 1].checked)
				++res_val;
		} else if (divs[i].getAttribute('data-type') == "multiple") {
			var temp = answers[i].split(",");
			for (var j = 0; j < temp.length; j++)
				if (divs[i].getElementsByTagName('input')[temp[j] - 1].checked)
					res_val += (1 / temp.length);
		} else if (divs[i].getAttribute('data-type') == "open") {
			if (divs[i].getElementsByTagName('input')[0].value == answers[i])
				++res_val;
		} else {
			var temp = answers[i].split(",");
			for (var j = 0; j < temp.length; j++)
				if (divs[i].getElementsByTagName('select')[temp[j][0] - 1].getElementsByTagName('option')[temp[j][2]].selected)
					res_val += (1 / temp.length);
		}
	}
	if (Math.ceil(res_val) - res_val <= magic_number)
		return Math.ceil(res_val);
	else return res_val.toFixed(1);
}
