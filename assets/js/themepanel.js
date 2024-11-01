document.addEventListener('DOMContentLoaded', function () {
    var colorBoxes = document.querySelectorAll('.box');
    var colors = wpsPresentationData.colors;

    // Set the first color as active by default
    updateDynamicCSSRule(dynamicSelector, colors[0]);
    updateDynamicBGCSSRule(dynamicBgSelector, colors[0]);

    colorBoxes.forEach(function (box, index) {
        box.addEventListener('click', function () {
            updateDynamicCSSRule(dynamicSelector, colors[index]);
            updateDynamicBGCSSRule(dynamicBgSelector, colors[index]);
        });
    });

    function updateDynamicCSSRule(selector, value) {
        var styleTag = document.getElementById('dynamic-color-css');
        if (!styleTag) {
            styleTag = document.createElement('style');
            styleTag.id = 'dynamic-color-css';
            document.head.appendChild(styleTag);
        }

        styleTag.innerHTML = selector + ' { ' +
            'color: ' + value + '!important; ' +
			 'fill: ' + value + '!important; ' +
            'border-color: ' + value + '; ' +
			'-webkit-text-stroke-color: ' + value + '; ' +
        '}';
    }

    function updateDynamicBGCSSRule(selector, value) {
        var styleTag = document.getElementById('dynamic-bgcolor-css');
        if (!styleTag) {
            styleTag = document.createElement('style');
            styleTag.id = 'dynamic-bgcolor-css';
            document.head.appendChild(styleTag);
        }

        styleTag.innerHTML = selector + ' { ' +
            'background-color: ' + value + '!important; ' +
			'fill: ' + value + '!important; ' +
			
        '}';
    }
});





jQuery(document).ready(function($) {

	$("#dark").click(function(e) { 

	e.preventDefault();

	$('main').addClass("dark");

    $.cookie('dark','yes', {expires: 7, path: '/'});

	return false;

	});

	$("#normal").click(function(e) { 

	e.preventDefault();

	$('main').removeClass("dark");

    $.cookie('dark','no', {expires: 7, path: '/'});

	return false;

	});

});





jQuery(document).ready(function($) {
    $(".switcher .fa-cog").click(function(e) { 
        e.preventDefault();
        $(".switcher").toggleClass("active");
    });
});
