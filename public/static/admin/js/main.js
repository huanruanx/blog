/*
 * @Author       : Lucifer
 * @Date         : 2022-11-20 11:07:31
 * @LastEditTime : 2022-11-20 12:37:07
 * @FilePath     : \blog\public\static\admin\js\main.js
 */


    $(document).ready(function (e) {
        var $dashChartBarsCnt = jQuery('.js-chartjs-bars')[0].getContext('2d'),
            $dashChartLinesCnt = jQuery('.js-chartjs-lines')[0].getContext('2d');

        var $dashChartBarsData = {
            labels: {$data.data_time},
            datasets: [
                {
                    label: '评论统计',
                    borderWidth: 1,
                    borderColor: 'rgba(0, 0, 0, 0)',
                    backgroundColor: 'rgba(51, 202, 185, 0.5)',
                    hoverBackgroundColor: "rgba(51, 202, 185, 0.7)",
                    hoverBorderColor: "rgba(0, 0, 0, 0)",
                    data: {$data.msg_total}
                }
            ]
        };
        var $dashChartLinesData = {
            labels: {$data.data_time},
            datasets: [
                {
                    label: '首页访问',
                    data: {$data.visit_total},
                    borderColor: '#358ed7',
                    backgroundColor: 'rgba(53, 142, 215, 0.175)',
                    borderWidth: 1,
                    fill: false,
                    lineTension: 0.5
                }
            ]
        };

        new Chart($dashChartBarsCnt, {
            type: 'bar',
            data: $dashChartBarsData
        });

        var myLineChart = new Chart($dashChartLinesCnt, {
            type: 'line',
            data: $dashChartLinesData,
        });
    });


