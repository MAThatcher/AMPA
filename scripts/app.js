var ranking = {
    apn: "",
    permit: "",
    age: "",
    prox: "",
    comp: "",
    cond: "",
    soil: "",
		slope: "",
		total_score: 0,
};

// Ranking info we need to loop through
radio_groups = ["permit", "age", "prox", "comp", "cond", "soil", "slope"];

function validateForm() {
	if(isNaN(ranking.apn) == true || ranking.apn == "") {
		alert("Error: Parcel Number must be included and must be a number!");
		return 0;
	}else return 1;
}

function calculateRanking() {
	ranking.total_score=0;
	radio_groups.forEach(calcScore);
	function calcScore(item, index) {
		//console.log(ranking[item])
		ranking.total_score += transform(item, ranking[item]);
	}
	//console.log(ranking.total_score)
	return ranking.total_score;
}

$(document).ready(function() {
	// When the page is loaded get the values of our inputs
	$("input:text").val(ranking.apn)
	
	// Check if post was successful
	$('#alert_success').prop('disabled', true);
	if (sessionStorage.getItem("posted")) {
		console.log("YES");
		$('#alert_success').prop('disabled', false);
	  }
	// Modify ranking obj from radio buttons
	radio_groups.forEach(setUpRank);
	function setUpRank(item, index) {
		ranking[item] = $("input[name=" + item + "]:checked").val();
	}
	// Change rank elements from calculation
	$("[name='rank_score']").text(calculateRanking());
	$("[name='hidden_score']").val(calculateRanking());

	// Get changes of input text
	$("#apn").keyup(function() {
		ranking.apn = $("[name='apn']").val();
		$("[name='rank_parcel_num']").text(ranking.apn);
	});

	// Get changes of radio buttons
	$("input[type=radio]").on("click", function() {
		$("#rank_form input[type=radio]:checked").each(function() {
			ranking[this.name] = this.value;
		})
		$("[name='rank_score']").text(calculateRanking());
		$("[name='hidden_score']").val(calculateRanking());
	});

	$("#btnSubmit").click(function(){
		var errors = validateForm();
		//console.log(errors)
		if(errors==1) {
			sessionStorage.setItem("posted", "yes");
			$("#rank_form").submit();
		}
	}); 
});
