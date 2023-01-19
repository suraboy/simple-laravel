<script>
    function showLoading() {
        $('.ajaxloading-widget-background').show();
    }
    function hideLoading() {
        $('.ajaxloading-widget-background').hide();
    }
    function inputIntTypeOnly(elm) {
        elm.on("keydown", function (event) {
            let retRes;
            const e = event || window.event,
                key = e.keyCode || e.which,
                ruleSetArr_1 = [8, 9, 46], // backspace,tab,delete
                ruleSetArr_2 = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57],	// top keyboard num keys
                ruleSetArr_3 = [96, 97, 98, 99, 100, 101, 102, 103, 104, 105], // side keyboard num keys
                ruleSetArr_4 = [17, 67, 86],	// Ctrl & V
                //ruleSetArr_5 = [110,189,190], add this to ruleSetArr to allow float values
                ruleSetArr = ruleSetArr_1.concat(ruleSetArr_2, ruleSetArr_3, ruleSetArr_4);	// merge arrays of keys

            if (ruleSetArr.indexOf() !== "undefined") {	// check if browser supports indexOf() : IE8 and earlier
                retRes = ruleSetArr.indexOf(key);
            } else {
                retRes = $.inArray(key, ruleSetArr);
            }

            if (retRes === -1) {	// if returned key not found in array, return false
                return false;
            } else if (key === 67 || key === 86) {	// account for paste events
                event.stopPropagation();
            }

        }).on('paste', function (event) {
            const $thisObj = $(this),
                origVal = $thisObj.val(),	// orig value
                newVal = event.originalEvent.clipboardData.getData('Text');	// paste clipboard value
            if (newVal.replace(/\D+/g, '') == "") {	// if paste value is not a number, insert orig value and ret false
                $thisObj.val(origVal);
                return false;
            } else {
                $thisObj.val(newVal.replace(/\D+/g, ''));
                return false;
            }

        });
    }
</script>
