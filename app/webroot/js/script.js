$(function() {
	var $answerElm = $(".answer");
	var currQuest = 0;
	var numQuest = $answerElm.length;
	
	$answerElm.not(":first").hide();
	
	$("#btn-next").on("click", function() {
		var answer = $answerElm.eq(currQuest).find("select").val();
		
		if (answer) {
			currQuest++;
			if (currQuest < numQuest) {
				$.when(
					$answerElm.fadeOut(500)
				).done(function() {
					$answerElm.eq(currQuest).fadeIn(500);
					$("#question-progress").html(currQuest + 1);
				});
			} else {
				currQuest--;
				$("#ResultIndexForm").submit();
			}
		} else {
			alert("Please choose a answer");
		}
	});
	
	$("#btn-prev").on("click", function() {
		currQuest--;
		if (currQuest >= 0) {
			$.when(
				$answerElm.fadeOut(500)
			).done(function(){
				$answerElm.eq(currQuest).fadeIn(500);
				$("#question-progress").html(currQuest + 1);
			});
		} else {
			currQuest++;
		}
	});
});

