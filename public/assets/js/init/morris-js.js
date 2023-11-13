/* ========================================================================

Chart Js Init

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
var results = createData(items);
console.log(results);
jQuery(document).ready(function () {
    if ($('#morris_bar').length) {
        let data = results.data;
        let Y = results.Y;
        Morris.Bar({
            element: 'morris_bar',
            data: data,
            xkey: 'x',
            ykeys: ['y'],
            labels: [Y],
            barColors: ['#2671ff'],
            resize: true,
            gridTextSize: '14px'

        });
    }
    
});
/*======== End Doucument Ready Function =========*/