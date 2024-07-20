var scrollTop;
var navTop;
var navTopAwal = $("nav")[0].getBoundingClientRect().top;
var dibawah;
var mode1 = true;
var mode2 = true;

setInterval(() => {
	scrollTop = $(window).scrollTop();
	navTop = $("nav")[0].getBoundingClientRect().top;

	if (scrollTop >= 85 && mode1) {
		$(".navigasi").addClass("mode1");
		$("header label").addClass("mode1");
		mode1 = false;
	} else if (scrollTop < 85 && !mode1) {
		$(".navigasi").removeClass("mode1");
		$("header label").removeClass("mode1");
		mode1 = true;
	}

    else if (navTop <0 && mode2) {
		$(".navigasi").removeClass("mode1");
		$(".navigasi").addClass("mode2");
        mode2 = false;
    }
    else if (navTopAwal > scrollTop && !mode2){
        if (!mode1) {
            $(".navigasi").addClass("mode1");
        }
        $(".navigasi").removeClass("mode2");
        mode2 = true;
    }


}, 100);