$(document).ready(function () {
	//listens to the click event of the question tabs then close and open the tabs 
	$(document).on("click", ".block__section2__cont__question", function(){
		
		if($(this).hasClass("block__section2__cont__question--active")){
			$(".block__section2__cont__question--active .block__section2__cont__question__header .block__section2__cont__question__header__btn").toggleClass("block__section2__cont__question__header__btn--active");
			$(this).toggleClass("block__section2__cont__question--active");
		}else{
			$(".block__section2__cont__question--active .block__section2__cont__question__header .block__section2__cont__question__header__btn").toggleClass("block__section2__cont__question__header__btn--active");
			$(".block__section2__cont__question--active").toggleClass("block__section2__cont__question--active");
			$(this).toggleClass("block__section2__cont__question--active");
			$(".block__section2__cont__question--active .block__section2__cont__question__header .block__section2__cont__question__header__btn").toggleClass("block__section2__cont__question__header__btn--active");
		}
	});
});